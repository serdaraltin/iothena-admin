<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceOperation extends Model
{
    use HasFactory;
    protected $table = 'device_operations';
    protected $fillable = [
        'device_id',
        'operation',
        'delivered',
        'successful',
    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }
}
