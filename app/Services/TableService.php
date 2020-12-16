<?php

namespace App\Services;

use App\Contracts\IService;
use App\Contracts\ITableRepository;
use App\Contracts\ITableService;
use App\Models\Table;
use Illuminate\Support\Collection;

class TableService implements IService, ITableService
{
    /**
     * @var ITableRepository
     */
    private ITableRepository $tableRepository;

    /**
     * TableService constructor.
     *
     * @param ITableRepository $tableRepository
     */
    public function __construct(ITableRepository $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    /**
     * Get table collection
     *
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return collect([
            'table' => $this->tableRepository->get(),
            'predictions' => $this->tableRepository->getPredictions()
        ]);
    }

    /**
     * Set data for won team
     *
     * @param Table $table
     * @param int $gd
     * @return mixed
     */
    public function won(Table $table, int $gd)
    {
        return $this->setResults($table, $gd, [
            'points' => $table->points + 3,
            'won' => $table->won + 1,
            'percent' => $table->percent + config('game.coefficient')
        ]);
    }

    /**
     * Set data for drawn team
     *
     * @param Table $table
     * @param int $gd
     * @return mixed
     */
    public function drawn(Table $table, int $gd)
    {
        return $this->setResults($table, $gd, [
            'points' => $table->points + 1,
            'drawn' => $table->drawn + 1
        ]);
    }

    /**
     * Set data for lost team
     *
     * @param Table $table
     * @param int $gd
     * @return mixed
     */
    public function lost(Table $table, int $gd)
    {
        return $this->setResults($table, $gd, [
            'lost' => $table->lost + 1,
            'percent' => $table->percent - config('game.coefficient')
        ]);
    }

    /**
     * Set results
     *
     * @param Table $table
     * @param int $gd
     * @param array $data
     * @return mixed
     */
    private function setResults(Table $table, int $gd, array $data)
    {
        $defaultValues = [
            'played' => $table->played + 1,
            'gd' => $table->gd + $gd
        ];

        return $this->tableRepository->update(
            array_merge($defaultValues, $data), $table->id
        );
    }
}
