<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GameReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset game';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh', ['--force' => true]);
        $this->info("Database was refreshed successfully");

        Artisan::call('db:seed', ['--force' => true]);
        $this->info("Database was filled seed data successfully");
    }
}
