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
        $email_log->content = "[패스트엠]새로운 캠페인이 등록되었습니다/" . $this->pro->title;
        $email_log->project_id = $this->pro->id;

        foreach ($this->partner_users as $user) {
            $mailer->send('mail.new_project_mail', ['pro' => $this->pro], function ($message) use ($user) {
                $message->from('help@fastm.io', '패스트엠');
                $message->to($user->user->email, $user->user->name)
                    ->subject("[패스트엠]새로운 캠페인이 등록되었습니다");
            });
            $email_log->who = $email_log->who . $user->user->email . " / ";
            $email_log->numbers = $email_log->numbers + 1;
            $email_log->category = "새 캠페인 등록";
        }
        $email_log->save();


        $email_log = new EmailLog();;
        $email_log->content = "[패스트엠]회원님 캠페인의 지원자 모집이 시작됐습니다" . $this->pro->title;
        $email_log->project_id = $this->pro->id;

        $project = $this->pro;

        $mailer->send('mail.new_project_client_mail', ['pro' => $this->pro], function ($message) use ($project) {
            $message->from('help@fastm.io', '패스트엠');
            $message->to($project->client->email, $project->client->name)
                ->subject("[패스트엠]회원님 캠페인의 지원자 모집이 시작됐습니다");
        });


        $email_log->who = $email_log->who . $this->pro->client->email . " / ";
        $email_log->numbers = $email_log->numbers + 1;
        $email_log->category = "지원자 모집 시작";

        $email_log->save();


    }
}
