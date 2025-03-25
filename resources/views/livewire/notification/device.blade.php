<div>
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('general.details')}}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        @if($device !== null)
                            <div class="container">

                                @if($notification !== null)
                                    @php
                                        $notification_data = $notification['data']['data'];
                                    @endphp
                                    <h6 class="modal-title">{{__('general.notification-details')}}s</h6>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('notification.title')}}:</strong></p>
                                                <p class="text">{{$notification_data['title']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('notification.message')}}:</strong></p>
                                                <p class="text">{{$notification_data['message']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.uuid')}}:</strong></p>
                                                <p class="text-success">{{$device->uuid}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('general.id')}}:</strong></p>
                                                <p>{{ $device->id }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.location')}}:</strong></p>
                                                <p>{{ $device->location }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.ip-address')}}:</strong></p>
                                                <p  class="text-info">{{ $device->ip_address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('general.name')}}:</strong></p>
                                                <p>{{ $device->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.room-size')}} (m²):</strong></p>
                                                <p>{{ $device->room_size }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.port')}}:</strong></p>
                                                <p  class="text-info">{{ $device->port }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.type')}}:</strong></p>
                                                <p>{{ $device->type }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.base-noise-level')}}(dB):</strong></p>
                                                <p>{{ $device->base_noise_level }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.mac-address')}}:</strong></p>
                                                <p>{{ $device->mac_address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.model')}}:</strong></p>
                                                <p>{{ $device->model }}</p>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.threshold')}}:</strong></p>
                                                <p>{{ $device->threshold }}</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>N/A:</strong></p>
                                                <p>N/A</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            @if($device->status !== null)
                                <hr>
                                <div class="container">
                                    <div class="row">
                                        @php
                                            $status_value = $device->status->status;
                                            $status_color = match ($status_value) {
                                                'active' => 'success',
                                                'offline' => 'danger',
                                                default => 'info',
                                            };
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.status')}}:</strong></p>
                                                <p class="text-{{$status_color}}">{{ strtoupper($device->status->status)}}</p>
                                            </div>
                                        </div>
                                        @php
                                            $health_level = $device->status->health;
                                            if($health_level > 75)
                                                $health_color = 'success';
                                            elseif ($health_level > 50)
                                                $health_color = 'primary';
                                            elseif ($health_level > 40)
                                                $health_color = 'warning';
                                            else
                                                $health_color = 'danger';
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 me-3"><strong>{{__('device.health')}}:</strong></p>
                                                <div class="progress ms-2" style="height: 15px; width: 250px">
                                                    <div class="progress-bar bg-{{$health_color}} progress-bar-striped position-relative" role="progressbar"
                                                         style="width: {{ $device->status->health }}%;" aria-valuenow="{{ $device->status->health }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%);">
                                                            {{ $device->status->health }}%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $cpu_level = $device->status->cpu_usage;
                                            if($cpu_level < 40)
                                                $cpu_color = 'success';
                                            elseif ($cpu_level < 55)
                                                $cpu_color = 'primary';
                                            elseif ($cpu_level < 80)
                                                $cpu_color = 'warning';
                                            else
                                                $cpu_color = 'danger';
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 me-3"><strong>{{__('device.cpu')}}:</strong></p>
                                                <div class="progress ms-2" style="height: 15px; width: 250px">
                                                    <div class="progress-bar bg-{{$cpu_color}} progress-bar-striped position-relative" role="progressbar"
                                                         style="width: {{ $device->status->cpu_usage }}%;" aria-valuenow="{{ $device->status->cpu_usage }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%);">
                                                            {{ $device->status->cpu_usage }}%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>{{__('device.last-checked')}}:</strong></p>
                                                <p>{{ $device->status->last_checked }}</p>
                                            </div>
                                        </div>
                                        @php
                                            $temp_level = $device->status->temperature;
                                            if($temp_level < 40)
                                                $temp_color = 'success';
                                            elseif ($temp_level < 55)
                                                $temp_color = 'primary';
                                            elseif ($temp_level < 80)
                                                $temp_color = 'warning';
                                            else
                                                $temp_color = 'danger';
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 me-3"><strong>{{__('device.temperature')}}:</strong></p>
                                                <div class="progress ms-2" style="height: 15px; width: 250px">
                                                    <div class="progress-bar bg-{{$temp_color}} progress-bar-striped position-relative" role="progressbar"
                                                         style="width: {{ $device->status->temperature }}%;" aria-valuenow="{{ $device->status->temperature }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%);">
                                                            {{ $device->status->temperature }}°C
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $memory_level = $device->status->memory_usage;
                                            if($memory_level < 40)
                                                $memory_color = 'success';
                                            elseif ($memory_level < 55)
                                                $memory_color = 'primary';
                                            elseif ($memory_level < 80)
                                                $memory_color = 'warning';
                                            else
                                                $memory_color = 'danger';
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 me-3"><strong>{{__('device.memory')}}:</strong></p>
                                                <div class="progress ms-2" style="height: 15px; width: 250px">
                                                    <div class="progress-bar bg-{{$memory_color}} progress-bar-striped position-relative" role="progressbar"
                                                         style="width: {{ $device->status->memory_usage }}%;" aria-valuenow="{{ $device->status->memory_usage }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%);">
                                                            {{ $device->status->memory_usage }}%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0 me-3"><strong>N/A:</strong></p>
                                                <p>N/A</p>
                                            </div>
                                        </div>
                                        @php
                                            $battery_level = $device->status->battery_level;
                                            if($battery_level > 75)
                                                $battery_color = 'success';
                                            elseif ($battery_level > 45)
                                                $battery_color = 'primary';
                                            elseif ($battery_level > 30)
                                                $battery_color = 'warning';
                                            else
                                                $battery_color = 'danger';
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 me-3"><strong class="label text-fixed">{{__('device.battery')}}:</strong></p>
                                                <div class="progress ms-2" style="height: 15px; width: 250px">
                                                    <div class="progress-bar bg-{{$battery_color}} progress-bar-striped position-relative" role="progressbar"
                                                         style="width: {{ $device->status->battery_level }}%;" aria-valuenow="{{ $device->status->battery_level }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%);">
                                                            {{ $device->status->battery_level }}%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $disk_level = $device->status->disk_usage;
                                            if($disk_level < 40)
                                                $disk_color = 'success';
                                            elseif ($disk_level < 60)
                                                $disk_color = 'primary';
                                            elseif ($disk_level < 85)
                                                $disk_color = 'warning';
                                            else
                                                $disk_color = 'danger';
                                        @endphp
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 me-3"><strong class="label text-fixed">{{__('device.disk')}}:</strong></p>
                                                <div class="progress ms-2" style="height: 15px; width: 250px">
                                                    <div class="progress-bar bg-{{$disk_color}} progress-bar-striped position-relative" role="progressbar"
                                                         style="width: {{ $device->status->disk_usage }}%;" aria-valuenow="{{ $device->status->disk_usage }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        <span class="position-absolute w-100 text-center" style="top: 50%; transform: translateY(-50%);">
                                                            {{ $device->status->disk_usage }}%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="container">

                                    <div class="col-12">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th style="text-transform: none; border: 1px solid #ddd;">{{__('device.service-name')}}</th>
                                                <th style="text-transform: none; border: 1px solid #ddd;">{{__('device.version')}}</th>
                                                <th style="text-transform: none; border: 1px solid #ddd;">{{__('device.status')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $services = json_decode($device->status->services, true);

                                            @endphp
                                            @foreach($services as $service)
                                                @php
                                                    $status_value = $service['status'];
                                                      switch ($status_value){
                                                           case 'running':
                                                               $status_color = 'success';
                                                               break;
                                                           case 'stopped':
                                                               $status_color = 'danger';
                                                               break;
                                                      }
                                                @endphp
                                                <tr>
                                                    <td style="border: 1px solid #ddd;" >{{ $service['name'] }}</td>
                                                    <td style="border: 1px solid #ddd;" >{{ $service['version'] }}</td>
                                                    <td style="border: 1px solid #ddd;" class="text-{{$status_color}}">{{ $service['status'] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            @endif
                        @else
                            <p>{{__('general.data-not-found')}}</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="refreshNotificationDevice({{$device->id}})">
                            {{__('general.refresh')}}</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">{{__('general.close')}}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
