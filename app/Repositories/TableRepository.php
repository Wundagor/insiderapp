<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Abstracts\Repository;
use App\Contracts\ITableRepository;
use App\Models\Table;

class TableRepository extends Repository implements ITableRepository
{
    /**
     * TableRepository constructor.
     *
     * @param Table $model
     */
    public function __construct(Table $model)
    {
        parent::__construct($model);
    }

    /**
     * Get formatted table
     *
     * @return Builder[]|Collection
     */
    public function get(): Collection
    {
        return $this->getModel()->with(['team'])->orderByDesc('points')->orderByDesc('gd')->get();
    }

    /**
     * Get predictions
     *
     * @return Builder[]|Collection
     */
    public function getPredictions(): Collection
    {
        return $this->getModel()->with(['team'])->select(['team_id', 'percent'])->orderByDesc('percent')->get();
    }
}
