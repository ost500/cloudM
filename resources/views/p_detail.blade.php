@extends('include.head')
@section('content')

    @foreach($detailProject as $project)

        <!-- Content -->
        <div id="content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

            <!-- Job -->
            <section class="job padding-top-15 padding-bottom-70">
                <div class="container">

                    <div class="coupen">
                        <p><span>프로젝트 상세</span> - 내가 찾는 프로젝트를 검색해보세요.</p>
                    </div>

                    <!-- Side Bar -->
                    <div class="row">
                        <div class="col-md-3">


                            <div class="job-sider-bar003">
                                <h5 class="side-tittle">광고주</h5>
                                <div>
                                    @if($project->client->profileImage != null)
                                        <img class="partner_profile02"
                                             src="{{ URL::asset($project->client->profileImage) }}"><br>
                                    @else
                                        <img class="partner_profile02" src="/images/p_img02.png"><br>
                                    @endif

                                </div>
                                <h5 class="text-center">{{ $project->client->name }}</h5>
                                <span class="side-tittle_txt01">{{ $project->client->intro }}</span>
                            </div>

                        </div>


                        <!-- Job  Content -->
                        <div class="col-md-9 job-right">


                            <!-- Job Content -->
                            <div id="accordion">

                                <!-- Job Section -->
                                <div class="job-content job-post-page">
                                    <!-- Job Tittle -->
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <!-- Save -->
                                            <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                                            <!-- PANEL HEADING -->
                                            <div class="panel-heading">
                                                <div class="job-tittle03">

                                                    <div class="media-body02">
                                                        <h3 class="margin-bottom-20">{{ $project['title'] }}</h3>
                                                    </div>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-krw"></i> 월 예산 <span>{{ number_format($project['budget']) }}</span></span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-clock-o"></i> 예상기간 <span>{{ $project['estimated_duration'] }} </span></span>
                                                    <span class="media-body-sm la-line"><i
                                                                class="fa fa-calendar-minus-o"></i> 모집마감 <span>{{ $project['deadline'] }} </span></span>
                                                    <div style="clear:both;"></div>

                                                    <div class="panel02 panel-default02 margin-top-20">

                                                        <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <tr>
                                                                <th>기획상태</th>
                                                                <th>마케팅 경험</th>
                                                                <th>등록일자</th>
                                                                <th>예상시작일</th>
                                                                <th>미팅방식</th>
                                                                <th>진행지역</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $project['purpose'] }}</td>
                                                                <td>{{ $project['managing_experience'] }}</td>
                                                                <td>{{ date_format($project['created_at'],'Y-m-d') }}</td>
                                                                <td>{{ $project['expected_start_date'] }}</td>
                                                                <td>{{ $project['meeting_way'] }}</td>
                                                                <td>{{ $project['address_sido'] }}</td>
                                                            </tr>
                                                        </table>

                                                        {{--<div class="panel-heading03">--}}
                                                        {{--<div class="row">--}}
                                                        {{--<span class="col-xs-2"><strong>목적</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>매니징경험</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>등록일자</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>예상시작일</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>미팅방식</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>진행지역</strong></span>--}}

                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="panel-body03">--}}
                                                        {{--<ul>--}}
                                                        {{--<li class="row">--}}
                                                        {{--<span class="col-xs-2">{{ $project['purpose'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['managing_experience'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['created_at'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['expected_start_date'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['meeting_way'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['address_sido'] }}</span>--}}
                                                        {{--</li>--}}
                                                        {{--</ul>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                </div>
                                                @if(App\Project::find($project['id'])->step == "게시" || App\Project::find($project['id'])->step == "미팅")
                                                    <a style="cursor:pointer" id="pro_app_btn">
                                                        <div class="button006 margin-top-10 margin-bottom-20">프로젝트 지원하기
                                                        </div>
                                                    </a>
                                                @endif
                                                <?php

                                                echo '<script>';
                                                echo '$("#pro_app_btn").click(function(){';
                                                if (!Auth::check()) {
                                                    echo '$("#loginModal").modal("show");';
                                                } else if (Auth::user()->PorC == "C") {
                                                    echo 'alert("파트너가 아닙니다")';
                                                } else if (App\Application::where('u_id', '=', Auth::user()->id)->where('p_id', '=', $project['id'])->get()->isEmpty() == false) {
                                                    echo 'alert("이미 지원하셨습니다")';
                                                } else {
                                                    echo 'window.location = "' . url("/apply/" . $project['id']) . '";';
                                                }
                                                echo '});';
                                                echo '</script>';

                                                ?>


                                                <div style="clear:both;"></div>
                                                <div class="p_search02_txt margin-top-20">
                                                    <h5>프로젝트 내용</h5>

                                                    <?php echo nl2br($project['detail_content']); ?><br><br>


                                                    <div class="margin-top-10">
                                                        <span class="media-body-sm margin-top-23">관련기술</span>
                                                        <ul class="tags dall margin-top-20 margin-bottom-10">
                                                            <li><a href="#.">{{ $project['area'] }}</a></li>
                                                            <li><a href="#.">{{ $project['category'] }}</a></li>
                                                        </ul>
                                                    </div>


                                                </div>

                                                @if(App\Project::find($project['id'])->step == "게시" || App\Project::find($project['id'])->step == "미팅")
                                                    <a style="cursor:pointer" id="pro_app_big_btn">
                                                        <div class="button006 margin-top-10 margin-bottom-20">프로젝트 지원하기
                                                        </div>
                                                    </a>
                                                @endif
                                                <?php

                                                echo '<script>';
                                                echo '$("#pro_app_big_btn").click(function(){';
                                                if (!Auth::check()) {
                                                    echo '$("#loginModal").modal("show");';
                                                } else if (Auth::user()->PorC == "C") {
                                                    echo 'alert("파트너가 아닙니다")';
                                                } else if (App\Application::where('u_id', '=', Auth::user()->id, 'and', 'p_id', '=', $project['id'])->get()->isEmpty() == false) {
                                                    echo 'alert("이미 지원하셨습니다")';
                                                } else {
                                                    echo 'window.location = "' . url("/apply/" . $project['id']) . '";';
                                                }
                                                echo '});';
                                                echo '</script>';

                                                ?>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                                @if(Auth::check())
                                    @if($project->client->id == Auth::user()->id)
                                        <button onclick="update_form_load()" class="button004"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> 수정
                                        </button>
                                    @endif
                                @endif
                            </div>


                            <div class="job-content job-post-page margin-top-20 padding-bottom-20">
                                <h5>프로젝트 문의</h5>

                                @foreach($comment as $comments)
                                    <div class="inquiry_01">
                                        <span><img class="partner_profile03" src="/images/p_img02.png"></span>
                                        <div>
                                            <span><strong>{{ $comments->user->name }}</strong></span>
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
                                            @if($comments->secret != true)
                                                <span>{{ $comments['comment'] }}</span>
                                            @else
                                                <span> 비공개 댓글입니다 </span>
                                            @endif


                                        </div>
                                    </div>
                                @endforeach

                                <form action="{{ url('commentadd') }}" method="POST" role="form">
                                    {!! csrf_field() !!}
                                    <div class="media inquiry_01">
                                        <img class="partner_profile03" src="/images/p_img02.png">
                                        <div class="media-body">
                                            <div class="col-md-9 ">
                                                <label for="comment">
                                                    @if(Auth::check())
                                                        {{Auth::user()->name}}
                                                    @else
                                                        <a style="cursor : pointer" data-toggle="modal"
                                                           data-target="#loginModal" class="button signin">로그인 하세요</a>
                                                    @endif
                                                </label>
                                                @if(Auth::check())
                                                    <textarea name="comment" type="text" class="form-control06"
                                                              id="id_body" required=""
                                                              rows="10"
                                                              cols="40" resize="none"></textarea>
                                                @else
                                                    <a style="cursor : pointer" data-toggle="modal"
                                                       data-target="#loginModal" class="button signin">
                                                    <textarea name="comment" type="text" class="form-control06" id="id_body" required=""
                                                              rows="10"
                                                              cols="40" resize="none"></textarea></a>
                                                @endif

                                            </div>
                                            <div class="col-md-3 ">
                                                <input name="comment_status" id="comment_status" type="checkbox">
                                                <label for="comment_status"><i class="fa fa-lock"
                                                                               style="margin-right: 4px;"></i>비공개
                                                    설정</label>
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
                                        <span class="rd"><span class="rd_box">주의</span> 이메일, 전화번호 등을 게시하여 직거래를 유도하는 경우, 서비스 이용에 제재를 받을 수 있습니다.</span>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
            function update_form_load() {
                var form_display_location = $("#accordion");
                $.ajax({
                    url: "/p_update/" + "{{ $project->id }}",
                    success: function (result) {
                        form_display_location.html(result);
                    }
                });
            }
        </script>


    @endforeach

    <!-- form-wizard start -->
    <script src="/js/js.cookie.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/jquery.smartWizard.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    <script src="/js/form_wizard_main.js"></script>
    <!-- end: Packet JAVASCRIPTS -->
    <script src="/js/form_wizard.js"></script>


    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormWizard.init();

        });
    </script>

    @include('include.footer')
@endsection