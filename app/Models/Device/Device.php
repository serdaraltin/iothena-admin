<?php

namespace App\Models\Device;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class Device extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'devices';
    protected $fillable = [
        'uuid',
        'type',
        'model',
        'name',
        'location',
        'room_size',
        'base_noise_level',
        'threshold',
        'ip_address',
        'port',
        'mac_address',
    ];

    public function status(): HasOne{
        return $this->hasOne(DeviceStatus::class, 'device_id', 'id');
    }

    public function notifications(): MorphMany{
        return $this->morphMany(DatabaseNotification::class, 'notifiable');
    }

}
