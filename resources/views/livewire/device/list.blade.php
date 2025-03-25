@php use Carbon\Carbon; @endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">{{__('menu.all-devices')}}</h4>
                </div>
                <div>
                    <button wire:click="openDeviceAddModal" class="btn btn-info">
                        {{__('general.add')}}
                    </button>
                    <button wire:click="refreshTable" class="btn btn-success">
                        {{__('general.refresh')}}
                    </button>
                </div>

            </div>

            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead >
                        <tr >
                            <th class="border-1">{{__('general.type')}}</th>
                            <th class="border-1">{{__('general.id')}}</th>
                            <th class="border-1">{{__('general.name')}}</th>
                            <th class="border-1">{{__('device.location')}}</th>
                            <th class="border-1">{{__('device.status')}}</th>
                            <th class="border-1">{{__('device.last-checked')}}</th>
                            <th class="border-1">{{__('device.health')}}</th>
                            <th class="border-1">{{__('general.action')}}</th>
                        </tr>
                        </thead>

                        <tbody id="device-table-body">
                        @foreach($devices as $device)

                            @php
                                if($device->status !== null){
                                    $status_text = $device->status->status;
                                    switch ($status_text){
                                        case 'active':
                                            $status_color = 'success';
                                            break;
                                        case 'offline':
                                            $status_color = 'danger';
                                            break;
                                        case 'maintenance':
                                            $status_color = 'info';
                                            break;
                                    }

                                    $health_value = $device->status->health;
                                    if($health_value > 75)
                                        $health_color = 'success';
                                    elseif($health_value > 50)
                                        $health_color = 'info';
                                    elseif($health_value > 20)
                                        $health_color = 'warning';
                                    else
                                        $health_color = 'danger';

                                    $lastOnline = Carbon::parse($device->status->last_checked);
                                    $last_activity = (int) $lastOnline->diffInMinutes(Carbon::now())." minute ago";
                                }else{
                                    $status_text = 'N/A';
                                    $status_color = 'text';

                                    $health_value = 'N/A';
                                    $health_color = 'text';

                                    $last_activity = "Never Online";
                                }

                            @endphp

                            <tr>
                                <td class="border-1">
                                    <img class="rounded img-fluid avatar-40 me-3 bg-soft-primary"
                                         @php $device_logo = 'images/device/'.$device['type'].'.png' @endphp
                                         src="{{asset($device_logo)}}" alt="profile">
                                </td>

                                <td class="border-1">
                                    <div class="d-flex align-items-center">
                                        <h6>{{$device['id']}}</h6>
                                    </div>
                                </td >


                                <td>
                                    <button wire:click="openDeviceDetails({{$device->id}})" type="button" class="btn btn-sm btn-soft-info">
                                        <span class="text-black">{{ $device->name}}</span>
                                    </button>
                                </td>

                                <td class="border-1">
                                    {{$device['location']}}
                                </td>

                                <td class="border-1">
                                    <div class="text-{{$status_color ?? 'danger' }}">{{strtoupper($status_text) ?? 'N/A' }}</div>
                                </td>

                                <td class="border-1">
                                    {{$last_activity ?? 'Never Online' }}
                                </td>

                                <td class="border-1">
                                    <div class="d-flex align-items-center mb-2">
                                        <h6>{{$health_value}}
                                        @if($health_value !== 'N/A'){{'%'}} @endif</h6>
                                    </div>

                                    <div class="progress shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-{{$health_color}}"
                                             role="progressbar"
                                             style="width: {{$health_value}}%;"
                                             aria-valuenow="{{$health_value}}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                </td>

                                <td class="border-1">
                                   <!-- <button wire:click="openDeviceDetails({{$device['id']}})" type="button" class="btn btn-sm btn-soft-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                        </svg>
                                    </button>-->

                                    <button wire:click="openDeviceEdit({{$device['id']}})" type="button" class="btn btn-sm btn-soft-primary" @if($device->status === null) disabled @endif>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </span>
                                    </button>

                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <button  @if($device->status === null) disabled @endif class="btn btn-sm btn-soft-warning dropdown-toggle" type="button" id="dropdownRightMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                                                    <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownRightMenuButton">
                                                <li><h6 class="dropdown-header">{{__('device.power-operation')}}</h6></li>
                                                <li><button class="dropdown-item" href="#">{{__('device.reboot')}}</button></li>
                                                <li><button disabled class="dropdown-item" href="#">{{__('device.power-off')}}</button></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><h6 class="dropdown-header">{{__('device.service-operation')}}</h6></li>
                                                <li><button disabled class="dropdown-item" href="#">{{__('device.restart')}}</button></li>
                                                <li><button disabled class="dropdown-item" href="#">{{__('device.enable')}}</button></li>
                                                <li><button disabled class="dropdown-item" href="#">{{__('device.disable')}}</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

