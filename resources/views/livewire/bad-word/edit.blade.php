
<div>
    @if($showModal)

        <div class="origin-center modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('general.edit')}}</h5>
                        <button type="button" class="btn-close" wire:click="closeBadWordEditModal"></button>
                    </div>
                    <div class="modal-body">
                        @if($badWord)
                            <div class="container">
                                <form wire:submit.prevent="updateBadWord">
                                    @csrf
                                    <div class="row mb-3">
                                        <!-- ID Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id" class="form-label">{{__('general.id')}}</label>
                                                <input wire:model="id"  id="id" name="id" value="{{ $badWord->id }}"
                                                       type="text" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <!-- Type Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type" class="form-label">{{__('general.priority')}}</label>
                                                <input type="text" id="priority" name="priority" value="{{ $badWord->type }}"
                                                       wire:model="priority" class="form-control" placeholder="Enter type">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <!-- Word Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="word" class="form-label">{{__('bad-word.word')}}</label>
                                                <input wire:model="word" id="word" name="word" value="{{ $badWord->word }}"
                                                        type="text" class="form-control"  placeholder="Enter word">
                                            </div>
                                        </div>

                                        <!-- Match Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label for="match" class="form-label">{{__('bad-word.match')}}</label>
                                                <textarea wire:model="match" id="match" name="match"
                                                          class="form-control" rows="4" placeholder="{word1,word2}"
                                                >{{trim($badWord->match, "{}")}}</textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
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
                        <button type="button" class="btn btn-secondary" wire:click="closeBadWordEditModal">{{__('general.close')}}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
