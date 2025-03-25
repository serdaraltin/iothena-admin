<?php

namespace App\Livewire\Device;
use App\Models\Device\Device;
use Livewire\Component;

class DeviceAdd extends Component
{
    public $device;
    public $showModal = false;
    public $device_id;
    public $name;
    public $type;
    public $model;
    public $location;
    public $room_size;
    public $base_noise_level;
    public $threshold;
    public $ip_address;
    public $port;

    protected $listeners = ['openDeviceAddModal'];

    public function render()
    {
        return view('livewire.device.add');
    }
    public function openDeviceEdit($deviceId){
        $this->showModal = true;
    }
    public function closeDeviceEdit()
    {
        $this->showModal = false;
    }

    public function updateDevice(){

        try {
            $this->validate([
                'type' => 'required',
                'name' => 'required',
                'location' => 'required',
                'room_size' => 'required',
                'base_noise_level' => 'required',
                'threshold' => 'required',
                'ip_address' => 'required',
                'port' => 'required',
                'model' => 'required',
            ]);

            $device = Device::create([
                //'type' => $this->type,
                'name' => $this->name,
                'location' => $this->location,
                'room_size' => $this->room_size,
                'base_noise_level' => $this->base_noise_level,
                'threshold' => $this->threshold,
                'ip_address' => $this->ip_address,
                'port' => $this->port,
                'model' => $this->model,
            ]);
        }
        catch (\Exception $exception){
            session()->flash('error','An error occurred while updating the device: '. $exception->getMessage());
            return;
        }

        session()->flash('message', 'Device created successfully!');

    }


}
