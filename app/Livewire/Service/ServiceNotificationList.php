<?php

namespace App\Livewire\Service;

use App\Models\Service\Service;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class ServiceNotificationList extends Component
{
    public $notifications;

    public function mount()
    {
        $this->refresh();
    }
    public function render()
    {
        return view('livewire.service.notification.list');
    }
    public function refresh(){
        $this->notifications = DatabaseNotification::where('notifiable_type', Service::class)
            ->orderByDesc('created_at')->get();
    }

    public function markAsRead($notificationId){
        DatabaseNotification::where('id', $notificationId)->first()->markAsRead();
        $this->refresh();
        $this->dispatch('refreshNotificationList');
    }

    public function openServiceDetails($service_id){
        $this->dispatch('openServiceDetails', $service_id);
    }
}
