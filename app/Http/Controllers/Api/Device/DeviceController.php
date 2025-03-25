<?php

namespace App\Http\Controllers\Api\Device;

use App\Events\DeviceEvent;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use App\Models\Device\DeviceNotification;
use App\Models\User\User;
use App\Notifications\NotificationDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DeviceController extends Controller
{

    public function index(){
        $devices = Device::all();
        return response()->json($devices);
    }

    public function show(Request $request){
        $device = Device::where('uuid', $request->uuid)->first();
        if (!$device)
            return response()->json(['message' => 'Device not found'], 404);
        return response()->json($device, 200);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'uuid' => 'required',
            'type' => 'required',
            'model' => 'required',
            'name' => 'required',
            'location' => 'required',
            'room_size' => 'required',
            'base_noise_level' => 'required',
            'threshold' => 'required',
            'ip_address' => 'required',
            'port' => 'integer',
            'mac_address' => 'required',
        ]);

        try {
            $device = Device::create($validatedData);
            return response()->json([
                    'message' => 'Device successfully created.',
                    'device' => $device
                ]
                , 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => 'Device creation failed.',
                'message' => $e->getMessage()
            ],500);
        }

    }

    public function update(Request $request){
        $device = Device::where('uuid', $request->uuid)->first();
        if(!$device)
            return response()->json(['message' => 'Device not found'], 404);

        $validatedData = $request->validate([
            'type' => 'string',
            'model' => 'string',
            'name' => 'string',
            'location' => 'string',
            'room_size' => 'integer',
            'base_noise_level' => 'required',
            'threshold' => 'required',
            'ip_address' => 'required',
            'port' => 'integer',
            'mac_address' => 'required',
        ]);

        $device->update($validatedData);

        return response()->json([
            'message' => 'Device updated successfully',
            'device' => $device
        ], 200);
    }

    public function destroy(Request $request){
        $device = Device::where('uuid', $request->uuid)->first();
        if(!$device)
            return response()->json(['message' => 'Device not found'], 404);
        $device->delete();
        return response()->json(['message' => 'Device deleted successfully'], 200);
    }

    public function notification(Request $request){
        $validatedData = $request->validate([
            'device_uuid' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        $device = Device::where('uuid', $request->get('device_uuid'))->first();

        if(!$device)
            return response()->json(['message' => 'Device not found'], 404);

        $notification = [
            'model_type' => Device::class,
            'model_id' => $device->id,
            'type' => $validatedData['type'],
            'priority' =>  $validatedData['priority'],
            'title' => $validatedData['title'],
            'message' => $validatedData['message'],
        ];

        //$users = User::all();
        //Notification::send($users, new NotificationDevice($notification));

        $device->notify(new NotificationDevice($notification));
        $notification_id = $device->notifications()->orderByDesc('created_at')->value('id');

        $model = [
            'model_type' => Device::class,
            'model_id' => $device->id,
            'notification_id' => $notification_id,
        ];

        DeviceEvent::dispatch($device->id);

        //broadcast(new NotificationEvent($model));

        try{

            return response()->json([
                'message' => 'Device Notification creation successfully.',
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Device Notification creation failed',
                'message' => $e->getMessage(),
            ],500);
        }
    }
}
