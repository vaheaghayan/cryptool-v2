<?php

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const STATUS_NEW = 'new';
    const STATUS_VERIFIED = 'verified';

    protected $fillable = [
        'full_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
