<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        // Create the services table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type');
            $table->string('status');
            $table->string('description');
            $table->timestamps();
        });

        // Insert default service records
        DB::table('services')->insert([
            [
                'name' => 'Authentication',
                'slug' => 'authentication',
                'type' => 'backend',
                'status' => 'active',
                'description' => 'Handles user authentication and authorization requests.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Database',
                'slug' => 'database',
                'type' => 'database',
                'status' => 'active',
                'description' => 'Manages database connections and operations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Queue',
                'slug' => 'queue',
                'type' => 'queue',
                'status' => 'active',
                'description' => 'Handles background job processing and task queues.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cache',
                'slug' => 'cache',
                'type' => 'backend',
                'status' => 'active',
                'description' => 'Provides caching services to improve performance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Notification',
                'slug' => 'notification',
                'type' => 'backend',
                'status' => 'active',
                'description' => 'Sends system and user notifications.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Logging',
                'slug' => 'logging',
                'type' => 'backend',
                'status' => 'active',
                'description' => 'Manages application and system logs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'File Storage',
                'slug' => 'file-storage',
                'type' => 'storage',
                'status' => 'active',
                'description' => 'Handles file upload and storage.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'API Gateway',
                'slug' => 'api-gateway',
                'type' => 'backend',
                'status' => 'active',
                'description' => 'Routes and manages API requests between services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Email Service',
                'slug' => 'email',
                'type' => 'backend',
                'status' => 'inactive',
                'description' => 'Sends transactional and bulk emails.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Monitoring',
                'slug' => 'monitoring',
                'type' => 'monitoring',
                'status' => 'inactive',
                'description' => 'Tracks the health and performance of the system.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FTP Service',
                'slug' => 'ftp',
                'type' => 'storage',
                'status' => 'active',
                'description' => 'Handles file transfers via FTP.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
