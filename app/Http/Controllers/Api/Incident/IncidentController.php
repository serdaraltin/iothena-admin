<?php

namespace App\Http\Controllers\Api\Incident;


use App\Events\IncidentNotificationEvent;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Notifications\NotificationIncident;
use Illuminate\Http\Request;


use App\Models\BadWord\BadWord;
use App\Models\Device\Device;
use App\Models\Incident\Incident;
use App\Models\Incident\IncidentBadWord;

class IncidentController extends Controller
{

    public function validateData(Request $request){
        $validatedData = $request->validate([
            'device_id' => 'required',
            'transcript' => 'required',
            'human_count' => 'required',
            'priority' => 'required',
            'bad_words' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'audio' => 'required|mimes:mp3,wav,aac|max:10240',
        ]);
        if($request->filled('additional'))
            $validatedData['additional'] = json_encode($validatedData['additional']);
        return $validatedData;
    }

    public function index(){
        $incidents = Incident::all();
        return response()->json($incidents);
    }

    public function show(Request $request){
        $incident = Incident::where('id', $request->id)->first();
        if(!$incident)
            return response()->json(['message' => 'Incident not found'], 404);
        return response()->json($incident, 200);
    }

    public function store(Request $request){
        try{
            $incident = Incident::create($this->validateData($request));
            return response()->json([
                'message' => 'Incident created successfully',
                'event' => $incident,
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Incident creation failed',
                'message' => $e->getMessage(),
            ],500);
        }
    }

    public function update(Request $request){
        $incident = Incident::where('id', $request->id)->first();
        if(!$incident)
            return response()->json(['message' => 'Incident not found'], 404);

        try{
            $incident->update($this->validateData($request));
            return response()->json([
                'message' => 'Incident updated successfully',
                'event' => $incident,
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Incident updation failed',
                'message' => $e->getMessage(),
            ],500);
        }
    }

    public function destroy(Request $request){
        $incident = Incident::where('id', $request->id)->firstOrFail();
        if(!$incident)
            return response()->json(['message' => 'Incident not found'], 404);

        try{
            $incident->delete();
            return response()->json([
                'message' => 'Incident deleted successfully'
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Incident deletion failed',
                'message' => $e->getMessage(),
            ],500);
        }

    }

    public function notification(Request $request){

        $device = Device::where('uuid', $request->get('device_uuid'))->first();

        if(!$device)
            return response()->json(['message' => 'Device not found'], 404);

        try{
            $request['device_id'] = $device->id;

            $incident = Incident::create($this->validateData($request));

            if(!$incident)
                return response()->json(['message' => 'Incident creation failed'], 500);

            foreach($request->get('bad_words') as $badWord){
                $badWord = BadWord::where('word', $badWord)->first();
                if(!$badWord)
                    return response()->json(['message' => 'Bad Word not found'], 404);

                $incidentBadWord = IncidentBadWord::create([
                    'incident_id' => $incident->id,
                    'bad_word_id' => $badWord->id,
                ]);

                if(!$incidentBadWord)
                    return response()->json(['message' => 'Incident Bad Word creation failed'], 404);
            }

            if(!$request->hasFile('photo'))
                return response()->json(['message' => 'Incident Photo not found'], 404);
            if(!$request->hasFile('audio'))
                return response()->json(['message' => 'Incident Audio not found'], 404);

            $photo = $request->file('photo');
            $audio = $request->file('audio');

            $incident->addMediaFromRequest('photo')->toMediaCollection('photo', 'ftp');
            $incident->addMediaFromRequest('audio')->toMediaCollection('audio', 'ftp');

            $notification = [
                'model_type' => Incident::class,
                'model_id' => $incident->id,
                'priority' => $incident->priority,
                'title' => 'Incident from =>'. $device->location,
                'message' => $incident->transcript,
            ];

            /*$users = User::all();
            Notification::send($users, new NotificationIncident($notification));*/

            $incident->notify(new NotificationIncident($notification));
            $notification_id = $incident->notifications()->orderByDesc('created_at')->value('id');

            $model = [
                'model_type' => Incident::class,
                'model_id' => $incident->id,
                'notification_id' => $notification_id,
            ];

            //event(new IncidentNotificationEvent($incident->id, $notification_id));

            broadcast(new NotificationEvent($model));

            return response()->json([
                'message' => 'Incident notification successfully.',
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Incident Notification creation failed',
                'message' => $e->getMessage(),
            ],500);
        }

    }
}
