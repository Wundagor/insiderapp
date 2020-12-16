<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface ISimulatorService
{
    /**
     * Simulation of games
     *
     * @param Request $request
     * @return array
     */
    public function simulate(Request $request): array;

    /**
     * Reset game
     *
     * @return array
     */
    public function reset(): array;
}
