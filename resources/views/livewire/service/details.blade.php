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
                        @if($service !== null)
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.id')}}:</strong></p>
                                            <p>{{ $service->id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.name')}}:</strong></p>
                                            <p>{{ $service->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('service.slug')}}:</strong></p>
                                            <p>{{ $service->slug }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.type')}}:</strong></p>
                                            <p>{{ $service->type }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.status')}}:</strong></p>
                                            <p>{{ __('service.'.$service->status) }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.description')}}:</strong></p>
                                            <p >{{ $service->description }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @else
                            <p>{{'genera.data-not-found'}}</p>
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
