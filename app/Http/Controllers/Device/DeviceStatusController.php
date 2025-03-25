<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceStatusRequest;
use App\Http\Requests\UpdateDeviceStatusRequest;
use App\Models\Device\DeviceStatus;

class DeviceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDeviceStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeviceStatus $deviceStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeviceStatus $deviceStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceStatusRequest $request, DeviceStatus $deviceStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeviceStatus $deviceStatus)
    {
        //
    }
}
