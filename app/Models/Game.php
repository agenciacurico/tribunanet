<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tournament_id',
        'category_id',
        'home_team_id',
        'away_team_id',
        'game_date',
        'game_time',
        'venue',
        'status',
        'current_set',
        'sets_to_win',
        'serving_team_id',

        // NUEVO
        'featured_team_member_id',
        'featured_until',

        'started_at',
        'ended_at',
    ];

    protected $casts = [
        'game_date'       => 'date',
        'game_time'       => 'datetime:H:i',
        'featured_until'  => 'datetime',
        'started_at'      => 'datetime',
        'ended_at'        => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function servingTeam()
    {
        return $this->belongsTo(Team::class, 'serving_team_id');
    }

    /**
     * Jugador destacado actualmente.
     */
    public function featuredPlayer()
    {
        return $this->belongsTo(TeamMember::class, 'featured_team_member_id')
            ->with('person', 'team');
    }

    public function sets()
    {
        return $this->hasMany(GameSet::class)
            ->orderBy('set_number');
    }

    public function events()
    {
        return $this->hasMany(GameEvent::class);
    }

    public function currentSet()
    {
        return $this->hasOne(GameSet::class)
            ->where('set_number', $this->current_set);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function homeSetsWon(): int
    {
        return $this->sets()
            ->where('winner_team_id', $this->home_team_id)
            ->count();
    }

    public function awaySetsWon(): int
    {
        return $this->sets()
            ->where('winner_team_id', $this->away_team_id)
            ->count();
    }

    /**
     * Indica si existe una ficha visible.
     */
    public function hasFeaturedPlayer(): bool
    {
        return $this->featured_team_member_id !== null
            && $this->featured_until !== null
            && now()->lt($this->featured_until);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getDisplayNameAttribute(): string
    {
        $home = $this->homeTeam?->name ?? 'Local';
        $away = $this->awayTeam?->name ?? 'Visita';

        return "{$home} vs {$away}";
    }
}