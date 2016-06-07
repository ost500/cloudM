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
                            <h5 class="side-tittle">클라이언트</h5>
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
                            <h5 class="side-tittle">클라이언트 히스토리</h5>
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th>검수중 프로젝트</th>
                                    <td>{{ count($checking) }}건</td>
                                </tr>
                                <tr>
                                    <th>등록 프로젝트</th>
                                    <td>{{ count($registered) }}건</td>
                                </tr>
                                <tr>
                                    <th>진행중 프로젝트</th>
                                    <td>{{ count($proceeding) }}건</td>
                                </tr>
                                <tr>
                                    <th>완료된 프로젝트</th>
                                    <td>{{ count($done) }}건</td>
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

                                            <div class="job-tittle03">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">검수중 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>예상금액</strong></span>
                                                            <span class="col-xs-2"><strong>예상기간</strong></span>
                                                            <span class="col-xs-2"><strong>마감일자</strong></span>
                                                            <span class="col-xs-1"><strong>상태</strong></span>
                                                            <span class="col-xs-1"><strong>삭제</strong></span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body03">
                                                        <ul>
                                                            @foreach($checking as $checkItem)
                                                                <li class="row">
                                                                    <span class="col-xs-4">{{ $checkItem->title }}</span>
                                                                    <span class="col-xs-2">{{ number_format($checkItem->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $checkItem->estimated_duration }}</span>
                                                                    <span class="col-xs-2">{{ $checkItem->deadline }}</span>
                                                                    <span class="col-xs-1">{{ $checkItem->step }}</span>
                                                                    <form id="del_form{{ $checkItem->id }}"
                                                                          method="POST"
                                                                          action="{{ url("/rm_project/") }}"
                                                                          onsubmit="return confirm('삭제하시겠습니까?');">
                                                                        {!! csrf_field() !!}
                                                                        <input name="id" hidden
                                                                               value="{{$checkItem->id}}">
                                                                        <span class="col-xs-1">
                                                                            <i style="cursor: pointer" id="{{$checkItem->id}}button" class="fa fa-times fa-lg"></i>
                                                                        </span>
                                                                    </form>

                                                                </li>
                                                                <script>
                                                                    $("#{{$checkItem->id}}button").click(function () {
                                                                       $("#del_form{{ $checkItem->id }}").submit();
                                                                    });
                                                                </script>

                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="job-tittle03">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">등록 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>예상금액</strong></span>
                                                            <span class="col-xs-2"><strong>예상기간</strong></span>
                                                            <span class="col-xs-2"><strong>마감일자</strong></span>
                                                            <span class="col-xs-2"><strong>상태</strong></span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body03">
                                                        <ul>
                                                            @foreach($registered as $registeredItem)
                                                                <li class="row">
                                                                    <span class="col-xs-4"><a
                                                                                href="{{ url('/applist/'.$registeredItem->id) }}">{{ $registeredItem->title }}
                                                                            ({{ $registeredItem->application->count() }})
                                                                            </a></span>
                                                                    <span class="col-xs-2">{{ number_format($registeredItem->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $registeredItem->estimated_duration }}</span>
                                                                    <span class="col-xs-2">{{ $registeredItem->deadline }}</span>
                                                                    <span class="col-xs-2">{{ $registeredItem->step }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="job-tittle03">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">진행중 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>지원비용</strong></span>
                                                            <span class="col-xs-2"><strong>기간</strong></span>
                                                            <span class="col-xs-2"><strong>제출일자</strong></span>
                                                            <span class="col-xs-2"><strong>상태</strong></span>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body03">
                                                        <ul>
                                                            @foreach($proceeding as $proceedingItem)
                                                                <li class="row">
                                                                    <span class="col-xs-4">{{ $proceedingItem->title }}</span>
                                                                    <span class="col-xs-2">{{ number_format($proceedingItem->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $proceedingItem->estimated_duration }}</span>
                                                                    <span class="col-xs-2">{{ $proceedingItem->deadline }}</span>
                                                                    <span class="col-xs-2">{{ $proceedingItem->step }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="job-tittle03 margin-bottom-10">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">완료된 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <div class="panel-heading03">
                                                        <div class="row">
                                                            <span class="col-xs-4"><strong>프로젝트 제목</strong></span>
                                                            <span class="col-xs-2"><strong>비용</strong></span>
                                                            <span class="col-xs-2"><strong>기간</strong></span>
                                                            <span class="col-xs-2"><strong>마감일자</strong></span>
                                                            <span class="col-xs-2">상태</span>

                                                        </div>
                                                    </div>
                                                    <div class="panel-body03">
                                                        <ul>
                                                            @foreach($done as $doneItem)
                                                                <li class="row">
                                                                    <span class="col-xs-4">{{ $doneItem->title }}</span>
                                                                    <span class="col-xs-2">{{ number_format($doneItem->budget) }}</span>
                                                                    <span class="col-xs-2">{{ $doneItem->estimated_duration }}</span>
                                                                    <span class="col-xs-2">{{ $doneItem->deadline }}</span>
                                                                    <span class="col-xs-2">{{ $doneItem->step }}</span>


                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
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

