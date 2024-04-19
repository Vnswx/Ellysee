<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Listeners\Registered;


class SetUserRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    // public function handle(Registered $event)
    // {
    //     $event->user->role = 'user'; // Atur role menjadi 'user' untuk pendaftaran biasa
    //     $event->user->save();
    // }

}
