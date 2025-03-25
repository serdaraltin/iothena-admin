<?php

namespace App\Livewire\Service;

use App\Models\Service\Service;
use Livewire\Component;

class ServiceList extends Component
{
    public $services;


    public function mount()
    {
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.service.list');
    }

    public function refresh()
    {
        $this->services = Service::all();
    }

    public function openServiceDetails($service_id){
        $this->dispatch('openServiceDetails', $service_id);
    }

}
