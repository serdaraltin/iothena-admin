@php use Illuminate\Support\Facades\Storage; @endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">{{__('incident.'.$filterPriority)}}</h4>
                </div>
                <button wire:click="refresh" class="btn btn-success">
                    {{__('datatable.refresh')}}
                </button>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead >
                        <tr>
                            <th class="border-1">{{__('general.image')}}  </th>
                            <th class="border-1">{{__('general.priority')}}  </th>
                            <th class="border-1">{{__('general.date')}}  </th>
                            <th class="border-1">{{__('general.device')}}  </th>
                            <th class="border-1">{{__('device.location')}}  </th>
                            <th class="border-1">{{__('incident.transcript')}}  </th>
                            <th class="border-1">{{__('incident.human-count')}}  </th>
                            <th class="border-1">{{__('incident.verification')}}  </th>
                           <!-- <th class="border-1">{{__('general.action')}}  </th>-->
                        </tr>
                        </thead>

                        <tbody id="device-table-body ">
                        @if($incidents)

                            @foreach($incidents as $incident)
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

                                     switch ($incident->verification){
                                         case "unverified";
                                             $verification_color = "warning";
                                             break;
                                         case "correct";
                                             $verification_color = "success";
                                             break;
                                         case "faulty";
                                             $verification_color = "danger";
                                             break;
                                     }
                                      switch ($incident->human_count){
                                         case 0;
                                             $human_color = "success";
                                             break;
                                         case 1;
                                             $human_color = "info";
                                             break;
                                         case 2;
                                             $human_color = "warning";
                                             break;
                                         default:
                                             $human_color = "danger";
                                             break;
                                     }
                                @endphp
                                <tr @if($priority_color =="danger") class="bg-soft-danger" @endif>

                                    <td  style="cursor:pointer;" wire:click="openIncidentDetailsModal({{$incident->id}})"  class="border-1">
                                        @if($incident->hasMedia('photo'))
                                            @php
                                                $path = 'photos/incidents/'.$incident->id.'.jpg';
                                                if(!Storage::exists($path)){
                                                    $fileContent = Storage::disk('ftp')->get($incident->getFirstMediaUrl('photo'));
                                                    Storage::disk('public')->put($path, $fileContent);
                                                }
                                            @endphp
                                            <img src="{{ Storage::disk('public')->url($path) }}"
                                                 class="img-fluid"
                                                 style="max-width: 130px; height: auto; display: block; margin-left: auto; margin-right: auto;"
                                                 alt="Incident Photo"/>
                                        @endif
                                    </td>
                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6 class="text-{{$priority_color}}">{{ strtoupper($incident->priority)}}</h6>
                                        </div>
                                    </td >
                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6 class="">{{ $incident->created_at}}</h6>
                                        </div>
                                    </td >

                                    <td>
                                        <button wire:click="openDeviceDetails({{$incident->device->id}})" type="button" class="btn btn-sm btn-soft-info">
                                            <span class="text-black">{{ $incident->device->name}}</span>
                                        </button>
                                    </td>

                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6 class="">{{ $incident->device->location}}</h6>
                                        </div>
                                    </td >

                                    <td class="border-1">
                                        <div class="text-start" style="word-wrap: break-word; white-space: normal;">
                                            <h6 class="">{{ $incident->transcript}}</h6>
                                        </div>
                                    </td >

                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6 class="text-{{$human_color}}">{{ $incident->human_count}}</h6>
                                        </div>
                                    </td >

                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <span class="badge rounded-pill bg-{{$verification_color}} px-3 py-2" style="font-size: 0.8rem;">{{ __('datatable.'.$incident->verification) }}</span>
                                        </div>
                                    </td >
                                    <!--<td>
                                        <button wire:click="openIncidentDetailsModal({{$incident->id}})" type="button" class="btn btn-sm btn-soft-info">
                                            {{__('datatable.details')}}
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                </svg>
                                            </span>
                                        </button>
                                    </td>-->
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

