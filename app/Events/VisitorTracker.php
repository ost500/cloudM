<?php

namespace App\Events;

use App\Events\Event;
use Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Log;
use Request;

class VisitorTracker extends Event
{
    use SerializesModels;

    protected $ipAddress;
    protected $url;
    protected $ajax_flag;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->url = $request->fullUrl();
        $this->ipAddress = $request->getClientIp();
        $this->ajax_flag = $request->ajax();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        if(!$this->ajax_flag){
            Log::useDailyFiles(storage_path().'/logs/visitor_tracker.log');
            if(Auth::check()){
                Log::info($this->url."\n".$this->ipAddress."\n".Auth::user()->name);
            }
            else{
                Log::info($this->url."\n".$this->ipAddress."\n");
            }
        }


    }
}
