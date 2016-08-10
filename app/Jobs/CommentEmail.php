<?php

namespace App\Jobs;

use App\Client;
use App\Comments;
use App\EmailLog;
use App\Project;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Mail;

class CommentEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $comment;
    protected $who;
    protected $numbers;
    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comments $input)
    {
        $this->comment = $input;
        $this->who = "";
        $this->numbers = 0;
        $this->content = "";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pro = Project::find($this->comment->project_id);
        $client = $pro->client;
        // 파트너가 쓴 댓글
        // 무조건 클라이언트한테 메일 보냄
        if ($this->comment->user->PorC == "P") {
            Mail::send('mail.comment_mail', ['pro' => $pro, 'comment' => $this->comment], function ($message) use ($client, $pro) {
                $message->from('help@fastm.io', '패스트엠');
                $message->to($client->email, $client->name)
                    ->subject("[패스트엠]'" . $pro->title . "' 캠페인에 댓글이 입력 됐습니다");
            });
            $this->who = $client->email;
            $this->numbers = 1;
            $this->content = "[패스트엠]'".$pro->title."' 캠페인에 댓글이 입력 됐습니다";
            $this->email_log($pro);
        } else {
            // 클라이언트가 쓴 댓글
            if ($this->comment->parent_id != 0) {
                // 대댓글일 경우
                // 부모댓글한테 보냄
                Log::info('부모댓글한테 보냄');
                $parent_com = Comments::find($this->comment->parent_id);
                Mail::send('mail.comment_mail', ['pro' => $pro, 'comment' => $this->comment], function ($message) use ($parent_com, $pro) {
                    $message->from('help@fastm.io', '패스트엠');
                    $message->to($parent_com->user->email, $parent_com->user->name)
                        ->subject("[패스트엠]'" . $pro->title . "' 캠페인에 댓글이 입력 됐습니다");
                });
                $this->who = $parent_com->user->email;
                $this->numbers = 1;
                $this->content = "[패스트엠]'".$pro->title."' 캠페인에 댓글이 입력 됐습니다";
                $this->email_log($pro);
            } else {
                $com_unique = $pro->comment->unique('u_id');
                foreach ($com_unique as $each_com) {
                    if ($each_com->user->PorC == "P") {
                        Mail::send('mail.comment_mail', ['pro' => $pro, 'comment' => $this->comment], function ($message) use ($each_com, $pro) {
                            $message->from('help@fastm.io', '패스트엠');
                            $message->to($each_com->user->email, $each_com->user->name)
                                ->subject("[패스트엠]'" . $pro->title . "' 캠페인에 댓글이 입력 됐습니다");
                        });
                        $this->who = $this->who . $client->email . "/";
                        $this->numbers = $this->numbers + 1;
                    }
                }
                $this->content = "[패스트엠]'".$pro->title."' 캠페인에 댓글이 입력 됐습니다";
                $this->email_log($pro);
            }
        }


    }

    public function email_log($pro)
    {
        $email_log = new EmailLog();
        $email_log->content = "[패스트엠] 새로운 프로젝트가 등록되었습니다/" . $pro->title;
        $email_log->project_id = $pro->id;
        $email_log->category = "댓글";


        $email_log->who = $this->who;
        $email_log->content = $this->content;

        $email_log->numbers = $this->numbers;

        $email_log->save();
    }
}
