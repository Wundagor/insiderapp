<?php

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Contracts\ITeamRepository;
use App\Models\Team;

class TeamRepository extends Repository implements ITeamRepository
{
    /**
     * TeamRepository constructor.
     *
     * @param Team $model
     */
    public function __construct(Team $model)
    {
        parent::__construct($model);
    }
}
