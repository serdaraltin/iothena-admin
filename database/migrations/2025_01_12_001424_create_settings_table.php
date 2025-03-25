<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_settings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('key', 255)->unique(); // Unique key for the setting
            $table->text('value'); // Value for the setting
            $table->text('description')->nullable(); // Optional description for the setting
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
