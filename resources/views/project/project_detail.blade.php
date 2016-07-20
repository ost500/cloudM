@extends('include.head')
@section('content')

    @foreach($detailProject as $project)

        <!-- Content -->
        <div id="content">

            <!-- Job -->
            <section class="job padding-top-15 padding-bottom-70">
                <div class="container">
                    <!-- Side Bar -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="job-sider-bar003">
                                <h5 class="side-tittle">광고주</h5>
                                <div class="col-md-12 text-center">
                                    @if($project->client->profileImage != null)
                                        <img class="partner_profile_200"
                                             src="{{ URL::asset($project->client->profileImage) }}"><br>
                                    @else
                                        <img class="partner_profile0_150" src="/images/p_img02.png"><br>
                                    @endif
                                </div>

                                <div id="tag02" class="padding-20">
                                    <span class="side-tittle_txt01">{{ $project->client->intro }}</span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    @if(($project['step'] == "게시" || $project['step'] == "미팅") && $project['deadline'] >= date('Y-m-d'))
                                        @if(App\Application::where('u_id',Auth::user()->id)->where('p_id',$project->id)->get()->isEmpty() == false)
                                            <div class="btn btn-app-not margin-top-10 margin-bottom-5">이미 지원한 캠페인</div>
                                        @else
                                            <a style="cursor:pointer" id="pro_app_btn">
                                                <div id="pro_apply" class="btn btn-app margin-top-10 margin-bottom-5">
                                                    캠페인 지원하기
                                                </div>
                                            </a>
                                        @endif
                                    @else
                                        <div class="btn btn-app-not margin-top-10 margin-bottom-5">캠페인 지원불가</div>
                                    @endif
                                    <?php

                                    echo '<script>';
                                    echo '$("#pro_apply").click(function(){';
                                    if (Auth::check()) {
                                        if (!Auth::user()->partners['authenticated']) {
                                            echo 'alert("\n패스트엠은 회원 가입 후 인증을 거쳐야 활동이 가능합니다.\n\n신원인증, 회사소개서, 상품소개서, 회사소개, 포트폴리오 등록 필요\n\n"); return false;';
                                        }
                                    }
                                    echo '});';


                                    echo '$("#pro_app_btn").click(function(){';
                                    if (!Auth::check()) {
                                        echo '$("#loginModal").modal("show");';
                                    } else if (Auth::user()->PorC == "C") {
                                        echo 'alert("대행사가 아닙니다")';
                                    } else if (App\Application::where('u_id', '=', Auth::user()->id)->where('p_id', '=', $project['id'])->get()->isEmpty() == false) {
                                        echo '$("#pro_apply").css("btn btn-app-not margin-top-10 margin-bottom-5")';
                                    } else {
                                        echo 'window.location = "' . url("/apply/" . $project['id'] . "/application") . '";';
                                    }
                                    echo '});';
                                    echo '</script>';

                                    ?>
                                </div>
                                <div class="col-md-12">
                                    <a style="cursor:pointer" id="pro_app_btn">
                                        <form method="POST"
                                              action="{{ url('/detail/'.$project->id.'/interesting') }}">
                                            {{ csrf_field() }}
                                            @if(!Auth::check())

                                            @else
                                                @if(Auth::user()->PorC == "P")

                                                    @if(App\Interesting::where('u_id',Auth::user()->id)->where('p_id',$project->id)->get()->isEmpty() == false)
                                                        <div onclick="javascript:alert('이미 추가하셨습니다');"
                                                             class="btn btn-app-not margin-top-10 margin-bottom-5">관심
                                                            캠페인
                                                        </div>
                                                    @else
                                                        <form method="post"
                                                              action="{{route('interesting_add',['id'=> $project->id])}}">
                                                            <button class="btn btn-interesting margin-top-5">관심 캠페인 추가
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                @endif
                                            @endif
                                        </form>
                                    </a>
                                </div>
                            </div>

                            <div class="job-sider-bar02">
                                <h5 class="side-tittle">광고주 정보</h5>
                                <table class="history_table">
                                    <tbody>
                                    <tr>
                                        <th>등록 캠페인</th>
                                        <td>{{ $count['등록'] }}건</td>
                                    </tr>
                                    <tr>
                                        <th>계약한 캠페인</th>
                                        <td>{{ $count['계약'] }}건</td>
                                    </tr>
                                    <tr>
                                        <th>계약률</th>
                                        <td>{{ $count['계약률'] }}%</td>
                                    </tr>
                                    <tr>
                                        <th>진행중 캠페인</th>
                                        <td>{{ $count['진행'] }}건</td>
                                    </tr>
                                    <tr>
                                        <th>완료한 캠페인</th>
                                        <td>{{ $count['완료'] }}건</td>
                                    </tr>
                                    {{--<tr>--}}
                                    {{--<th>평균 진행기간</th>--}}
                                    {{--<td>{{ $project->count() }}건</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<th>평균 집행비용</th>--}}
                                    {{--<td>{{ $project->count() }}건</td>--}}
                                    {{--</tr>--}}
                                    </tbody>
                                </table>
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
                                                        class="fa fa-krw"></i> 월 예산 <span>{{ number_format($project['budget']) }}
                                                    원</span></span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-clock-o"></i> 캠페인기간 <span>{{ $project['estimated_duration'] }} </span></span>
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
                                                                <th>캠페인 목적</th>
                                                                <th>캠페인 경험</th>
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


                                                    </div>
                                                </div>


                                                <div style="clear:both;"></div>
                                                <div class="p_search02_txt margin-top-20">
                                                    <h5>캠페인 내용</h5>

                                                    <?php echo nl2br($project['detail_content']); ?><br><br>


                                                    <div class="margin-top-10">
                                                        <span class="media-body-sm margin-top-23">희망매체</span>
                                                        <ul class="tags margin-top-20 margin-bottom-10">
                                                            @foreach($project->projects_area as $areas)
                                                                <li><a href="#.">{{ $areas->area }}</a></li>
                                                            @endforeach
                                                            <li><a href="#.">{{ $project['category'] }}</a></li>
                                                        </ul>
                                                    </div>


                                                </div>


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


                            <div class="job-content02 job-post-page margin-top-20 padding-bottom-20">
                                <h5>캠페인 문의</h5>

                                <div class="inquiry_01">
                                    @include('comment_show',['comment' => $comment->get(), 'count'=> 1])
                                </div>

                                <form action="{{ url('commentadd/0') }}" method="POST" role="form">
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
                                                           data-target="#loginModal" class="button signin">로그인
                                                            하세요</a>
                                                    @endif
                                                </label>


                                                <textarea name="comment" type="text" class="form-control06" id="id_body" required="required" rows="10"
                                                          cols="40" resize="none" {{ (!$comment_qulification)?"disabled":"" }}>{{ (!$comment_qulification)?"신원인증 받은 후에만 작성가능합니다.":"" }}</textarea>
                                            </div>


                                            <div class="col-md-3 ">
                                                <input name="comment_status" id="comment_status" type="checkbox" checked>
                                                <label for="comment_status"><i class="fa fa-lock"
                                                                               style="margin-right: 4px;"></i>비공개
                                                    설정</label>
                                                <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                                                <button type="submit" class="button007" id="id_submit" type="button"
                                                        value="작성하기"  {{ (!$comment_qulification)?"disabled":"" }}>작성하기
                                                </button>

                                            </div>
                                            <br>
                                            <div style="clear:both;"></div>
                                            <small class="text-warning02">캠페인 문의에 작성한 내용은 수정 및 삭제가 불가능합니다.</small>
                                        </div>
                                        <span class="rd"><span class="rd_box">주의</span> 업체명, 도메인, 이메일, 전화번호 등을 게시하는 경우, 서비스 이용에 제재를 받을 수 있습니다.</span>


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