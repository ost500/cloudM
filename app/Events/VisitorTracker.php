<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Log;
use Request;

class VisitorTracker extends Event
{
    use SerializesModels;

    protected $ipAddress;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        return [$this->ipAddress];
    }
}
