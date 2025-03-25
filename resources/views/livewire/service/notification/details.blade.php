<div>
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Device Details</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        @if($service !== null)
                            <div class="container">

                                @if($notification !== null)
                                    @php
                                        $notification_data = $notification['data']['data'];
                                    @endphp
                                    <h6 class="modal-title">Notification Details</h6>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>Title:</strong></p>
                                                <p class="text">{{$notification_data['title']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>Message:</strong></p>
                                                <p class="text">{{$notification_data['message']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>ID:</strong></p>
                                            <p>{{ $service->id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Name:</strong></p>
                                            <p>{{ $service->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Slug:</strong></p>
                                            <p  class="text-info">{{ $service->slug }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Type:</strong></p>
                                            <p>{{ $service->type }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Status:</strong></p>
                                            <p>{{ $service->status }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>Description:</strong></p>
                                            <p >{{ $service->description }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @else
                            <p>Service data not available.</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">{{__('general.close')}}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
