<?php

namespace App\Models\BadWord;

use App\Models\Incident\Incident;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadWord extends Model
{
    use HasFactory;

    protected $table = 'bad_words';
    protected $fillable =[
        'priority',
        'word',
        'match'
    ];

    public function incidents(){
        return $this->belongsToMany(Incident::class, 'incident_bad_word', 'bad_word_id', 'incident_id');
    }

}
