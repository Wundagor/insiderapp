<?php

namespace App\Facades;

use App\Contracts\ISimulator;
use App\Contracts\ITableService;
use App\Models\Game;

class Simulator implements ISimulator
{
    /**
     * @var ITableService
     */
    private ITableService $tableService;

    /**
     * GameSimulation constructor.
     *
     * @param ITableService $tableService
     */
    public function __construct(ITableService $tableService)
    {
        $this->tableService = $tableService;
    }

    /**
     * Simulation of game
     *
     * @param Game $game
     */
    public function simulate(Game $game): void
    {
        $score = $game->getScore();
        $homeTeamTable = $game->homeTeam->table;
        $awayTeamTable = $game->awayTeam->table;
        $homeTeamGD = $game->getGD();
        $awayTeamGD = $game->getGD(true);

        if($score[0] > $score[1]) {
            $this->tableService->won($homeTeamTable, $homeTeamGD);
            $this->tableService->lost($awayTeamTable, $awayTeamGD);
        } elseif ($score[0] < $score[1]) {
            $this->tableService->lost($homeTeamTable, $homeTeamGD);
            $this->tableService->won($awayTeamTable, $awayTeamGD);
        } else {
            $this->tableService->drawn($homeTeamTable, $homeTeamGD);
            $this->tableService->drawn($awayTeamTable, $awayTeamGD);
        }
    }
}
