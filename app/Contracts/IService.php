<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface IService
{
    /**
     * Get service collection
     *
     * @return Collection
     */
    public function getCollection(): Collection;
}
