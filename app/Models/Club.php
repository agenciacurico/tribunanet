<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'short_name',
        'city',
        'region',
        'logo',
        'uniform_home',
        'uniform_away',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function teams()
{
    return $this->hasMany(Team::class);
}
}
