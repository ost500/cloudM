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
                            <h6>{{ $partner[0]->name }}</h6>
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
                                                <h3 class="margin-bottom-0">{{ $partner[0]['user']->name }}</h3>
                                            </div>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-align-left"></i> 직종 <span>디자이너</span></span>
                                            <span class="media-body-sm"><i class="fa fa-user"></i> 개인</span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-check-circle-o"></i> 신원미인증</span>
                                            <span class="media-body-sm la-line"><i class="fa fa-check-circle-o"></i> 연락처미등록</span>
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
                                            <!--<a href="#." class="button002 signup002 margin-top-12">수정하기</a>-->
                                            <a href="#." class="more_btn margin-top-20">더보기 ></a>


                                            안녕하세요
                                            13년차 프리랜서팀 입니다.<br>
                                            원하시는 디자인 퀄리티와 개발이 가능하고 서로 만족스러운 프로젝트가 되도록 노력하겠습니다.<br><br>

                                            개발 이슈가 큰 프로젝트는<br>

                                            카드 https://www.dfgdxfhb.co.kr/<br>
                                            캐피탈 http://www.fbzxf.co.kr/

                                        </div>


                                        <div class="job-tittle02 txt_color_g">
                                            <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>
                                            <a href="#." class="more_btn margin-top-20">더보기 ></a>
                                            <div class="row">
                                                <div class="col-lg-4 port-img-d"><img class="img-responsive port-img"
                                                                                      src="/images/port.jpg"></div>
                                                <div class="col-lg-4 port-img-d"><img class="img-responsive port-img"
                                                                                      src="/images/port.jpg"></div>
                                                <div class="col-lg-4 port-img-d"><img class="img-responsive port-img"
                                                                                      src="/images/port.jpg"></div>
                                            </div>
                                        </div>


                                        <div class="job-tittle02">
                                            <h6 class="my_h6 margin-bottom-10 margin-top-20">보유기술</h6>
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


                                        <div class="job-tittle02">
                                            <h6 class="my_h6 margin-bottom-10 margin-top-20">분야</h6>
                                            <div class="panel02 panel-default02 margin-top-20">
                                                <div class="panel-heading03">
                                                    <div class="row">
                                                        <span class="col-xs-3"><strong>회사명</strong></span>
                                                        <span class="col-xs-3"><strong>근무부서</strong></span>
                                                        <span class="col-xs-3"><strong>직위</strong></span>
                                                        <span class="col-xs-3"><strong>근무기간</strong></span>
                                                    </div>
                                                </div>
                                                <div class="panel-body03">
                                                    <ul>
                                                        <li class="row">
                                                            <span class="col-xs-3">경력 회사명</span>
                                                            <span class="col-xs-3">경력 근무부서</span>
                                                            <span class="col-xs-3">경력 직위</span>
                                                            <span class="col-xs-3">2010년 12월 15일 ~ 2016년 01월 30일</span>
                                                        </li>
                                                        <li class="row">
                                                            <span class="col-xs-3">경력 회사명</span>
                                                            <span class="col-xs-3">경력 근무부서</span>
                                                            <span class="col-xs-3">경력 직위</span>
                                                            <span class="col-xs-3">2010년 12월 15일 ~ 2016년 01월 30일</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        {{--<div class="job-tittle02">--}}
                                            {{--<h6 class="my_h6 margin-bottom-10 margin-top-20">학력</h6>--}}
                                            {{--<div class="panel02 panel-default02 margin-top-20">--}}
                                                {{--<div class="panel-heading03">--}}
                                                    {{--<div class="row">--}}
                                                        {{--<span class="col-xs-2"><strong>학교명</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>분류</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>전공</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>상태</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>입학일</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>졸업일</strong></span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="panel-body03">--}}
                                                    {{--<ul>--}}
                                                        {{--<li class="row">--}}
                                                            {{--<span class="col-xs-2">학력 학교명</span>--}}
                                                            {{--<span class="col-xs-2">학사</span>--}}
                                                            {{--<span class="col-xs-2">학력 전공</span>--}}
                                                            {{--<span class="col-xs-2">졸업</span>--}}
                                                            {{--<span class="col-xs-2">2016년 12월 30일</span>--}}
                                                            {{--<span class="col-xs-2">2016년 12월 30일</span>--}}
                                                        {{--</li>--}}
                                                    {{--</ul>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}


                                        <div class="job-tittle02">
                                            <h6 class="my_h6 margin-bottom-10 margin-top-20">업종</h6>
                                            <div class="panel02 panel-default02 margin-top-20">
                                                <div class="panel-heading03">
                                                    <div class="row">
                                                        <span class="col-xs-3"><strong>구분</strong></span>
                                                        <span class="col-xs-3"><strong>자격증번호</strong></span>
                                                        <span class="col-xs-3"><strong>발행처</strong></span>
                                                        <span class="col-xs-3"><strong>발행일자</strong></span>
                                                    </div>
                                                </div>
                                                <div class="panel-body03">
                                                    <ul>
                                                        <li class="row">
                                                            <span class="col-xs-3">자격증 구분</span>
                                                            <span class="col-xs-3">자격증 번호</span>
                                                            <span class="col-xs-3">자격증 발행처</span>
                                                            <span class="col-xs-3">2016년 12월 30일</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="job-tittle02">
                                            <h6 class="my_h6 margin-bottom-10 margin-top-20">평가</h6>
                                            <a href="#." class="more_btn margin-top-20">더보기 ></a>
                                            <div class="panel02 panel-default02 margin-top-20">
                                                <div class="panel-heading03">
                                                    <div>
                                                        <ul>
                                                            <li class="panel-heading03_title">CPS 머천트 사이트 PC 및 모바일 웹디자인,
                                                                퍼블리싱
                                                            </li>
                                                            <li class="panel-heading03_title02">클라이언트 &nbsp; <strong>benbro</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body04">
                                                    <ul>
                                                        <!--<li class="row">
                                                          <span class="col-xs-4">계약일 2015년12월12일</span>
                                                          <span class="col-xs-4">계약금액 5,000,000원</span>
                                                          <span class="col-xs-4">계약기간 100일</span>
                                                        </li>-->

                                                        <li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i> 계약일
                                                            2015년12월12일
                                                        </li>
                                                        <li class="col-xs-4"><i class="fa fa-krw"></i> 계약금액 5,000,000원
                                                        </li>
                                                        <li class="col-xs-4"><i class="fa fa-clock-o"></i> 계약기간 100일
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="panel-body05">
                                                    <ul>
                                                        <li>
                                                            <div>광고주 별점</div>
                                                            <div class="rating star-lg star-lg-4"></div>
                                                            <div>4.8</div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="panel-body06">
                                                    <span><img class="partner_profile03"
                                                               src="/images/p_img02.png"></span>
                                                    <div>
                                                        <span class="rd_box02">광고주</span><span><strong>dkdlel123</strong></span><br>
                                                        <span>중간에 시안이 여러번 바뀌었음에도 잘 지원 해주신 부분이나, 추가 수정 요청부분에 잘 지원해 주신 부분이 좋았습니다. 디자인 퀄리티도 만족 합니다!</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel02 panel-default02 margin-top-10">
                                                <div class="panel-heading03">
                                                    <div>
                                                        <ul>
                                                            <li class="panel-heading03_title">CPS 머천트 사이트 PC 및 모바일 웹디자인,
                                                                퍼블리싱
                                                            </li>
                                                            <li class="panel-heading03_title02">클라이언트 &nbsp; <strong>benbro</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body04">
                                                    <ul>
                                                        <!--<li class="row">
                                                          <span class="col-xs-4">계약일 2015년12월12일</span>
                                                          <span class="col-xs-4">계약금액 5,000,000원</span>
                                                          <span class="col-xs-4">계약기간 100일</span>
                                                        </li>-->

                                                        <li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i> 계약일
                                                            2015년12월12일
                                                        </li>
                                                        <li class="col-xs-4"><i class="fa fa-krw"></i> 계약금액 5,000,000원
                                                        </li>
                                                        <li class="col-xs-4"><i class="fa fa-clock-o"></i> 계약기간 100일
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="panel-body05">
                                                    <ul>
                                                        <li>
                                                            <div>광고주 별점</div>
                                                            <div class="rating star-lg star-lg-4"></div>
                                                            <div>4.8</div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="panel-body06">
                                                    <span><img class="partner_profile03"
                                                               src="/images/p_img02.png"></span>
                                                    <div>
                                                        <span class="rd_box02">광고주</span><span><strong>dkdlel123</strong></span><br>
                                                        <span>중간에 시안이 여러번 바뀌었음에도 잘 지원 해주신 부분이나, 추가 수정 요청부분에 잘 지원해 주신 부분이 좋았습니다. 디자인 퀄리티도 만족 합니다!</span>
                                                    </div>
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