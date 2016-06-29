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
    protected $url;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($url, $ipAddress)
    {
        $this->url = $url;
        $this->ipAddress = $ipAddress;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        Log::useDailyFiles(storage_path().'/logs/visitor_tracker.log');

        Log::info($this->url."\n".$this->ipAddress);

    }
}
