<?php

namespace App\Contracts;

use App\Models\Table;

interface ITableService
{
    /**
     * Set data for won team
     *
     * @param Table $table
     * @param int $gd
     * @return mixed
     */
    public function won(Table $table, int $gd);

    /**
     * Set data for drawn team
     *
     * @param Table $table
     * @param int $gd
     * @return mixed
     */
    public function drawn(Table $table, int $gd);

    /**
     * Set data for lost team
     *
     * @param Table $table
     * @param int $gd
     * @return mixed
     */
    public function lost(Table $table, int $gd);
}
