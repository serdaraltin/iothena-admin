<?php

namespace App\Livewire\Notification;

use App\Models\Device\Device;
use App\Models\Incident\Incident;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationDevice extends Component
{

    protected $listeners = [
        'openNotificationDeviceModal' => 'openModal',
        'refreshNotificationDevice' => 'refreshNotificationDevice',
    ];
    public $device;
    public $notification;
    public $showModal = false;

    public function render()
    {
        return view('livewire.notification.device');
    }

    public function refreshNotificationDevice($device_id){
        $this->device = Device::find($device_id);
    }


    public function openModal($model_id, $notification_id){
        $this->device = Device::find($model_id);
        $this->notification = DatabaseNotification::where('id',$notification_id)->first();
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

}
