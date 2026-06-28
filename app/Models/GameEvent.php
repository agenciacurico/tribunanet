<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameEvent extends Model
{
    protected $fillable = [
        'game_id',
        'game_set_id',
        'team_id',
        'player_id',
        'event_type',
        'value',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function gameSet()
    {
        return $this->belongsTo(GameSet::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function player()
    {
        return $this->belongsTo(Person::class, 'player_id');
    }
}