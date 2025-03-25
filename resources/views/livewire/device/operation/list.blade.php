@php use Carbon\Carbon; @endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title mb-0">{{__('menu.device-operations')}}</h4>
                </div>
                <button wire:click="refreshTable" class="btn btn-success">
                    {{__('datatable.refresh')}}
                </button>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead >
                        <tr >
                            <th class="border-1">{{__('general.priority')}}</th>
                            <th class="border-1">{{__('general.date')}}</th>
                            <th class="border-1">{{__('device.operation')}}</th>
                            <th class="border-1">{{__('general.name')}}</th>
                            <th class="border-1">{{__('device.network')}}</th>
                            <th class="border-1">{{__('device.delivered')}}</th>
                            <th class="border-1">{{__('general.status')}}</th>

                        </tr>
                        </thead>

                        <tbody id="device-table-body">
                        @if($operations)

                            @foreach($operations as $operation)
                                @php
                                    switch ($operation->priority){
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

                                @endphp

                                <tr>
                                    <td class="border-1">
                                        <div class="d-flex align-items-center">
                                            <h6 class="text-{{$priority_color}}">{{ strtoupper($operation->priority)}}</h6>
                                        </div>
                                    </td >

                                    <td class="border-1">
                                        <div class="d-flex align-items-center">
                                            <h6>{{ $operation->created_at}}</h6>
                                        </div>
                                    </td >

                                    <td class="border-1">
                                        <div class="d-flex align-items-center">
                                            <h6>{{ strtoupper($operation->operation)}}</h6>
                                        </div>
                                    </td >

                                    <td>
                                        <button wire:click="openDeviceDetails({{$operation->device->id}})" type="button" class="btn btn-sm btn-soft-info">
                                            <span class="text-black">{{ $operation->device->name}}</span>
                                        </button>
                                    </td>

                                    <td class="border-1">
                                        <div class="d-flex align-items-center">
                                            <h6>{{ $operation->device->ip_address}}:{{ $operation->device->port}}</h6>
                                        </div>
                                    </td >

                                    <td class="border-1">
                                        @php
                                            if($operation->delivered){
                                                $delivered_color = 'success';
                                                $delivered_text = __('datatable.success');
                                            }
                                            else{
                                                $delivered_color = 'danger';
                                                $delivered_text = __('datatable.failed');
                                            }
                                        @endphp
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-soft-{{$delivered_color}} text-dark px-4 py-2">
                                                {{$delivered_text}}</span>
                                        </div>
                                    </td >
                                    <td class="border-1">
                                        @php
                                            if($operation->successful){
                                                $successful_color = 'success';
                                                $successful_text = __('datatable.success');
                                            }
                                            else{
                                                $successful_color = 'danger';
                                                $successful_text = __('datatable.failed');
                                            }
                                        @endphp
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-soft-{{$successful_color}} text-dark px-4 py-2">
                                                {{$successful_text}}</span>
                                        </div>
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

