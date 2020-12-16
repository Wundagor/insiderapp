<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\IGameRepository;
use App\Models\Game;
use App\Abstracts\Repository;

class GameRepository extends Repository implements IGameRepository
{
    /**
     * TableRepository constructor.
     *
     * @param Game $model
     */
    public function __construct(Game $model)
    {
        parent::__construct($model);
    }

    /**
     * Get current week
     *
     * @return int|null
     */
    public function getCurrentWeek(): ?int
    {
        return $this->getModel()->whereNotNull('score')->orderByDesc('week')->value('week');
    }

    /**
     * Get results by week
     *
     * @return Builder[]|Collection
     */
    public function getResultsByWeek(): Collection
    {
        return $this->getModel()->with(['homeTeam', 'awayTeam'])->whereNotNull('score')
                    ->orderByDesc('week')->orderBy('id')->limit(2)->get();
    }

    /**
     * Get scheduled games
     *
     * @return Builder[]|Collection
     */
    public function getScheduled(): Collection
    {
        return $this->getScheduledBuilder()->limit(2)->get();
    }

    /**
     * Get all scheduled games
     *
     * @return Builder[]|Collection
     */
    public function getAllScheduled(): Collection
    {
        return $this->getScheduledBuilder()->get();
    }

    /**
     * Get builder for scheduling games
     *
     * @return Builder
     */
    private function getScheduledBuilder(): Builder
    {
        return $this->getModel()->with(['homeTeam', 'awayTeam'])->whereNull('score')
            ->orderBy('week')->orderBy('id');
    }
}
