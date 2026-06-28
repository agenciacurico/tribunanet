<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'team_id',
        'person_id',
        'jersey_number',
        'position',
        'captain',
        'starter',
        'active',
    ];

    protected $casts = [
        'captain' => 'boolean',
        'starter' => 'boolean',
        'active' => 'boolean',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}