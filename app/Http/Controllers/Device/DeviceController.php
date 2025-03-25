<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $devices = Device::with('status')->orderBy('id')->get();

        return view('devices.devices', compact( 'devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('device.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'uuid' => 'required',
            'type' => 'required',
            'name' => 'required',
            'location' => 'required',
            'room_size' => 'required',
            'base_noise_level' => 'required',
            'threshold' => 'required',
            'ip_address' => 'required',
            'port' => 'required',
            'mac_address' => 'required',
            'device_model' => 'required',
        ]);

        $device = Device::create($request->all());

        return response()->json(['message' => 'Device created successfully', 'device' => $device], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $device = Device::findOfFail($id);
        return response()->json($device);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $device = Device::findOfFail($id);
        return view('device.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'location' => 'required',
            'room_size' => 'required',
            'base_noise_level' => 'required',
            'threshold' => 'required',
            'ip_address' => 'required',
            'port' => 'required',
            'mac_address' => 'required',
            'device_model' => 'required',
        ]);

        $device = Device::findOfFail($id);
        $device->update($request->all());
        return response()->json(['message' => 'Device updated successfully', 'device' => $device]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $device = Device::findOfFail($id);
        $device->delete();
        return response()->json(['message' => 'Device deleted successfully']);
    }
}
