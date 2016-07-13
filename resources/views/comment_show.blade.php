@foreach($comment as $comments)
    <div class="inquiry_01">
        <span><img class="partner_profile03" src="{{ $comments->user->profileImage }}"></span>
        <div>
            <span><strong>{{ $comments->user->nick }}</strong></span>
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
            @endif
            <br>
            @if($comments->secret != true || ( $comments->user == Auth::user() || $comments->project->client == Auth::user() ))
                <span>{{ $comments['comment'] }}</span>
            @else
                <span> 비공개 댓글입니다 </span>
            @endif


            {{--<form action="{{ url('commentadd/'.$comments->id) }}" method="POST" role="form">--}}
                {{--{!! csrf_field() !!}--}}
                {{--<div class="media inquiry_01">--}}
                    {{--<img class="partner_profile03" src="{{ Auth::user()->profileImage }}">--}}
                    {{--<div class="media-body">--}}
                        {{--<div class="col-md-9 ">--}}
                            {{--<label for="comment">--}}
                                {{--@if(Auth::check())--}}
                                    {{--{{Auth::user()->nick}}--}}
                                {{--@else--}}
                                    {{--<a style="cursor : pointer" data-toggle="modal"--}}
                                       {{--data-target="#loginModal" class="button signin">로그인 하세요</a>--}}
                                {{--@endif--}}
                            {{--</label>--}}
                            {{--@if(Auth::check())--}}
                                {{--<textarea name="comment" type="text" class="form-control06"--}}
                                          {{--id="id_body" required=""--}}
                                          {{--rows="10"--}}
                                          {{--cols="40" resize="none"></textarea>--}}
                            {{--@else--}}
                                {{--<a style="cursor : pointer" data-toggle="modal"--}}
                                   {{--data-target="#loginModal" class="button signin">--}}
                                                    {{--<textarea name="comment" type="text" class="form-control06"--}}
                                                              {{--id="id_body" required=""--}}
                                                              {{--rows="10"--}}
                                                              {{--cols="40" resize="none"></textarea></a>--}}
                            {{--@endif--}}

                        {{--</div>--}}
                        {{--<div class="col-md-3 ">--}}
                            {{--<input name="comment_status" id="comment_status" type="checkbox">--}}
                            {{--<label for="comment_status"><i class="fa fa-lock"--}}
                                                           {{--style="margin-right: 4px;"></i>비공개--}}
                                {{--설정</label>--}}
                            {{--<input type="hidden" name="project_id" value="{{ $project['id'] }}">--}}
                            {{--@if(Auth::check())--}}
                                {{--<button type="submit" class="button007" id="id_submit" type="button"--}}
                                        {{--value="작성하기">작성하기--}}
                                {{--</button>--}}
                            {{--@else--}}
                                {{--<a style="cursor : pointer" data-toggle="modal"--}}
                                   {{--data-target="#loginModal" class="button signin">--}}
                                    {{--<button class="button007">작성하기</button>--}}
                                {{--</a>--}}
                            {{--@endif--}}

                        {{--</div>--}}
                        {{--<br>--}}
                        {{--<div style="clear:both;"></div>--}}
                        {{--<small class="text-warning02">프로젝트 문의에 작성한 내용은 수정 및 삭제가 불가능합니다.</small>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</form>--}}


            @if($count <= 2 && count($comment->count()) != 0)
                @include('comment_show', ['comment'=>$comments->children,'count' => $count+1])
            @endif

        </div>
    </div>
@endforeach
