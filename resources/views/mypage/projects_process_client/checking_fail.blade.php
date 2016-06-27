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
                                @if($loginUser->profileImage != null)
                                    <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                                @else
                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                                @endif
                                <h6>{{ $loginUser->name }}</h6>
                                <a href="{{ url("/setting") }}">
                                    <div id="tag02">
                                        <div class="button">기본정보수정</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <h5 class="side-tittle">세부 메뉴</h5>
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th>
                                        <a href="{{ url('/my_checking') }}">검수중 프로젝트</a>
                                    <td>{{ count($checking) }}건</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="{{ url('/my_temp') }}">임시 저장</a>
                                    </th>
                                    <td>{{ count($temp) }}건</td>
                                </tr>
                                <tr>
                                    <th>
                                        <a href="{{ url('/my_fail') }}">등록 실패</a>
                                    </th>
                                    <td>{{ count($fail) }}건</td>
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

                                            <a class="mypage_link" href="{{url('/services')}}">처음 오셨나요? 이용방법을 확인하세요
                                                > </a>
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
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">등록 실패 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                        <col style="width:28%;"/>
                                                        <col style="width:14%;"/>
                                                        <col style="width:14%;"/>
                                                        <col style="width:14%;"/>
                                                        <col style="width:14%;"/>
                                                        <col style="width:8%;"/>
                                                        <col style="width:8%;"/>
                                                        <tr>
                                                            <th>프로젝트 제목</th>
                                                            <th>예상금액</th>
                                                            <th>예상기간</th>
                                                            <th>등록일자</th>
                                                            <th>마감일자</th>
                                                            <th>상태</th>
                                                            <th>취소</th>
                                                        </tr>
                                                        @if(count($fail) == 0)
                                                            <tr>
                                                                <td colspan="8">등록 실패 프로젝트가 없습니다.</td>
                                                            </tr>
                                                        @endif
                                                        @foreach($fail as $checkItem)
                                                            <tr>
                                                                <td style="text-align:left;">
                                                                    <a href="{{ url("/detail/".$checkItem->id) }}">{{ $checkItem->title }}</a>
                                                                </td>
                                                                <td>{{ number_format($checkItem->budget) }}</td>
                                                                <td>{{ $checkItem->estimated_duration }}</td>
                                                                <td>{{ substr($checkItem->created_at, 0, 10) }}</td>
                                                                <td>{{ $checkItem->deadline }}</td>
                                                                <td>{{ $checkItem->step }}</td>
                                                                <form id="del_form{{ $checkItem->id }}"
                                                                      method="POST"
                                                                      action="{{ url("/rm_project/") }}"
                                                                      onsubmit="return confirm('프로젝트를 취소 하시겠습니까?');">
                                                                    {!! csrf_field() !!}
                                                                    <input name="id" hidden
                                                                           value="{{$checkItem->id}}">
                                                                    <td>
                                                                        <i style="cursor: pointer"
                                                                           id="{{$checkItem->id}}button"
                                                                           class="fa fa-times fa-lg"></i>
                                                                    </td>
                                                                </form>
                                                                <script>
                                                                    $("#{{$checkItem->id}}button").click(function () {
                                                                        $("#del_form{{ $checkItem->id }}").submit();
                                                                    });
                                                                </script>

                                                            </tr>
                                                        @endforeach
                                                    </table>

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




    @include('include.footer')
@endsection

