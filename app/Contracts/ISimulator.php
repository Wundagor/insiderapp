<?php

namespace App\Contracts;

use App\Models\Game;

interface ISimulator
{
    /**
     * Simulation of game
     *
     * @param Game $game
     */
    public function simulate(Game $game): void;
}
