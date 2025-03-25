<?php

namespace App\Livewire\Incident;

use App\Models\Incident\Incident;
use Livewire\Component;

class IncidentList extends Component
{
    public $incidents;

    public $filterPriority;

    public $listeners = [
         'incidentListRefresh' => 'refresh',
    ];

    public function filterByPriority(){
        $this->incidents = match ($this->filterPriority) {
            'all' => Incident::with('device')->orderByDesc('created_at')->get(),
            'critical' => Incident::with('device')->where('priority', 'critical')->orderByDesc('created_at')->get(),
            'normal' => Incident::with('device')->whereIn('priority', ['low', 'medium', 'high'])->orderByDesc('created_at')->get(),
            default => collect(),
        };
    }
    public function mount($filterPriority = 'all')
    {
       $this->filterPriority = $filterPriority;
    }
    public function render()
    {
        $this->filterByPriority();
        return view('livewire.incident.list', [
            'incidents' => $this->incidents
        ]);
    }

    public function refresh(){
        $this->filterByPriority();
    }

    public function openIncidentDetailsModal($incidentId){
        $this->dispatch('openIncidentDetailsModal', $incidentId);
    }

    public function openDeviceDetails($deviceId){
        $this->dispatch('openDeviceDetails', $deviceId);
    }
}
