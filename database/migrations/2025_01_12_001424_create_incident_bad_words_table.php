<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_incident_bad_words_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentBadWordsTable extends Migration
{
    public function up()
    {
        Schema::create('incident_bad_words', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('incident_id')
                ->nullable()
                ->constrained('incidents')
                ->onDelete('set null'); // Foreign key to incidents table
            $table->foreignId('bad_word_id')
                ->nullable()
                ->constrained('bad_words')
                ->onDelete('set null'); // Foreign key to bad_words table
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('incident_bad_words');
    }
}
