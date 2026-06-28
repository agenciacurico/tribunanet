<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'email',
        'phone',
        'website',
        'city',
        'region',
        'country',
        'logo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
public function people()
{
    return $this->hasMany(Person::class);
}

public function clubs()
{
    return $this->hasMany(Club::class);
}

public function teams()
{
    return $this->hasMany(Team::class);
}

    }