<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Spatie\Permission\Traits\HasRoles;

class Patient extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'place_of_birth',
        'date_of_birth',
        'family_history',
        'history_of_smoking',
        'bpm',
        'systolic',
        'diastolic',
        'risk',
        'status',
        'email',
        'phone_number',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [];
    
    protected $guard_name = 'web';

    protected $casts = [
        'id' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($obj) {
            $obj->id = RamseyUuid::uuid4()->toString();
        });
    }
}