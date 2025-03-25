<?php

namespace App\Livewire\Notification;

use App\Events\NotificationEvent;
use App\Models\Device\Device;
use App\Models\Event\Event;
use App\Models\Incident\Incident;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class NotificationNew extends Component
{

    public $notifications;
    protected $listeners = [
        'refreshNotificationList' => 'refresh',
        'openNotification' => 'openNotification',
    ];

    public function mount(){
        $this->refresh();
    }
    public function render()
    {
        return view('livewire.notification.list');
    }

    public function refresh(){
        $this->notifications = DatabaseNotification::whereIn('notifiable_type', [
            Incident::class,
            Event::class,
            Device::class,
            ])->orderByDesc('created_at')->get();
    }

    public function openNotification($notification_id){
        $notification = DatabaseNotification::where('id',$notification_id)->first();
        $notification->markAsRead();

        $modal = match ($notification->notifiable_type) {
            Incident::class => 'openNotificationIncidentModal',
            Event::class => 'openNotificationEventModal',
            Device::class => 'openNotificationDeviceModal',
        };

        $this->dispatch($modal, $notification->notifiable_id, $notification_id);

        $this->refresh();
    }


}
