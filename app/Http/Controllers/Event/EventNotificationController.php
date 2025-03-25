<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventNotificationRequest;
use App\Http\Requests\UpdateEventNotificationRequest;
use App\Models\Event\EventNotification;

class EventNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('system.event.notifications');
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
    public function store(StoreEventNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventNotification $eventNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventNotification $eventNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventNotificationRequest $request, EventNotification $eventNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventNotification $eventNotification)
    {
        //
    }
}
