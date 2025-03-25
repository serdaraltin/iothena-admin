<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceOperationRequest;
use App\Http\Requests\UpdateDeviceOperationRequest;
use App\Models\Device\DeviceOperation;

class DeviceOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deviceOperations = DeviceOperation::with('device')->orderBy('created_at','desc')->get();
        return view('devices.operations', compact('deviceOperations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceOperationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeviceOperation $deviceOperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeviceOperation $deviceOperation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceOperationRequest $request, DeviceOperation $deviceOperation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeviceOperation $deviceOperation)
    {
        //
    }
}
