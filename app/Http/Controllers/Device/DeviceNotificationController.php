<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceNotificationRequest;
use App\Http\Requests\UpdateDeviceNotificationRequest;
use App\Models\Device\DeviceNotification;

class DeviceNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('devices.notification');
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
    public function store(StoreDeviceNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeviceNotification $deviceNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeviceNotification $deviceNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceNotificationRequest $request, DeviceNotification $deviceNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeviceNotification $deviceNotification)
    {
        //
    }
}
