<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_device_operations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceOperationsTable extends Migration
{
    public function up()
    {
        Schema::create('device_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained('devices')->onDelete('cascade');
            $table->string('priority');
            $table->string('operation');
            $table->boolean('delivered')->default(false);
            $table->boolean('successful')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('device_operations');
    }
}
