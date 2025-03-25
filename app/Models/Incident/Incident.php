<?php

namespace App\Models\Incident;

use App\Models\BadWord\BadWord;
use App\Models\Device\Device;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Incident extends Model implements HasMedia
{

    use HasFactory;
    use InteractsWithMedia;
    use Notifiable;

    protected $table = 'incidents';
    protected $fillable = [
        'device_id',
        'priority',
        'status',
        'transcript',
        'human_count',
        'additional',
    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }

    public function badWords(){
        return $this->belongsToMany(BadWord::class, 'incident_bad_words', 'incident_id', 'bad_word_id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function notifications(): MorphMany{
        return $this->morphMany(DatabaseNotification::class, 'notifiable');
    }
}
