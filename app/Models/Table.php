<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Table extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    public $hidden = ['team_id'];

    /**
     * @var string[]
     */
    public $fillable = ['played', 'points', 'won', 'drawn', 'lost', 'gd', 'percent'];

    /**
     * Get table team
     *
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
