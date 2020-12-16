<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface ITableRepository
{
    /**
     * Get formatted table
     *
     * @return Builder[]|Collection
     */
    public function get(): Collection;

    /**
     * Get predictions
     *
     * @return Builder[]|Collection
     */
    public function getPredictions(): Collection;
}
