<?php

namespace App\Http\Controllers\Event;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function deviceNotification(Request $request): JsonResponse{
        return $this->broadcastNotification($request->all());
    }

    public function eventNotification(Request $request): JsonResponse{
        return $this->broadcastNotification($request->all());
    }

    public function incidentNotification(Request $request): JsonResponse{

    }

    public function broadcastNotification($notification): JsonResponse{
        try{
            broadcast(new NotificationEvent($notification));
            return response()->json([
                'status' => true,
                'message' => 'Notification has been sent!'
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

}
