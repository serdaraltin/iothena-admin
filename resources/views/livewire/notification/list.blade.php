@php
    use App\Models\Device\Device;
    use App\Models\Event\Event;
    use App\Models\Incident\Incident;
    use Carbon\Carbon;

@endphp

<div class="sub-drop dropdown-menu dropdown-menu-end p-0" style="width: 500px;"
     aria-labelledby="notification-drop">

    <div class="card shadow-none m-0">

        <div class="card-header d-flex justify-content-between bg-primary py-3">
            <div class="header-title">
                <h5 class="mb-0 text-white">{{__('notification.all-notifications')}}</h5>
            </div>
        </div>

        <div class="card-body p-0" style="max-height: 400px; overflow-y: auto;">


            @if($notifications !== null)

                @foreach($notifications as $notification)

                    @php
                        $notificationData = $notification->data['data'];

                        $icon = 'warning.png';
                        $title = $notificationData['title'];
                        $message = $notificationData['message'];
                        $sub =   $notificationData['priority'];

                        $sub_color = match ($sub){
                            'low' => 'success',
                            'medium' => 'info',
                            'high' => 'warning',
                            'critical' => 'danger',
                            default => '',
                        };

                        $sub =  __('general.'.$notificationData['priority']);

                        $icon = match ($notification->notifiable_type) {
                            Incident::class => 'incident.png',
                            Event::class => 'event.png',
                            Device::class => 'device.png',
                            default => null,
                        };

                    @endphp

                    <a @if($notification->read_at === null) style="background: #bde9f9;" @endif
                    wire:click="openNotification('{{$notification->id}}')"
                       href="#" class="iq-sub-card">
                        <div class="d-flex align-items-center"  >
                            <img class="avatar-40 rounded-pill bg-soft-primary p-1"
                                 src="{{ asset('images/icons/'.$icon) }}"
                                 alt="{{$icon}}">

                            <div class="ms-3 w-100">
                                <h6 class="mb-0">{{ $title }}</h6>
                                <p class="mb-0">{{ $message }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-{{$sub_color}}">{{$sub}}</p>
                                    <small class="float-right font-size-12">
                                        {{ Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </small>
                                </div>
                            </div>

                        </div>
                    </a>
                @endforeach


            @else
                <a href="#" class="iq-sub-card">
                    <div class="d-flex align-items-center"  >
                        <img class="avatar-40 rounded-pill bg-soft-primary p-1"
                             src="{{ asset('images/logo/datakapan.svg') }}"
                             alt="datakapan.svg">

                        <div class="ms-3 w-100">
                            <h6 class="mb-0">Nothing Here :)</h6>
                        </div>

                    </div>
                </a>
            @endif
        </div>

    </div>
</div>