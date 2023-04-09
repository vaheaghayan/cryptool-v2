<?php

namespace App\Models\LoginBruteforce;

use Illuminate\Database\Eloquent\Model;

class LoginBruteforce extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ip_hash';

    protected $table = 'login_bruteforce';

    protected $fillable = [
        'remote_addr',
        'email',
        'ip_hash',
        'date',
        'attempts_count'
    ];
}
