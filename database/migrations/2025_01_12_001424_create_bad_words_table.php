<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_bad_words_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadWordsTable extends Migration
{
    public function up()
    {
        Schema::create('bad_words', function (Blueprint $table) {
            $table->id();
            $table->string('priority');
            $table->string('word');
            $table->text('match');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bad_words');
    }
}
