<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameSet extends Model
{
    protected $fillable = [
        'game_id',
        'set_number',
        'home_score',
        'away_score',
        'winner_team_id',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_team_id');
    }
}