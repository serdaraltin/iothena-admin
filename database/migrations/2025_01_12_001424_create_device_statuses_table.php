<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_device_statuses_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('device_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained()->onDelete('cascade');
            $table->string('status');
            $table->float('health')->nullable();
            $table->float('temperature')->nullable();
            $table->float('battery_level')->nullable();
            $table->float('cpu_usage')->nullable();
            $table->float('memory_usage')->nullable();
            $table->float('disk_usage')->nullable();
            $table->json('services')->nullable();
            $table->timestamp('last_checked')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('device_statuses');
    }
}
