<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_devices_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('type');
            $table->string('model');
            $table->string('name');
            $table->string('location');
            $table->integer('room_size')->nullable();
            $table->float('base_noise_level')->nullable();
            $table->float('threshold')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->integer('port')->nullable();
            $table->string('mac_address', 17)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
