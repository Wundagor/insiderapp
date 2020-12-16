<?php

namespace App\Services;

use App\Contracts\IGameService;
use App\Contracts\IService;
use App\Contracts\ISimulatorService;
use App\Contracts\ITableService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class SimulatorService implements IService, ISimulatorService
{
    /**
     * @var ITableService
     */
    private ITableService $tableService;

    /**
     * @var IGameService
     */
    private IGameService $gameService;

    /**
     * SimulatorService constructor.
     *
     * @param ITableService $tableService
     * @param IGameService $gameService
     */
    public function __construct(ITableService $tableService, IGameService $gameService)
    {
        $this->tableService = $tableService;
        $this->gameService = $gameService;
    }

    /**
     * Get game data
     *
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return collect([
            'data' => collect([])->merge($this->tableService->getCollection())->merge($this->gameService->getCollection())
        ]);
    }

    /**
     * Simulation of games
     *
     * @param Request $request
     * @return array
     */
    public function simulate(Request $request): array
    {
        $request->get('all') ? $this->gameService->playAll() : $this->gameService->play();
        return ['success' => 'Simulation was successfully'];
    }

    /**
     * Reset game
     *
     * @return array
     */
    public function reset(): array
    {
        Artisan::call('game:reset');
        return ['success' => 'Game was reset successfully'];
    }
}
