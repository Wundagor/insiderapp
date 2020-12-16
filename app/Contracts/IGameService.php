<?php

namespace App\Contracts;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface IGameService
{
    /**
     * Play scheduled games by week
     *
     * @return bool
     */
    public function play(): bool;

    /**
     * Play all scheduled games
     *
     * @return bool
     */
    public function playAll(): bool;
}
