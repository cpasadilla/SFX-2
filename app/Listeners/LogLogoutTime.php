<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class LogLogoutTime
{
    public function handle(Logout $event)
    {
        $user = $event->user;
        if ($user) {
            $user->logout = now();
            $user->save();
        }
    }
}

