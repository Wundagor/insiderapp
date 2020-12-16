<?php

namespace App\Providers;

use App\Contracts\IGameRepository;
use App\Contracts\IGameService;
use App\Contracts\ISimulator;
use App\Contracts\ISimulatorService;
use App\Contracts\ITableRepository;
use App\Contracts\ITableService;
use App\Contracts\ITeamRepository;
use App\Facades\Simulator;
use App\Repositories\GameRepository;
use App\Repositories\TableRepository;
use App\Repositories\TeamRepository;
use App\Services\GameService;
use App\Services\SimulatorService;
use App\Services\TableService;
use Illuminate\Support\ServiceProvider;

class SimulatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ISimulator::class, Simulator::class);
        $this->app->bind(ITableRepository::class, TableRepository::class);
        $this->app->bind(IGameRepository::class, GameRepository::class);
        $this->app->bind(ITeamRepository::class, TeamRepository::class);
        $this->app->bind(ITableService::class, TableService::class);
        $this->app->bind(IGameService::class, GameService::class);
        $this->app->bind(ISimulatorService::class, SimulatorService::class);
    }
}
