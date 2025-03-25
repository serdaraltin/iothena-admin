<?php

use App\Models\Device\Device;
use App\Models\User\User;

?>
<div>
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('general.notification-details')}}</h5>
                        <button type="button" class="btn-close"
                                wire:click="closeIncidentNotificationDetailsModal"></button>
                    </div>
                    <div class="modal-body">

                        @if($incidentNotification !== null)
                            @php
                                switch ($incidentNotification->type){
                                  case "info";
                                      $type_color = "success";
                                      break;
                                  case "warning";
                                      $type_color = "warning";
                                      break;
                                    case "critical":
                                    case "error";
                                      $type_color = "danger";
                                      break;
                                }

                            @endphp
                            <h6 class="modal-title">{{__('general.notification-details')}}</h6>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('notification.title')}}:</strong></p>
                                            <p class="text-info">{{ $incidentNotification->title }}</p>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('notification.message')}}:</strong></p>
                                            <p class="text-info">{{ $incidentNotification->message }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.id')}}:</strong></p>
                                            <p>{{ $incidentNotification->id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.type')}}:</strong></p>
                                            <p class="text-{{$type_color}}">{{ strtoupper($incidentNotification->type) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.priority')}}:</strong></p>
                                            <p>{{ strtoupper(__('genera.'.$incidentNotification->priority)) }}</p>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    @php
                                        switch($incidentNotification->recipient_type ){
                                            case "device":
                                                $recipient_name = Device::find($incidentNotification->recipient_id)->name;
                                                break;
                                            case "user":
                                                $recipient_name = User::find($incidentNotification->recipient_id)->username;
                                                break;
                                        }

                                    @endphp
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Recipient:</strong></p>
                                            <p>{{ $recipient_name ?? 'Not Found'}}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Recipient Type:</strong></p>
                                            <p>{{ $incidentNotification->recipient_type }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.date')}}:</strong></p>
                                            <p>{{ $incidentNotification->created_at }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Delivery Method:</strong></p>
                                            <p>{{ $incidentNotification->delivery_method }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Delivery Status:</strong></p>
                                            <p>@if($incidentNotification->delivered)
                                                    Success
                                                @else
                                                    Failed
                                                @endif</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Delivery Time:</strong></p>
                                            <p>{{ $incidentNotification->delivery_time }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @else
                            <p>Incident Notification data not available.</p>
                        @endif

                        @php
                            $incident = $incidentNotification->incident;
                        @endphp
                        @if($incident !== null)
                            @php
                                switch ($incident->priority){
                                     case "low";
                                         $priority_color = "success";
                                         break;
                                     case "medium";
                                         $priority_color = "info";
                                         break;
                                     case "high";
                                         $priority_color = "warning";
                                         break;
                                     case "critical";
                                         $priority_color = "danger";
                                         break;
                                 }

                                 switch ($incident->status){
                                     case "open";
                                         $status_color = "danger";
                                         break;
                                     case "resolved";
                                         $status_color = "success";
                                         break;
                                     case "in_progress";
                                         $status_color = "warning";
                                         break;
                                 }
                                $human_color = match ($incident->human_count) {
                                    0 => "success",
                                    1 => "info",
                                    2 => "warning",
                                    default => "danger",
                                };
                            @endphp
                            <h6 class="modal-title">Incident Details</h6>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>ID:</strong></p>
                                            <p>{{ $incident->id }}</p>
                                        </div>
                                    </div>


                                    <div class="col-8">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Transcript:</strong></p>
                                            <p class="text-info">{{ $incident->transcript }}</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Priority:</strong></p>
                                            <p class="text-{{$priority_color}}">{{ strtoupper($incident->priority) }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Device:</strong></p>
                                            <p>{{ $incident->device->name }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Location:</strong></p>
                                            <p>{{ $incident->device->location }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Status:</strong></p>
                                            <p class="text-{{$status_color}}">{{ strtoupper($incident->status) }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Human Count:</strong></p>
                                            <p class="text-{{$human_color}}">{{ $incident->human_count }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Date:</strong></p>
                                            <p>{{ $incident->created_at }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @php
                                        $source = json_decode($incident->additional, true);
                                    @endphp
                                    @foreach($source as $key => $value)
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{ucwords(str_replace('_', ' ', $key))}}:</strong></p>
                                                <p>{{ $value}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            @php
                                $bad_words = $incident->badWords;
                            @endphp
                            @if($bad_words !== null )
                                <hr>
                                <div class="container">

                                    <div class="col-12">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th style="text-transform: none; border: 1px solid #ddd;">Bad Word</th>
                                                <th style="text-transform: none; border: 1px solid #ddd;">Match</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($bad_words as $bad_word)
                                                <tr>
                                                    <td style="border: 1px solid #ddd;" >{{ $bad_word->word }}</td>
                                                    <td style="border: 1px solid #ddd;" >{{ $bad_word->match}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            @endif
                        @else
                            <p>Incident data not available.</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeIncidentNotificationDetailsModal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
