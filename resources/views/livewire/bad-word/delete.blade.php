<div>
    @if($showModal)
        <div class="modal fade show d-block" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('general.confirm-required')}}</h5>
                        <button type="button" class="btn-close" wire:click="closeBadWordDeleteModal"></button>
                    </div>
                    <div class="modal-body">
                        {{__('general.delete-question')}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" wire:click="deleteBadWord"> {{__('general.yes')}}</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeBadWordDeleteModal">  {{__('general.no')}}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
