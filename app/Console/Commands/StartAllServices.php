<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StartAllServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start all services including Laravel, Queue listener, and Reverb';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Laravel development server...');
        Artisan::queue('serve', ['--host' => '0.0.0.0', '--port' => 8000]);

        $this->info('Starting Laravel Queue listener...');
        Artisan::queue('queue:listen');

        $this->info('Starting Reverb service...');
        Artisan::queue('reverb:start');

        $this->info('All services have been started.');
    }
}
