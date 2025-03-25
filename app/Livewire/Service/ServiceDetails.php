<?php

namespace App\Livewire\Service;

use App\Models\Service\Service;
use Livewire\Component;

class ServiceDetails extends Component
{
    public $service;

    public $listeners = [
        'openServiceDetails' => 'openServiceDetails',
    ];
    public $showModal = false;

    public function render()
    {
        return view('livewire.service.details');
    }

    public function openServiceDetails($service_id){
        $this->service = Service::where('id', $service_id)->first();
        $this->showModal = true;
    }

    public function closeModal(){
        $this->showModal = false;
    }
}
