<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class Service extends Model {
    use HasFactory;
    use Notifiable;

    protected $table = 'services';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'status',
        'description',
    ];

    public function notifications(): MorphMany{
        return $this->morphMany(DatabaseNotification::class, 'notifiable');
    }
}