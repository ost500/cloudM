<?php

namespace App\Jobs;

use App\Client;
use App\Comments;
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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Comments $input)
    {
        $this->comment = $input;

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
            Mail::send('mail.comment_mail', ['pro' => $pro, 'comment' => $this->comment], function ($message) use ($client) {
                $message->from('help@fastm.io', '패스트엠');
                $message->to($client->email, $client->name)
                    ->subject("[패스트엠]캠페인에 댓글이 입력 됐습니다");
            });
        } else {
            // 클라이언트가 쓴 댓글
            if ($this->comment->parent_id != 0) {
                // 대댓글일 경우
                // 부모댓글한테 보냄
                Log::info('부모댓글한테 보냄');
                $parent_com = Comments::find($this->comment->parent_id);
                Mail::send('mail.comment_mail', ['pro' => $pro, 'comment' => $this->comment], function ($message) use ($parent_com) {
                    $message->from('help@fastm.io', '패스트엠');
                    $message->to($parent_com->user->email, $parent_com->user->name)
                        ->subject("[패스트엠]캠페인에 댓글이 입력 됐습니다");
                });
            } else {
                $com_unique = $pro->comment->unique('u_id');
                foreach ($com_unique as $each_com) {
                    if ($each_com->user->PorC == "P") {
                        Mail::send('mail.comment_mail', ['pro' => $pro, 'comment' => $this->comment], function ($message) use ($each_com) {
                            $message->from('help@fastm.io', '패스트엠');
                            $message->to($each_com->user->email, $each_com->user->name)
                                ->subject("[패스트엠]캠페인에 댓글이 입력 됐습니다");
                        });
                    }
                }
            }
        }


    }
}
