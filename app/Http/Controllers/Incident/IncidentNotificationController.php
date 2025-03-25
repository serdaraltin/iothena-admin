<?php

namespace App\Http\Controllers\Incident;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncidentNotificationRequest;
use App\Http\Requests\UpdateIncidentNotificationRequest;
use App\Models\Incident\IncidentNotification;

class IncidentNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('incident.notifications');
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
    public function store(StoreIncidentNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IncidentNotification $incidentNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentNotification $incidentNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidentNotificationRequest $request, IncidentNotification $incidentNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentNotification $incidentNotification)
    {
        //
    }
}
