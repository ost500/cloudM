<?php

namespace App\Jobs;

use App\Application;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class ApplicationEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $app;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Application $input)
    {
        $this->app = $input;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = $this->app->project->client;

        Mail::send('mail.application_mail', ['pro' => $this->app->project, 'app' => $this->app], function ($message) use ($client) {
            $message->from('help@fastm.io', '패스트엠');
            $message->to($client->email, $client->name)
                ->subject("[패스트엠]대행사가 회원님의 캠페인에 지원했습니다");
        });
    }
}
