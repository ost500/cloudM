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
                        <h5 class="side-tittle">파트너스</h5>
                        <div>
                            <img class="partner_profile02" src="/images/p_img02.png"><br>
                            <h6>{{ $loginUser->name }}</h6>
                            <a href="{{ url("/setting") }}">
                                <div id="tag02">
                                    <div class="button">기본정보수정</div>
                                </div>
                            </a>
                        </div>
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
                                        <div class="job-tittle02">

                                            <div class="media-body02">
                                                <h3 class="margin-bottom-0">{{ $loginUser->name }}</h3>
                                            </div>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-align-left"></i> 직종 <span>디자이너</span></span>
                                            <span class="media-body-sm"><i class="fa fa-user"></i> 개인</span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-check-circle-o"></i> 신원미인증</span>
                                            <span class="media-body-sm la-line"><i class="fa fa-check-circle-o"></i> 연락처미등록</span>
                                            <a href="#." class="button002 signup002 margin-top-20">수정하기</a>
                                            <div class="tags_bg02 margin-top-20 padding-top-5">
                                                <h6 class="my_h6 margin-bottom-10">활동요약정보</h6>


                                                <div class="row">
                                                    <ul>
                                                        <div class="col-md-2">
                                                            <li>
                                                                <div class="rating star-lg star-lg-4"></div>
                                                            </li>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <li><span class="rating-stats-body stats-body">
										<span class="average-rating-score">4.2</span>
										<span class="rating-append-unit append-unit">/ 평가 20개</span>
									</span></li>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <li><span class="partners-authorized"><i
                                                                            class="fa fa-bars"></i> 계약한 프로젝트 <span> 0건</span></span>
                                                            </li>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <li><span class="partners-authorized"><i
                                                                            class="fa fa-file-image-o"></i> 포트폴리오 <span> 0개</span></span>
                                                            </li>
                                                        </div>


                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="job-tittle02 txt_color_g">
                                            <h6 class="my_h6 margin-bottom-10 margin-top-20">자기소개</h6>
                                            <a href="#." class="button002 signup002 margin-top-12">수정하기</a>
                                            dasgdgsdfgfdgfsdgsdg
                                        </div>


                                        <div class="job-tittle02 txt_color_g">
                                            <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>
                                            <a href="#." class="button002 signup002 margin-top-12">수정하기</a>
                                            <div class="row">
                                                <div class="col-lg-4 port-img-d"><img class="img-responsive port-img"
                                                                                      src="../../../public/images/port.jpg">
                                                </div>
                                                <div class="col-lg-4 port-img-d"><img class="img-responsive port-img"
                                                                                      src="../../../public/images/port.jpg">
                                                </div>
                                                <div class="col-lg-4 port-img-d"><img class="img-responsive port-img"
                                                                                      src="../../../public/images/port.jpg">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="job-tittle02">
                                            <h6 class="my_h6 margin-bottom-10 margin-top-20">보유기술</h6>
                                            <a href="#." class="button002 signup002 margin-top-12">수정하기</a>
                                            <div class="panel02 panel-default02 margin-top-20">
                                                <div class="panel-heading03">
                                                    <div class="row">
                                                        <span class="col-xs-7"><strong>종류</strong></span>
                                                        <span class="col-xs-2"><strong>숙련도</strong></span>
                                                        <span class="col-xs-3"><strong>경험</strong></span>

                                                    </div>
                                                </div>
                                                <div class="panel-body03">
                                                    <ul>
                                                        <li class="row">
                                                            <span class="col-xs-7">보유기술 종류 입력</span>
                                                            <span class="col-xs-2">최상</span>
                                                            <span class="col-xs-3">10년 이상</span>
                                                        </li>
                                                        <li class="row">
                                                            <span class="col-xs-7">보유기술 종류 입력</span>
                                                            <span class="col-xs-2">최상</span>
                                                            <span class="col-xs-3">10년 이상</span>
                                                        </li>
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

