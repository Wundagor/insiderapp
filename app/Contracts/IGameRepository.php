<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface IGameRepository
{
    /**
     * Get current week
     *
     * @return int|null
     */
    public function getCurrentWeek(): ?int;

    /**
     * Get results by week
     *
     * @return Builder[]|Collection
     */
    public function getResultsByWeek(): Collection;

    /**
     * Get scheduled games
     *
     * @return Builder[]|Collection
     */
    public function getScheduled(): Collection;

    /**
     * Get all scheduled games
     *
     * @return Builder[]|Collection
     */
    public function getAllScheduled(): Collection;
}
