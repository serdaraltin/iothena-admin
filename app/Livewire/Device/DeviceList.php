<?php

namespace App\Livewire\Device;

use App\Models\Device\Device;
use Livewire\Component;

class DeviceList extends Component
{
    public $devices;

    public function refreshTable()
    {
        $this->devices = Device::with('status')->orderBy('id')->get();
    }
    public function openDeviceEdit($deviceId){
        $this->dispatch('openDeviceEdit', $deviceId);
    }

    public function openDeviceDetails($deviceId){
        $this->dispatch('openDeviceDetails', $deviceId);
    }

    public function mount()
    {
        $this->devices = Device::with('status')->orderBy('id')->get();
    }


    public function render()
    {
        return view('livewire.device.list', ['devices' => $this->devices]);
    }

    public function updated(){
        $this->dispatch('contentUpdated');
    }


}
