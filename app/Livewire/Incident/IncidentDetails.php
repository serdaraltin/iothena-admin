<?php

namespace App\Livewire\Incident;

use App\Models\Incident\Incident;
use Livewire\Component;

class IncidentDetails extends Component
{
    public $incident;

    public $listeners = [
        'openIncidentDetailsModal' => 'openIncidentDetailsModal',
        'setCorrect' => 'setCorrect',
        'setFaulty' => 'setFaulty',
    ];
    public $showModal = false;


    public function render()
    {
        return view('livewire.incident.details');
    }

    public function refresh(){
        $this->incident = Incident::find($this->incident->id);
    }
    public function openIncidentDetailsModal($incidentId){
        $this->incident = Incident::find($incidentId);
        $this->showModal = true;
    }
    public function closeIncidentDetailsModal(){
        $this->showModal = false;
        $this->dispatch('incidentListRefresh');
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
