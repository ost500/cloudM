@extends('include.head')
@section('content')

    @foreach($detailProject as $project)

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







                            <a style="cursor:pointer" id="pro_app_btn">
                                <div class="button006 margin-top-10">프로젝트 지원하기
                                </div>
                            </a>
                            <?php

                                echo '<script>';
                                echo '$("#pro_app_btn").click(function(){';
                                if(!Auth::check()){
                                    echo '$("#loginModal").modal("show");';
                                }
                                else if (Auth::user()->PorC == "C"){
                                    echo 'alert("파트너가 아닙니다")';
                                }
                                else if (App\Application::where('u_id', '=', Auth::user()->id, 'and', 'p_id', '=', $project['id'])->get()->isEmpty() == false) {
                                    echo 'alert("이미 지원하셨습니다")';
                                }
                                else{
                                    echo 'window.location = "'.url("/apply/".$project['id']) . '";';
                                }
                                echo '});';
                            echo '</script>';

                            ?>


                            <div class="job-sider-bar003">
                                <h5 class="side-tittle">광고주</h5>
                                <div>
                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                                </div>
                                <span class="side-tittle_txt01">(주)아드리코는 식자재 유통 및 푸드서비스 전문 기업입니다. 아드리코는 식자재 관련 모든 상품을 취급하고 있으며 일반식당, 프랜차이즈업체, 급식업체 등 식자재가 필요한 모든 곳에 고객이 찾는 상품을 가장 안전하고 신선하게 공급하고 있습니다.</span>
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
                                                        class="fa fa-krw"></i> 예상금액 <span>25,000,000원 </span></span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-clock-o"></i> 예상기간 <span>100일 </span></span>
                                                    <span class="media-body-sm la-line"><i
                                                                class="fa fa-calendar-minus-o"></i> 모집마감 <span>2016년 3월 31일 </span></span>
                                                    <div style="clear:both;"></div>
                                                    <!--<div class="panel02 panel-default02 margin-top-20">
                                                                              <div class="panel-heading03">
                                                                                <div class="row">
                                                                                    <span class="col-xs-4"><strong>기획상태</strong></span>
                                                                                    <span class="col-xs-4"><strong>매니징경험</strong></span>
                                                                                    <span class="col-xs-4"><strong>등록일자</strong></span>

                                                                                </div>
                                                                              </div>
                                                                              <div class="panel-body03">
                                                                                <ul>
                                                                                  <li class="row">
                                                                                    <span class="col-xs-4">상세한 기획문서</span>
                                                                                    <span class="col-xs-4">없음</span>
                                                                                    <span class="col-xs-4">2016년 3월 31일</span>
                                                                                  </li>
                                                                                </ul>
                                                                              </div>
                                                        </div>
                                                        <div class="panel02 panel-default02 margin-top-3">
                                                                              <div class="panel-heading03">
                                                                                <div class="row">
                                                                                    <span class="col-xs-4"><strong>예상시작일</strong></span>
                                                                                    <span class="col-xs-4"><strong>미팅방식</strong></span>
                                                                                    <span class="col-xs-4"><strong>진행지역</strong></span>

                                                                                </div>
                                                                              </div>
                                                                              <div class="panel-body03">
                                                                                <ul>
                                                                                  <li class="row">
                                                                                    <span class="col-xs-4">2016년 3월 31일</span>
                                                                                    <span class="col-xs-4">오프라인미팅</span>
                                                                                    <span class="col-xs-4">경기도</span>
                                                                                  </li>
                                                                                </ul>
                                                                              </div>
                                                        </div>-->
                                                    <div class="panel02 panel-default02 margin-top-20">
                                                        <div class="panel-heading03">
                                                            <div class="row">
                                                                <span class="col-xs-2"><strong>기획상태</strong></span>
                                                                <span class="col-xs-2"><strong>매니징경험</strong></span>
                                                                <span class="col-xs-2"><strong>등록일자</strong></span>
                                                                <span class="col-xs-2"><strong>예상시작일</strong></span>
                                                                <span class="col-xs-2"><strong>미팅방식</strong></span>
                                                                <span class="col-xs-2"><strong>진행지역</strong></span>

                                                            </div>
                                                        </div>
                                                        <div class="panel-body03">
                                                            <ul>
                                                                <li class="row">
                                                                    <span class="col-xs-2">상세한 기획문서</span>
                                                                    <span class="col-xs-2">없음</span>
                                                                    <span class="col-xs-2">2016년 3월 31일</span>
                                                                    <span class="col-xs-2">2016년 3월 31일</span>
                                                                    <span class="col-xs-2">오프라인미팅</span>
                                                                    <span class="col-xs-2">경기도</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div style="clear:both;"></div>
                                                <div class="p_search02_txt margin-top-20">
                                                    <h5>프로젝트 내용</h5>
                                                    <strong>
                                                        <프로젝트 진행 방식>
                                                    </strong><br>
                                                    사전 미팅 진행 간 현재 사용중인 프로그램에 대한 기능 공유 를 진행하고,
                                                    이를 바탕으로 주 1~2회 미팅을 통해 계약 과정을 진행하고자 합니다.<br><br>


                                                    <strong>
                                                        <프로젝트의 현재 상황>
                                                    </strong><br>
                                                    현재 내부 서버 설치형으로 이용중인 프로그램이 있으나,
                                                    고객과의 접점이 없어, 관리가 불편해 이를 개선한 웹기반 erp를 구축하고자 합니다.<br><br>


                                                    <strong>
                                                        <상세 업무 내용>
                                                    </strong><br>
                                                    본사와 식당을 연결하는 식자재 수발주 시스템을 구축하고자 합니다.<br><br>


                                                    필요 요소:
                                                    웹 기반 수발주 시스템 개발 / 고객 페이지 디자인<br><br>


                                                    유저 타입 : <br>
                                                    + 본사<br>
                                                    + 식당<br>
                                                    유저 타입에 따라 사용 가능한 기능들이 다르며, 유저별 기능들은 아래와 같습니다.<br><br>


                                                    [ 고객 시스템 ]
                                                    +상품 현황/상세내역<br>
                                                    +주문 관리(상품 검색, 주문등록, 주문 현황, 주문 확정, 주문 명세표, 주문 수납처리, 거래명세표)<br>
                                                    +거래 현황(거래원장, 세금계산서합계표, 입금 내역)<br>
                                                    +공지확인, 주문수납자동 확정, 거래처 등록 요청<br><br>


                                                    [본사 시스템]
                                                    +판매점 관리<br>
                                                    +상품 및 상품분류 관리<br>
                                                    +가격 관리<br>
                                                    +일반코드관리<br>
                                                    +주문 관리(상품 검색, 주문등록, 주문 현황, 주문 집계표, 주문발송 현황)<br>
                                                    +출고 관리(주문 내역 다운로드, 출고 현황, 출고 확정)<br>
                                                    +매출 관리(거래원장, 세금계산서합계표, 매출 현황, 영수증발행)<br><br>


                                                    대부분의 화면 구성이 표 형식으로 진행 될 예정이며,
                                                    요구사항을 참고할 기존 프로그램이 있습니다.<br><br>


                                                    기존에 수발주 시스템을 구축한 경험이 있으신 경우,
                                                    이를 바탕으로 기능 정의를 진행해주셔도 무방합니다.
                                                    기획 및 기능 정의에 따른 견적 조정도 가능합니다.<br><br>


                                                    <strong>
                                                        <참고 자료
                                                        /유의 사항></strong><br>
                                                    금액 및 기간 등의 내용은 예상하시는 범위에 맞추어 조정하여 지원 부탁드립니다.<br>
                                                    미팅 시점까지 추가적인 필요 기능이 있을 경우 명확하게 정리하여 준비할 예정입니다.<br><br>


                                                    고객 시스템의 화면 구성은<br>
                                                    https://www.youtube.com/watch?v=C1tTYfTU5rU<br>
                                                    의 영상을 참고해주시면 좋을 듯 합니다.


                                                    <div class="margin-top-10">
                                                        <span class="media-body-sm margin-top-23">관련기술</span>
                                                        <ul class="tags dall margin-top-20 margin-bottom-10">
                                                            <li><a href="#.">photoshop</a></li>
                                                            <li><a href="#.">html</a></li>
                                                            <li><a href="#.">css</a></li>
                                                            <li><a href="#.">script</a></li>
                                                            <li><a href="#.">php</a></li>
                                                        </ul>
                                                    </div>


                                                </div>


                                                <a href="#.">
                                                    <div class="button006 margin-top-10 margin-bottom-20">프로젝트 지원하기
                                                    </div>
                                                </a>


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


                            <div class="job-content job-post-page margin-top-20 padding-bottom-20">
                                <h5>프로젝트 문의</h5>

                                @foreach($comment as $comments)
                                    <div class="inquiry_01">
                                        <span><img class="partner_profile03" src="/images/p_img02.png"></span>
                                        <div>
                                            <span><strong>dkdlel123</strong></span><br>
                                            <span>{{ $comments['comment'] }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                <form action="{{ url('commentadd') }}" method="POST" role="form">
                                    {!! csrf_field() !!}
                                    <div class="media inquiry_01">
                                        <img class="partner_profile03" src="/images/p_img02.png">
                                        <div class="media-body">
                                            <div class="col-md-9 ">
                                    <textarea name="comment" type="text" class="form-control06" id="id_body" required=""
                                              rows="10"
                                              cols="40" resize="none"></textarea>
                                            </div>
                                            <div class="col-md-3 ">
                                                <input name="comment_status" id="comment_status" type="checkbox">
                                                <label for="comment_status"><i class="fa fa-lock"
                                                                               style="margin-right: 4px;"></i>비공개
                                                    설정</label>
                                                <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                                                <button type="submit" class="button007" id="id_submit" type="button"
                                                        value="작성하기"/>

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


    @endforeach


    @include('include.footer')
@endsection