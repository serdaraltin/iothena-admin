<div>
        @if($showModal)

            <div class="origin-center modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{__('general.edit')}}</h5>
                            <button type="button" class="btn-close" wire:click="closeDeviceEdit"></button>
                        </div>
                        <div class="modal-body">
                            @if($device)
                               <!-- <p><strong>ID:</strong> {{ $device->id }}</p> -->
                                <div class="container">
                                    <form wire:submit.prevent="updateDevice">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="name" class="form-label">{{__('general.id')}}</label>
                                                <input disabled wire:model="device_id" value="{{ $device->id }}" type="text" id="device_id" name="name" class="form-control" placeholder="Enter device name">
                                            </div>
                                            <div class="col-6">
                                                <label for="name" class="form-label">{{__('general.name')}}</label>
                                                <input  wire:model="name" value="{{ $device->name }}" id="name" name="name" class="form-control" placeholder="Enter device name">
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-6">
                                                <label for="model" class="form-label">{{__('device.model')}}</label>
                                                <select  wire:model="model" disabled id="model" name="model" class="form-select">
                                                    <option value="model_1" selected>Sentinel</option>
                                                    <option value="model_2">Voice</option>
                                                    <option value="model_3">Other</option>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="type" class="form-label">{{__('device.type')}}</label>
                                                <select  wire:model="type" disabled id="type" name="type" class="form-select">
                                                    <option value="Raspberry_Pi_4" selected >Raspberry Pi</option>
                                                    <option value="arduino">Arduino</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-6">
                                                <label for="location" class="form-label">{{__('device.location')}}</label>
                                                <input  wire:model="location" value="{{ $device->location }}" type="text" id="location" name="location" class="form-control" placeholder="Enter device location">
                                            </div>
                                            <div class="col-6">
                                                <label for="room_size" class="form-label">{{__('device.room-size')}} (m²)</label>
                                                <input  wire:model="room_size" value="{{ $device->room_size }}" type="number" id="room_size" name="room_size" class="form-control" placeholder="Enter room size">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="ip_address" class="form-label">{{__('device.ip-address')}}</label>
                                                <input  wire:model="ip_address" value="{{ $device->ip_address }}" type="text" id="ip_address" name="ip_address" class="form-control" placeholder="Enter device IP address">
                                            </div>

                                            <div class="col-6">
                                                <label for="base_noise_level" class="form-label">{{__('device.base-noise-level')}} (dB)</label>
                                                <input  wire:model="base_noise_level" value="{{ $device->base_noise_level }}" type="number" id="base_noise_level" name="base_noise_level" class="form-control" placeholder="Enter base noise level">
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="port" class="form-label">{{__('device.port')}}</label>
                                                <input  wire:model="port" value="{{ $device->port }}" type="number" id="port" name="port" class="form-control" placeholder="Enter port number">
                                            </div>
                                            <div class="col-6">
                                                <label for="threshold" class="form-label">{{__('device.threshold')}}</label>
                                                <input  wire:model="threshold" value="{{ $device->threshold }}" type="number" id="threshold" name="threshold" class="form-control" placeholder="Enter threshold value">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">{{__('general.update')}}</button>
                                    </form>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success mt-3">
                                            {{session('message')}}
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>

                            @else
                                <p>{{__('general.data-not-found')}}</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeDeviceEdit">{{__('general.close')}}
                        </div>
                    </div>
                </div>
            </div>

        @endif
</div>
