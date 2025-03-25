<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_enum_types.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateEnumTypes extends Migration
{
    public function up()
    {
        // Enum types for event types
        DB::statement("CREATE TYPE type_enum AS ENUM ('info', 'warning', 'error', 'success', 'critical')");
        DB::statement("CREATE TYPE level_enum AS ENUM ('low', 'medium', 'high', 'critical')");
        DB::statement("CREATE TYPE incident_verification_enum AS ENUM ('unverified', 'correct', 'faulty')");
        DB::statement("CREATE TYPE event_operation_enum AS ENUM ('create', 'update', 'delete', 'restart', 'failure', 'recovery', 'suspend', 'resume', 'migrate', 'upgrade', 'downgrade', 'diagnostic', 'maintenance', 'monitor', 'shutdown', 'start', 'stop', 'trigger', 'acknowledge')");
        DB::statement("CREATE TYPE event_type_enum AS ENUM ('device', 'system', 'backend', 'user', 'network', 'database', 'application', 'security', 'third_party', 'scheduler', 'hardware', 'integration')");
        DB::statement("CREATE TYPE recipient_type_enum AS ENUM ('user', 'device')");
        DB::statement("CREATE TYPE delivery_method_enum AS ENUM ('email', 'sms', 'push', 'webhook', 'in_app', 'voice_call')");
        DB::statement("CREATE TYPE device_model_enum AS ENUM ('Raspberry_Pi_Zero_2_W', 'Raspberry_Pi_3', 'Raspberry_Pi_4', 'Raspberry_Pi_5', 'ESP32', 'ESP32_C3', 'ESP32_S2', 'ESP32_S3', 'ESP8266', 'ESP8266_12E', 'Arduino_Uno', 'Arduino_Nano', 'Arduino_Mega', 'Arduino_Zero', 'BeagleBone_Black', 'BeagleBone_AI', 'Jetson_Nano', 'Jetson_Xavier', 'STM32F4', 'STM32F7', 'Teensy_4_0', 'Teensy_4_1', 'ODROID_C4', 'ODROID_N2+', 'Tinker_Board', 'RockPi_4', 'Pine_H64')");
        DB::statement("CREATE TYPE device_type_enum AS ENUM ('Sentinel', 'Guardian', 'Watchdog', 'Echo', 'Vigilant', 'Sentry', 'Perimeter', 'Seer', 'Tracker', 'Alertor', 'Patrol', 'MagLockControl', 'AccessMonitor', 'IntruderBlock', 'LockGuard', 'SafeGuard', 'AlarmSystem', 'NetworkDefender', 'EnvironmentalSensor', 'IoTBarrier')");
        DB::statement("CREATE TYPE device_status_enum AS ENUM ('active', 'offline', 'maintenance', 'idle', 'booting', 'updating', 'error', 'disconnected', 'restarting', 'suspended', 'unavailable', 'locked', 'ready', 'paused', 'recovering', 'shutdown', 'overloaded', 'quarantined')");
        DB::statement("CREATE TYPE device_operation_enum AS ENUM ('reboot', 'suspend', 'resume', 'power_off', 'service_restart', 'service_stop', 'service_start', 'update_firmware', 'reset', 'check_status', 'get_logs', 'shutdown', 'enable_device', 'disable_device', 'set_configuration', 'network_test', 'sync_time', 'backup', 'restore', 'upgrade', 'factory_reset')");
    }

    public function down()
    {
        DB::statement("DROP TYPE IF EXISTS type_enum");
        DB::statement("DROP TYPE IF EXISTS level_enum");
        DB::statement("DROP TYPE IF EXISTS incident_verification_enum");
        DB::statement("DROP TYPE IF EXISTS event_operation_enum");
        DB::statement("DROP TYPE IF EXISTS event_type_enum");
        DB::statement("DROP TYPE IF EXISTS recipient_type_enum");
        DB::statement("DROP TYPE IF EXISTS delivery_method_enum");
        DB::statement("DROP TYPE IF EXISTS device_model_enum");
        DB::statement("DROP TYPE IF EXISTS device_type_enum");
        DB::statement("DROP TYPE IF EXISTS device_status_enum");
        DB::statement("DROP TYPE IF EXISTS device_operation_enum");
    }
}
