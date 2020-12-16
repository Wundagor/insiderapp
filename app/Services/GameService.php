<?php

namespace App\Services;

use App\Contracts\IGameRepository;
use App\Contracts\IGameService;
use App\Contracts\IService;
use App\Contracts\ISimulator;
use Illuminate\Support\Collection;

class GameService implements IService, IGameService
{
    /**
     * @var IGameRepository
     */
    private IGameRepository $gameRepository;

    /**
     * @var ISimulator
     */
    private ISimulator $simulator;

    /**
     * GameService constructor.
     *
     * @param IGameRepository $gameRepository
     * @param ISimulator $simulator
     */
    public function __construct(IGameRepository $gameRepository, ISimulator $simulator)
    {
        $this->gameRepository = $gameRepository;
        $this->simulator = $simulator;
    }

    /**
     * Get game collection
     *
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return collect([
            'games' => $this->gameRepository->getResultsByWeek(),
            'week'  => $this->gameRepository->getCurrentWeek()
        ]);
    }

    /**
     * Play scheduled games by week
     *
     * @return bool
     */
    public function play(): bool
    {
        return $this->makeGame($this->gameRepository->getScheduled());
    }

    /**
     * Play all scheduled games
     *
     * @return bool
     */
    public function playAll(): bool
    {
        return $this->makeGame($this->gameRepository->getAllScheduled());
    }

    /**
     * @param Collection $games
     * @return bool
     */
    private function makeGame(Collection $games): bool
    {
        if($games)
        {
            $games->map(function($game) {
                $game->update(['score' => implode('-', [rand(0, 6), rand(0, 6)])]);
                $this->event($this->gameRepository->find($game->id));
            });
        }

        return !!$games->count();
    }

    /**
     * @param $game
     */
    private function event($game)
    {
        $this->simulator->simulate($game);
    }
}
