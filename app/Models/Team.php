<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    /**
     * Get table by team
     *
     * @return HasOne
     */
    public function table(): HasOne
    {
        return $this->hasOne(Table::class);
    }
}
