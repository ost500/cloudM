@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">

                <!--
                        <div class="heading text-left margin-bottom-20">
                          <h4>프로젝트 검색</h4>
                        </div>
                        <div class="coupen">
                          <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
                        </div>
                -->

                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-sider-bar003">
                            <h5 class="side-tittle">파트너</h5>
                            <div>

                                <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                                <h6>{{ $loginUser->name }}</h6>
                                <a href="{{ url("/setting") }}">
                                    <div id="tag02">
                                        <div class="button">기본정보수정</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <h5 class="side-tittle">파트너스 히스토리</h5>
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th>지원한 프로젝트</th>
                                    <td>{{ count($app) }}건</td>
                                </tr>
                                <tr>
                                    <th>계약한 프로젝트</th>
                                    <td>{{ count($carryon) }}건</td>
                                </tr>
                                <tr>
                                    <th>완료한 프로젝트</th>
                                    <td>{{ count($compeleted) }}건</td>
                                </tr>
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

                                            <a class="mypage_link" href="/partners-use.html">처음 오셨나요? 이용방법을 확인하세요 > </a>
                                            <!--<div class="job-tittle02">




                                                <div class="tags_bg02 margin-top-20 padding-top-5">
                                                    <h6 class="my_h6 margin-bottom-10">활동요약정보</h6>


                                                    <div class="row">
                                                    <ul>
                                                        <div class="col-md-2"><li><div class="rating star-lg star-lg-4"></div></li></div>
                                                        <div class="col-md-3"><li><span class="rating-stats-body stats-body">
                                                                <span class="average-rating-score">4.2</span>
                                                                <span class="rating-append-unit append-unit">/ 평가 20개</span>
                                                            </span></li></div>

                                                        <div class="col-md-4"><li><span class="partners-authorized"><i class="fa fa-bars"></i> 계약한 프로젝트 <span> 0건</span></span></li></div>
                                                        <div class="col-md-3"><li><span class="partners-authorized"><i class="fa fa-file-image-o"></i> 포트폴리오 <span> 0개</span></span></li></div>



                                                    </ul>
                                                    </div>
                                                </div>
                                            </div>-->


                                            {{--<div class="job-tittle03">--}}
                                            {{--<h6 class="my_h6 margin-bottom-10 margin-top-20">관심 프로젝트</h6>--}}
                                            {{--<div class="panel02 panel-default02">--}}
                                            {{--<div class="panel-heading03">--}}
                                            {{--<div class="row">--}}
                                            {{--<span class="col-xs-4"><strong>프로젝트 제목</strong></span>--}}
                                            {{--<span class="col-xs-3"><strong>예상금액</strong></span>--}}
                                            {{--<span class="col-xs-2"><strong>예상기간</strong></span>--}}
                                            {{--<span class="col-xs-3"><strong>마감일자</strong></span>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="panel-body03">--}}
                                            {{--<ul>--}}
                                            {{--<li class="row">--}}
                                            {{--<span class="col-xs-4">반응형 회사 홈페이지 구축</span>--}}
                                            {{--<span class="col-xs-3">5,000,000원</span>--}}
                                            {{--<span class="col-xs-2">30일</span>--}}
                                            {{--<span class="col-xs-3">2016.01.21</span>--}}
                                            {{--</li>--}}
                                            {{--<li class="row">--}}
                                            {{--<span class="col-xs-4">반응형 회사 홈페이지 구축</span>--}}
                                            {{--<span class="col-xs-3">5,000,000원</span>--}}
                                            {{--<span class="col-xs-2">30일</span>--}}
                                            {{--<span class="col-xs-3">2016.01.21</span>--}}
                                            {{--</li>--}}
                                            {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}


                                            <div class="job-tittle03">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">지원한 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>지원비용</strong></span>
                                                            <span class="col-xs-2"><strong>기간</strong></span>
                                                            <span class="col-xs-2"><strong>마감</strong></span>
                                                            <span class="col-xs-1"><strong>상태</strong></span>
                                                            <span class="col-xs-1"><strong>취소</strong></span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body03">
                                                        <ul>
                                                            @foreach($app as $appItem)

                                                                <li class="row">
                                                                    <span class="col-xs-4"><a
                                                                                href="{{ url("detail/".$appItem->project->id) }}">{{ $appItem->project->title }}</a></span>
                                                                    <span class="col-xs-2">{{ number_format($appItem->project->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $appItem->project->estimated_duration }}</span>
                                                                    <span class="col-xs-2">{{ $appItem->project->deadline }}</span>
                                                                    <span class="col-xs-1">{{ $appItem->choice }}</span>

                                                                    <form id="{{$appItem->id}}form" method="POST"
                                                                          action="{{ url("/rm_app/") }}"
                                                                          onsubmit="return confirm('취소하시겠습니까?');">
                                                                        {!! csrf_field() !!}
                                                                        <input name="id" hidden
                                                                               value="{{$appItem->id}}">
                                                                        <span class="col-xs-1">
                                                                            <i style="cursor: pointer"
                                                                               id="{{ $appItem->id }}button"
                                                                               class="fa fa-times fa-lg"></i>
                                                                        </span>
                                                                    </form>
                                                                    <script>
                                                                        $("#{{$appItem->id}}button").click(function () {
                                                                            $("#{{$appItem->id}}form").submit();
                                                                        });
                                                                    </script>
                                                                </li>

                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="job-tittle03 margin-bottom-10">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">진행 중인 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>클라이언트</strong></span>
                                                            <span class="col-xs-2"><strong>비용</strong></span>
                                                            <span class="col-xs-2"><strong>마감일자</strong></span>
                                                            <span class="col-xs-2"><strong>상태</strong></span>

                                                        </div>
                                                    </div>
                                                    <div class="panel-body03">
                                                        <ul>
                                                            @foreach($carryon as $carryonItem)

                                                                <li class="row">
                                                                    <span class="col-xs-4"><a
                                                                                href="{{url("/detail/".$carryonItem->id)}}">{{ $carryonItem->title }}</a></span>
                                                                    <span class="col-xs-2">{{ $carryonItem->client->name }}</span>
                                                                    <span class="col-xs-2">{{ number_format($carryonItem->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $carryonItem->deadline }}</span>
                                                                    <span class="col-xs-1">{{ $carryonItem->step }}</span>
                                                                </li>

                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="job-tittle03 margin-bottom-10">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">완료 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>클라이언트</strong></span>
                                                            <span class="col-xs-2"><strong>비용</strong></span>
                                                            <span class="col-xs-2"><strong>마감일자</strong></span>
                                                            <span class="col-xs-2"><strong>상태</strong></span>
                                                        </div>
                                                    </div>
                                                    @foreach($compeleted as $done)
                                                        <div class="panel-body03">
                                                            <ul>
                                                                <li class="row">
                                                                    <span class="col-xs-4"><a href="{{ url("/detail/".$done->id) }}">{{ $done->title }}</a></span>
                                                                    <span class="col-xs-2">{{ $done->client->name }}</span>
                                                                    <span class="col-xs-2">{{ number_format($done->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $done->deadline }}</span>
                                                                    <span class="col-xs-2">{{ $done->step }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>


                                        </div>
                                        <!-- Content -->
                                        <!--<div id="job1" class="panel-collapse collapse in">
                                          <div class="panel-body">
                                            <p> [프로젝트 진행 방식] 시작시점에 미팅, 주 1회 미팅 등 [프로젝트의 현재 상황] 리뉴얼 기획 제안서만 있음 [상세한 업무 내용] 반응형 웹 제작 [참고자료 / 유의사항] http://www.skhynix.com/kor/index.jsp 와 같은 톤앤매너 구상</p>


                                            </div>
                                          </div>-->


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>

    @include('include.footer')
@endsection

