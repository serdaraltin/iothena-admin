<?php

namespace App\Livewire\Device;

use App\Models\Device\DeviceOperation;
use Livewire\Component;

class DeviceOperationList extends Component
{
    public $operations;

    public function mount()
    {
        $this->operations = DeviceOperation::with('device')->orderBy('created_at', 'asc')->get();
    }
    public function refreshTable()
    {
        $this->operations = DeviceOperation::with('device')->orderBy('created_at', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.device.operation.list', ['operations' => $this->operations]);
    }

    public function openDeviceDetails($deviceId){
        $this->dispatch('openDeviceDetails', $deviceId);
    }
}
