<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    public $hidden = ['home_team_id', 'away_team_id'];

    /**
     * @var string[]
     */
    public $fillable = ['score'];

    /**
     * Get home team
     *
     * @return BelongsTo
     */
    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    /**
     * Get away team
     *
     * @return BelongsTo
     */
    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    /**
     * @return array|null
     */
    public function getScore(): ?array
    {
        return $this->score ? explode('-', $this->score) : null;
    }

    /**
     * Get GD
     *
     * @param bool $reverse
     * @return int|mixed
     */
    public function getGD(bool $reverse = false): int
    {
        $score = $this->getScore();

        if($score) {
            if($reverse) $score = array_reverse($score);
            return $score[0] - $score[1];
        }

        return 0;
    }
}
