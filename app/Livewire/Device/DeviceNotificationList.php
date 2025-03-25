<?php

namespace App\Livewire\Device;

use App\Models\Device\Device;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class DeviceNotificationList extends Component
{
    public $notifications;

    public function mount()
    {
        $this->refresh();
    }
    public function refresh()
    {
        $this->notifications = DatabaseNotification::where('notifiable_type', Device::class)->orderByDesc('created_at')->get();
    }
    public function render()
    {
        return view('livewire.device.notification.list', ['notifications' => $this->notifications]);
    }

    public function openDeviceDetails($deviceId){
        $this->dispatch('openDeviceDetails', $deviceId);
    }

    public function markAsRead($notificationId){
        DatabaseNotification::where('id', $notificationId)->first()->markAsRead();
        $this->refresh();
        $this->dispatch('refreshNotificationList');
    }
}
