
<div>
    @if($showModal)

        <div class="origin-center modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('general.add')}}</h5>
                        <button type="button" class="btn-close" wire:click="closeBadWordAddModal"></button>
                    </div>
                    <div class="modal-body">
                            <div class="container">
                                <form wire:submit.prevent="addBadWord">
                                    @csrf
                                    <div class="row mb-3">
                                        <!-- Type Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type" class="form-label">{{__('general.priority')}}</label>
                                                <select id="type" name="type" wire:model="priority" class="form-control">
                                                    <option value="low" selected>{{__('general.low')}}</option>
                                                    <option value="medium">{{__('general.medium')}}</option>
                                                    <option value="high">{{__('general.high')}}</option>
                                                    <option value="critic">{{__('general.critical')}}</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- Word Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="word" class="form-label">{{__('bad-word.word')}}</label>
                                                <input wire:model="word" id="word" name="word" value=""
                                                       type="text" class="form-control"  placeholder="Enter word">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">


                                        <!-- Match Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="match" class="form-label">{{__('bad-word.match')}}</label>
                                                <textarea wire:model="match" id="match" name="match"
                                                          class="form-control" rows="4" placeholder='{word1,word2}'
                                                >{word1,word2}</textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">{{__('general.add')}}</button>
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

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeBadWordAddModal">{{__('general.close')}}
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
