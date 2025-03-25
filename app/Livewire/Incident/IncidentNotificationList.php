<?php

namespace App\Livewire\Incident;

use App\Models\Incident\Incident;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class IncidentNotificationList extends Component
{
    public $notifications;

    public function mount(){
        $this->refresh();
    }

    public function refresh(){
        $this->notifications = DatabaseNotification::where('notifiable_type', Incident::class)->orderByDesc('created_at')->get();
    }
    public function render()
    {
        return view('livewire.incident.notification.list', ['notifications' => $this->notifications]);
    }

    public function openDeviceDetails($deviceId){
        $this->dispatch('openDeviceDetails', $deviceId);
    }

    public function openIncidentDetails($incident_id)
    {
        $this->dispatch('openIncidentDetailsModal', $incident_id);
    }

    public function markAsRead($notificationId){
        DatabaseNotification::where('id', $notificationId)->first()->markAsRead();
        $this->refresh();
        $this->dispatch('refreshNotificationList');
    }
}
