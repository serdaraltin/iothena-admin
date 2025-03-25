<?php

namespace App\Http\Controllers\Api\Service;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use App\Notifications\NotificationService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function validateData(Request $request){
        $validatedData = $request->validate([
            'slug' => 'required',
            'type' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        return $validatedData;
    }
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }

    public function show(Request $request){
        $service = Service::where('id', $request->id)->first();
        if(!$service)
            return response()->json(["message" => "Service not found"], 404);
        return response()->json($service);
    }

    public function store(Request $request)
    {
        try{
            $service = Service::create($this->validateData($request));
            return response()->json([
                "message" => "Service created",
                "service" => $service
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Service creation failed',
                'message' => $e->getMessage()
                ], 500);
        }
    }

    public function update(Request $request)
    {
        $service = Service::where('id', $request->id)->first();
        if(!$service)
            return response()->json(["message" => "Service not found"], 404);

        try{
            $service->update($this->validateData($request));
            return response()->json([
                "message" => "Service updated successfully",
                'service' => $service,
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Service update failed',
                'message' => $e->getMessage()
            ],500);
        }
    }

    public function destroy(Request $request)
    {
        $service = Service::where('id', $request->id)->first();

        try{
            $service->delete();
            return response()->json([
                "message" => "Service deleted successfully"
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Service delete failed',
                'message' => $e->getMessage()
            ],500);
        }
    }

    public function notification(Request $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        $service = Service::where('slug', $validatedData['slug'])->first();
        if(!$service)
            return response()->json(["message" => "Service not found"], 404);
        try{

            $notification = [
                'model_type' => Service::class,
                'model_id' => $service->id,
                'type' => $validatedData['type'],
                'priority' => $validatedData['priority'],
                'title' => $validatedData['title'],
                'message' => $validatedData['message'],
            ];

            $service->notify(new NotificationService($notification));
            $notification_id = $service->notifications()->orderByDesc('created_at')->value('id');

            $model = [
                'model_type' => Service::class,
                'model_id' => $service->id,
                'notification_id' => $notification_id,
            ];
            broadcast(new NotificationEvent($model));

            return response()->json([
                'message' => 'Service notification successfully',
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Service notification failed',
                'message' => $e->getMessage()
            ],500);
        }
    }
}