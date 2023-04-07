<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    const TYPE_REGISTER = 'register';
    const TYPE_PASSWORD_RESET = 'password_reset';

    const STATUS_USED = true;
    const STATUS_NOT_USED = false;

    protected $table = 'users_token';

    protected $fillable = [
        'user_id',
        'type',
        'token',
        'is_used'
    ];
}
