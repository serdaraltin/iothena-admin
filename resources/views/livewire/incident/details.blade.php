@php use App\Models\Incident\IncidentBadWord;use Illuminate\Support\Facades\Storage; @endphp
<div>
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('general.details')}}</h5>
                        <button type="button" class="btn-close" wire:click="closeIncidentDetailsModal"></button>
                    </div>
                    <div class="modal-body">
                        @if($incident !== null)
                            @php
                                switch ($incident->priority){
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

                                 switch ($incident->verification){
                                     case "unverified";
                                         $verification_color = "danger";
                                         break;
                                     case "correct";
                                         $verification_color = "success";
                                         break;
                                     case "faulty";
                                         $verification_color = "warning";
                                         break;
                                 }
                                $human_color = match ($incident->human_count) {
                                    0 => "success",
                                    1 => "info",
                                    2 => "warning",
                                    default => "danger",
                                };
                            @endphp
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 text-center mt-3">
                                        @if($incident->hasMedia('photo'))
                                            @php
                                                 $path = 'photos/incidents/'.$incident->id.'.jpg';
                                                 if(!Storage::exists($path)){
                                                     $fileContent = Storage::disk('ftp')->get($incident->getFirstMediaUrl('photo'));
                                                     Storage::disk('public')->put($path, $fileContent);
                                                 }
                                            @endphp
                                            <img src="{{ Storage::disk('public')->url($path) }}"
                                                 class="img-fluid"
                                                 style="max-width: 600px; height: auto; display: block; margin-left: auto; margin-right: auto;"
                                                 alt="Incident Photo"/>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center mt-3">
                                        @if($incident->hasMedia('audio'))
                                            @php
                                                $path = 'audios/incidents/'.$incident->id.'.wav';
                                               if(!Storage::exists($path)){
                                                   $fileContent = Storage::disk('ftp')->get($incident->getFirstMediaUrl('audio'));
                                                   Storage::disk('public')->put($path, $fileContent);
                                               }
                                            @endphp
                                            <audio controls class="col-12 text-center mt-3" style="max-width: 600px;">
                                                <source src="{{ Storage::disk('public')->url($path) }}"
                                                        type="audio/mpeg">
                                            </audio>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.id')}}:</strong></p>
                                            <p>{{ $incident->id }}</p>
                                        </div>
                                    </div>


                                    <div class="col-8">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('incident.transcript')}}:</strong></p>
                                            <p class="text-info">{{ $incident->transcript }}</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.priority')}}:</strong></p>
                                            <p class="text-{{$priority_color}}">{{ __('general.'.$incident->priority) }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.device')}}:</strong></p>
                                            <p>{{ $incident->device->name }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('device.location')}}:</strong></p>
                                            <p>{{ $incident->device->location }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('incident.verification')}}:</strong></p>
                                            <p class="text-{{$verification_color}}">{{ __('incident.'.$incident->verification) }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('incident.human-count')}}:</strong></p>
                                            <p class="text-{{$human_color}}">{{ $incident->human_count }}</p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="d-flex justify-content-between">
                                            <p><strong>{{__('general.date')}}:</strong></p>
                                            <p>{{ $incident->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if($incident->additional !== null)
                                    <div class="row">
                                        @php
                                            $source = json_decode($incident->additional, true);
                                        @endphp
                                        @foreach($source as $key => $value)
                                            <div class="col-4">
                                                <div class="d-flex justify-content-between">
                                                    <p><strong>{{__('incident.'.str_replace('_', ' ', $key))}}:</strong></p>
                                                    <p>{{ $value}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            @php
                                $bad_words = $incident->badWords;
                            @endphp
                            @if($bad_words !== null )
                                <hr>
                                <div class="container">

                                    <div class="col-12">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                            <tr>
                                                <th style="text-transform: none; border: 1px solid #ddd;">{{__('general.bad-word')}}</th>
                                                <th style="text-transform: none; border: 1px solid #ddd;">{{__('bad-word.word')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($bad_words as $bad_word)
                                                <tr>
                                                    <td style="border: 1px solid #ddd;">{{ $bad_word->word }}</td>
                                                    <td style="border: 1px solid #ddd;">{{ $bad_word->match}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            @endif
                        @else
                            <p>{{'general.data-not-found'}}</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" wire:click="setCorrect">{{__('incident.correct')}}</button>
                        <button type="button" class="btn btn-warning" wire:click="setFaulty">{{__('incident.faulty')}}</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeIncidentDetailsModal">{{__('general.close')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
