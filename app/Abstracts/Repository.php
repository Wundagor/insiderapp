<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

abstract class Repository
{
    /**
     * @var Model
     */
    private $model;

    /**
     * Repository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     *
     * @return Collection|Model[]
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Create a new record in the database
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Find a record in the database
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Update record in the database
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
     * remove record from the database
     *
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->model->destroy($id);
    }

    /**
     * Show the record with the given id
     *
     * @param $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get the associated model
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Set the associated model
     *
     * @param $model
     * @return $this
     */
    public function setModel($model): Repository
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Eager load database relationships
     *
     * @param array $relations
     * @return Builder
     */
    public function with(array $relations): Builder
    {
        return $this->model->with($relations);
    }
}
