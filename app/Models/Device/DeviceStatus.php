<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceStatus extends Model
{
    use HasFactory;
    protected $table = 'device_statuses';
    protected $fillable = [
        'device_id',
        'status',
        'health',
        'temperature',
        'battery_level',
        'cpu_usage',
        'memory_usage',
        'disk_usage',
        'services',
        'last_checked',
    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }

}
