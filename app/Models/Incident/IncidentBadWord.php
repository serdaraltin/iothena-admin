<?php

namespace App\Models\Incident;

use App\Models\BadWord\BadWord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentBadWord extends Model
{
    use HasFactory;
    protected $table = 'incident_bad_words';
    protected $fillable = [
        'incident_id',
        'bad_word_id',
    ];

    public function incident(){
        return $this->belongsTo(Incident::class);
    }
    public function bad_word(){
        return $this->belongsTo(BadWord::class);
    }
}
