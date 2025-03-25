<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\Controller;
use App\Models\Device\DeviceStatus;
use Illuminate\Http\Request;

class DeviceStatusController extends Controller
{
    public function index(){
        $deviceStatuses = DeviceStatus::all();
        return response()->json($deviceStatuses);
    }

    public function show(Request $request){
        $deviceStatus = DeviceStatus::where("id", $request->id)->first();
        if(!$deviceStatus)
            return response()->json(["message" => "Not found"], 404);
        return response()->json($deviceStatus, 200);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'device_id' => 'required',
            'status' => 'required',
            'health' => 'required',
            'temperature' => 'required',
            'battery_level' => 'required',
            'cpu_usage' => 'required',
            'memory_usage' => 'required',
            'disk_usage' => 'required',
            'services' => 'required',
            'last_checked' => 'required',
        ]);

        try{
            $deviceStatus = DeviceStatus::create($validatedData);
            return response()->json([
                "message" => "DeviceStatus created",
                "data" => $deviceStatus
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Status creation failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request){

        $deviceStatus = DeviceStatus::where("id", $request->id)->first();
        if(!$deviceStatus)
            return response()->json(["message" => "Not found"], 404);


        $validatedData = $request->validate([
            'device_id' => 'nullable',
            'status' => 'nullable',
            'health' => 'nullable',
            'temperature' => 'nullable',
            'battery_level' => 'nullable',
            'cpu_usage' => 'nullable',
            'memory_usage' => 'nullable',
            'disk_usage' => 'nullable',
            'services' => 'nullable',
            'last_checked' => 'nullable',
        ]);

        try{
            $deviceStatus->update($validatedData);
            return response()->json([
                "message" => "Device Status updated",
                "data" => $deviceStatus
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Device Status update failed',
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function destroy(Request $request){
        $deviceStatus = DeviceStatus::where("id", $request->id)->first();
        if(!$deviceStatus)
            return response()->json(["message" => "Not found"], 404);

        try{
            $deviceStatus->delete();
            return response()->json([
                "message" => "Device Status deleted"
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Device Status delete failed',
                'message' => $e->getMessage()
            ],500);
        }

    }


}
