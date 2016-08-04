<?php

namespace App\Jobs;

use App\EmailLog;
use App\Jobs\Job;
use App\Partners;
use App\Project;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class ShowProjectEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $partner_users, $pro;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Project $pro)
    {
        $this->partner_users = Partners::all();
        $this->pro = $pro;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $email_log = new EmailLog();;
        $email_log->content = "[패스트엠] 새로운 프로젝트가 등록되었습니다/" . $this->pro->title;
        $email_log->project_id = $this->pro->id;

        foreach ($this->partner_users as $user) {
            $mailer->send('mail.new_project_mail', ['pro' => $this->pro], function ($message) use ($user) {
                $message->from('help@fastm.io', '패스트엠');
                $message->to($user->user->email, $user->user->name)
                    ->subject("[패스트엠] 새로운 프로젝트가 등록되었습니다");
            });
            $email_log->who = $email_log->who . $user->user->email . " / ";
            $email_log->numbers = $email_log->numbers + 1;

        }
        $email_log->save();


    }
}
