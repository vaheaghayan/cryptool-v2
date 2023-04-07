<?php

namespace App\BruteForce;

use App\Models\LoginBruteforce\LoginBruteforce;

class BruteForce
{
    protected array $conf;
    protected string $remoteAddr;
    protected string $email;
    protected string $ipHash;

    public function __construct(string $email)
    {
        $this->conf = config('auth.login');
        $this->remoteAddr = request()->ip() ?? '';
        $this->email = $email;
        $this->ipHash = md5($this->remoteAddr . $this->email);
    }

    public function checkBlock(): bool
    {
        return LoginBruteforce::where('ip_hash', $this->ipHash)
            ->where('attempts_count', $this->conf['invalid_attempts_count'])
            ->where('date', '>', date('Y-m-d H:i:s', time() - $this->conf['block_minutes'] * 60))
            ->exists();
    }

    public function addFailed(): void
    {
        $loginBruteForce = LoginBruteforce::firstOrNew(['ip_hash' => $this->ipHash], [
            'remote_addr' => $this->remoteAddr,
            'email' => $this->email,
            'attempts_count' => 0,
        ]);

        if ($loginBruteForce->date < date('Y-m-d H:i:s', time() - $this->conf['time'])) {
            $loginBruteForce->attempts_count = 0;
        }

        if ($loginBruteForce->attempts_count == $this->conf['invalid_attempts_count']) {
            $loginBruteForce->attempts_count = 0;
        }

        if ($loginBruteForce->attempts_count == 0) {
            $loginBruteForce->date = date('Y-m-d H:i:s');
        }

        if ($loginBruteForce->attempts_count == $this->conf['invalid_attempts_count'] - 1) {
            $loginBruteForce->date = date('Y-m-d H:i:s');
        }

        $loginBruteForce->attempts_count++;
        $loginBruteForce->save();
    }

    public function reset(): void
    {
        LoginBruteforce::where('ip_hash', $this->ipHash)->delete();
    }
}
