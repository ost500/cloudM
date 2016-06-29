<?php

namespace App\Listeners;


use App\Events\VisitorTracker;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class VisitorTrackerListener
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
     * @param  VisitorTracker  $event
     * @return void
     */
    public function handle(VisitorTracker $event)
    {
        Log::info($event->broadcastOn());
    }
}
