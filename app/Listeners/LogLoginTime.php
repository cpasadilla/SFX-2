<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LogLoginTime
{
    public function handle(Login $event)
    {
        $user = $event->user;
        $user->login = now();
        $user->save();
    }
}

?>
