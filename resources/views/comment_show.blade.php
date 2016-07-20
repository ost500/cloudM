@foreach($comment as $comments)



    <span><img class="partner_profile03" src="{{ $comments->user->profileImage }}"></span>
    <div>
        <span class="upper"><strong>{{ $comments->user->nick }}</strong></span>
        @if($comments->u_id == Auth::user()->id && $comments->secret)
            <span class="padding-left-10"><i class="fa fa-user-secret" title="비공개"></i></span>
        @endif
        <span class="padding-left-10 padding-right-10">{{ $comments['created_at'] }}</span>

        @if(Auth::check())
            @if($comments->u_id == Auth::user()->id)
                <form style="display: inline;"
                      id="del_form{{ $comments->id }}"
                      method="POST"
                      action="{{ url("/commentdel") }}"
                      onsubmit="return confirm('삭제하시겠습니까?');">
                    {!! csrf_field() !!}
                    <input name="id" hidden
                           value="{{$comments->id}}">
                    <i style="cursor: pointer"
                       id="{{$comments->id}}button"
                       class="fa fa-times fa-lg"></i>
                </form>
                <script>
                    $("#{{$comments->id}}button").click(function () {
                        $("#del_form{{ $comments->id }}").submit();
                    });
                </script>
            @endif

                @if($count < 3 && $comments->project->client->id == Auth::user()->id)
                    <span id="comment_button_{{$comments->id}}" class="comment_btn">댓글</span>
                @endif

        @endif
        <div class="clear padding-top-10"></div>
        @if($comments->secret)
            @if($comments->user->id == Auth::user()->id || $comments->project->client->id == Auth::user()->id)
                <span>{{ $comments['comment'] }}</span>
            @else
                <span> 비공개 댓글입니다 </span>
            @endif
        @else
            <span>{{ $comments['comment'] }}</span>
        @endif

        <div class="clear"></div>
        <div class="cocoment_bar"></div>




    <div hidden id="add_comment_{{ $comments->id }}">
        <form action="{{ url('commentadd/'.$comments->id) }}" method="POST" role="form">
            {!! csrf_field() !!}
            <div class="media inquiry_01">
                <img class="partner_profile03" src="{{ Auth::user()->profileImage }}">
                <div class="media-body">
                    <div class="col-md-9 ">
                        <label for="comment">
                            @if(Auth::check())
                                {{Auth::user()->nick}}
                            @else
                                <a style="cursor : pointer" data-toggle="modal"
                                   data-target="#loginModal" class="button signin">로그인 하세요</a>
                            @endif
                        </label>



                        @if(!Auth::check())
                                <a style="cursor : pointer" data-toggle="modal"
                                   data-target="#loginModal" class="button signin">
                        @endif
                            <textarea name="comment" type="text" class="form-control06"
                                      id="id_body" required=""
                                      rows="10"
                                      cols="40" resize="none" {{ (!$comment_qulification)?"disabled":"" }}>{{ (!$comment_qulification)?"신원인증 받은 후에만 작성가능합니다.":"" }}</textarea></a>


                    </div>
                    <div class="col-md-3 ">
                        <input name="comment_status" id="comment_status" type="checkbox" checked>
                        <label for="comment_status"><i class="fa fa-lock" style="margin-right: 4px;"></i>비공개 설정</label>
                        <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                        @if(Auth::check())
                            <button type="submit" class="button007" id="id_submit" type="button"
                                    value="작성하기">작성하기
                            </button>
                        @else
                            <a style="cursor : pointer" data-toggle="modal"
                               data-target="#loginModal" class="button signin">
                                <button class="button007">작성하기</button>
                            </a>
                        @endif

                    </div>
                    <br>
                    <div style="clear:both;"></div>
                    <small class="text-warning02">프로젝트 문의에 작성한 내용은 수정 및 삭제가 불가능합니다.</small>
                </div>

            </div>
        </form>
    </div>

    @if($comment_qulification)
    <script>
        $("#comment_button_{{$comments->id}}").click(function () {
            $("#add_comment_" + "{{$comments->id}}").removeAttr("hidden");
        });

    </script>
    @else
    <script> $("#comment_button_{{$comments->id}}").click(function(){alert("권한이 없습니다");});</script>
    @endif

    <div class="clear"></div>

    @if($count <= 2 && count($comment->count()) != 0)
        @include('comment_show', ['comment'=>$comments->children,'count' => $count+1])
    @endif

</div>

@endforeach
