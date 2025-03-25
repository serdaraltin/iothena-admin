<?php

namespace App\Livewire\Device;

use App\Models\Device\Device;
use Livewire\Attributes\On;
use Livewire\Component;

class DeviceDetails extends Component
{
    public $device;
    protected $listeners = ['openDeviceDetails' => 'openDeviceDetails'];
    public $showModal = false;


    public function render()
    {
        return view('livewire.device.details');
    }

    public function refreshDeviceDetails($device_id){
        $this->device = Device::with('status')->findOrFail($device_id);
    }

    #[On('echo:device,DeviceEvent')]
    public function openDeviceDetails($device_id){
        $this->device = Device::with('status')->findOrFail($device_id);
        $this->showModal = true;
    }

    public function closeDeviceDetails()
    {
        $this->showModal = false;
    }


}
