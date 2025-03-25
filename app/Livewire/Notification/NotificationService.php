<?php

namespace App\Livewire\Notification;

use App\Models\Service\Service;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class NotificationService extends Component
{

    protected $listeners = [
        'openNotificationServiceModal' => 'openModal',
    ];
    public $service;
    public $notification;
    public $showModal = false;

    public function render()
    {
        return view('livewire.notification.service');
    }

    public function openModal($model_id, $notification_id){
        $this->service = Service::find($model_id);
        $this->notification = DatabaseNotification::where('id',$notification_id)->first();
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

}
