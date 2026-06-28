<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'organization_id',
        'first_name',
        'last_name',
        'rut',
        'birth_date',
        'gender',
        'email',
        'phone',
        'photo',
        'active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'active' => 'boolean',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function teamMembers()
{
    return $this->hasMany(TeamMember::class);
}

public function getFullNameAttribute(): string
{
    return "{$this->first_name} {$this->last_name}";
}

}