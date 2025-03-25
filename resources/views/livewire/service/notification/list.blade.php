@php
 use App\Models\Service\Service;
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">{{__('menu.service-notifications')}}</h4>
                </div>
                <button wire:click="refresh" class="btn btn-success">
                    {{__('datatable.refresh')}}
                </button>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead>
                        <tr>
                            <th class="border-1">{{__('datatable.type')}}</th>
                            <th class="border-1">{{__('datatable.date')}}</th>
                            <th class="border-1">{{__('datatable.priority')}}</th>
                            <th class="border-1">{{__('datatable.service')}}</th>
                            <th class="border-1">{{__('datatable.title')}}</th>
                            <th class="border-1">{{__('datatable.message')}}</th>
                            <th class="border-1">{{__('datatable.read')}}</th>
                            <th class="border-1">{{__('datatable.action')}}</th>
                        </tr>
                        </thead>

                        <tbody id="device-table-body ">
                        @if($notifications)
                            @foreach($notifications as $notification)

                                @php
                                    $created_at = $notification->created_at;
                                    $read_at = $notification->read_at;
                                    $notification_id = $notification->id;
                                    $notification = $notification['data']['data'];
                                    $service = Service::where('id', $notification['model_id'] )->first();


                                    $priority_color = match ($notification['priority']){
                                      'low' => 'success',
                                      'medium' => 'info',
                                      'high' => 'warning',
                                      'critical' => 'danger',
                                    };

                                    $type_color = match ($notification['type']){
                                      'info' => 'success',
                                      'warning' => 'info',
                                      'error' => 'warning',
                                      'critical' => 'danger',
                                    };

                                @endphp

                                <tr @if($notification['type'] === "critical") class="bg-soft-danger" @endif>

                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6 class="text-{{$type_color}}">{{ strtoupper(__('general.'.$notification['type']))}}</h6>
                                        </div>
                                    </td>


                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6>{{ $created_at}}</h6>
                                        </div>
                                    </td>


                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6 class="text-{{$priority_color}}">{{ strtoupper(__('general.'.$notification['priority']))}}</h6>
                                        </div>
                                    </td>


                                    <td class="border-1">
                                        <div class="d-flex flex-wrap align-items-start">
                                            <h6>{{ strtoupper($service->name)}}</h6>
                                        </div>
                                    </td>


                                    <td class="border-1">
                                        <div class="text-start" style="word-wrap: break-word; white-space: normal;">
                                            <h6>{{ $notification['title'] }}</h6>
                                        </div>
                                    </td>

                                    <td class="border-1">
                                        <div class="text-start" style="word-wrap: break-word; white-space: normal;">
                                            <h6>{{ $notification['message'] }}</h6>
                                        </div>
                                    </td>

                                    <td class="border-1">
                                        @if($read_at)
                                            <div class="text-start" style="word-wrap: break-word; white-space: normal;">
                                                <h6>{{ $read_at }}</h6>
                                            </div>
                                        @else
                                            <button wire:click="markAsRead('{{$notification_id}}')" type="button"
                                                    class="btn btn-sm btn-soft-success">
                                                <span class="text-black">{{__('datatable.mark_read')}}</span>
                                            </button>
                                        @endif

                                    </td>

                                    <td class="border-1">
                                        <button wire:click="openServiceDetails({{$service->id}})" type="button"
                                                class="btn btn-sm btn-soft-info">
                                            {{__('datatable.details')}}
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                </svg>
                                            </span>
                                        </button>
                                    </td>

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

