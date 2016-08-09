<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Project;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Mail;

class ApplyEndEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dead_pro = Project::where('deadline', date('Y-m-d', strtotime("-1 day")))->get();

        foreach ($dead_pro as $each_dead_pro) {
            $user = $each_dead_pro->client;
            Mail::send('mail.apply_end_mail', ['pro' => $each_dead_pro, 'app' => $each_dead_pro->application], function ($message) use ($each_dead_pro, $user) {
                $message->from('help@fastm.io', '패스트엠');
                $message->to($user->email, $user->name)
                    ->subject("[패스트엠]'".$each_dead_pro->title."' 캠페인 모집이 마감되었습니다.");
            });
            Log::info("apply_end_email sent".$each_dead_pro->title);
        }
    }
}
