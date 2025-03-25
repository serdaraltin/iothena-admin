<?php

namespace App\Livewire\Device;
use App\Models\Device\Device;
use Livewire\Component;

class DeviceEdit extends Component
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

    protected $listeners = ['openDeviceEdit'];

    public function render()
    {
        return view('livewire.device.edit');
    }
    public function openDeviceEdit($deviceId){
        $this->device = Device::with('status')->find($deviceId);

        $this->device_id = $deviceId;
        $this->name = $this->device->name;
        $this->type = $this->device->type;
        $this->model = $this->device->model;
        $this->location = $this->device->location;
        $this->room_size = $this->device->room_size;
        $this->base_noise_level = $this->device->base_noise_level;
        $this->threshold = $this->device->threshold;
        $this->ip_address = $this->device->ip_address;
        $this->port = $this->device->port;


        $this->showModal = true;
    }
    public function closeDeviceEdit()
    {
        $this->showModal = false;
    }

    public function updateDevice(){

        try {
            $this->validate([
                //'type' => 'required',
                'name' => 'required',
                'location' => 'required',
                'room_size' => 'required',
                'base_noise_level' => 'required',
                'threshold' => 'required',
                'ip_address' => 'required',
                'port' => 'required',
                'model' => 'required',
            ]);

            $device = Device::find($this->device_id);
            if(!$device){
                session()->flash('error', 'Device not found');
                return;
            }
            $device->update([
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

        // Başarı mesajı
        session()->flash('message', 'Device updated successfully!');

    }


}
