<?php

namespace App\Listeners;

use App\Events\DialogueEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DialogueListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DialogueEvent  $event
     * @return void
     */
    public function handle(DialogueEvent $event)
    {
        //
    }
}
