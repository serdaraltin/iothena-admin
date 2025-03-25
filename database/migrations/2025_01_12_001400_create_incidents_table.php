<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_incidents_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable()->constrained()->onDelete('set null');
            $table->string('priority');
            $table->string('verification')->default('unverified');
            $table->text('transcript');
            $table->integer('human_count')->default(0);
            $table->json('additional')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
