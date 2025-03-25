<?php

namespace App\Livewire\Notification;

use App\Models\Incident\Incident;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class NotificationIncident extends Component
{

    protected $listeners = [
        'echo:incident, IncidentNotificationEvent' => 'handleIncidentNotificationEvent',
        'openNotificationIncidentModal' => 'openModal',
        'setCorrect' => 'setCorrect',
        'setFaulty' => 'setFaulty',
    ];
    public $incident;
    public $notification;
    public $showModal = false;

    public function handleIncidentNotificationEvent($incident_id, $notification_id){
        $this->incident = Incident::find($incident_id);
        $this->notification = DatabaseNotification::where('id',$notification_id)->first();
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.notification.incident');
    }

    public function refresh(){
        $this->incident = Incident::find($this->incident->id);
    }

    public function openModal($model_id, $notification_id){
        $this->incident = Incident::find($model_id);
        $this->notification = DatabaseNotification::where('id',$notification_id)->first();
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function setCorrect(){
        Incident::where('id', $this->incident->id)->update([
            'verification' => 'correct',
        ]);
        $this->refresh();
    }

    public function setFaulty(){
        Incident::where('id', $this->incident->id)->update([
            'verification' => 'faulty',
        ]);
        $this->refresh();
    }

}
