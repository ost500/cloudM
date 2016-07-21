@extends('include.head')
@section('content')
    <!-- HOME MAIN SLIDER -->
    <section class="home-slide">
        <ul class="slides">

            <!-- SLIDER 1 -->
            <li class="slide-img-1" data-stellar-background-ratio="0.6">
                <div class="position-center-center">


                    <div class="mainv_cir"></div>
                    <p class="main_banner_2">마케팅 주치의, 패스트엠에 오신 것을 환영합니다.</p>
                    <p class="b_txt01">믿을 수 있는 광고대행사를 연결 해 드립니다. 지금 광고캠페인을 등록하세요.</p>


                    <?php
                    if (!Auth::check()) {
                        echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#loginModal\" class=\"main_top_btn\">무료로 광고캠페인 등록하기</a>";

                    } else if (Auth::user()->PorC == "C") {
                        echo "<a style = \"cursor : pointer\" href= \"" . url('p_add/1') . "\" class=\"main_top_btn\">무료로 광고캠페인 등록하기</a>";
                    } else {
                        echo "<a href='/project' class=\"main_top_btn\">무료로 광고캠페인 검색하기</a>";
                    }
                    ?>
                </div>
            </li>
            </li>
        </ul>
    </section>
    {{--<section class="counter">--}}
    {{--<div class="container">--}}

    {{--<!-- Team Member -->--}}
    {{--<ul class="row">--}}
    {{--<li class="col-md-3">--}}
    {{--<div class="count">--}}
    {{--<span class="number">--}}
    {{--<i class="fa fa-file-powerpoint-o" aria-hidden="true" style="color:#333; font-size:25px;"></i>--}}
    {{--<span class="timer" data-speed="2000" data-refresh-interval="10" data-to="16812" data-from="0">16,812</span>--}}
    {{--</span>--}}
    {{--<span style="font-size:16px;" class="b">건</span>--}}
    {{--<h6 class="h6_txt">등록된 프로젝트</h6>--}}
    {{--</div>--}}
    {{--</li>--}}

    {{--<!-- Line Of Codes -->--}}
    {{--<li class="col-md-6">--}}
    {{--<div class="count">--}}
    {{--<span class="number">--}}
    {{--<i class="fa fa-check-square-o" aria-hidden="true" style="color:#333; font-size:25px;"></i>--}}
    {{--<span class="timer" data-speed="2000" data-refresh-interval="10" data-to="4820012302" data-from="0">4,820,012,302</span>--}}
    {{--</span>--}}
    {{--<span style="font-size:16px;" class="b">원</span>--}}
    {{--<h6 class="h6_txt">프로젝트 등록금액</h6>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--<!-- 변경끝------------------------------------------------------------------------------- -->--}}




    {{--<!-- Satisfied Client -->--}}
    {{--<li class="col-md-3">--}}
    {{--<div class="count">--}}
    {{--<span class="number">--}}
    {{--<i class="fa fa-smile-o" aria-hidden="true" style="color:#333; font-size:25px;"></i>--}}
    {{--<span class="timer" data-speed="2000" data-refresh-interval="10" data-to="92" data-from="0">92</span>--}}
    {{--</span>--}}
    {{--<span style="font-size:16px;" class="b">명</span>--}}
    {{--<h6 class="h6_txt">대행사 &amp; 프리랜서</h6>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</section>--}}


    <!-- Content -->
    <div id="content">

        <!-- SERVICES -->
        <section class="light-gray-bg services padding-top-40 padding-bottom-30">
            <div class="container">
                <!-- Heading -->
                <div class="heading text-center">
                    <h4>신규 광고캠페인</h4>
                </div>
            </div>

            <div class="best-services">
                <!-- Row -->
                <div class="container">
                    <ul class="row list">
                        @foreach($projects as $project)
                            <li class="col-md-4">
                                <article class="thumb">
                                    <?php
                                    if (strlen($project['title']) > 45) $p_title = mb_strcut($project['title'], 0, 45) . "...";
                                    else $p_title = $project['title'];
                                    ?>

                                    
                                    <a href="{{ url("/detail/".$project->id) }}">


                                        <h5>{{ $p_title }}</h5></a>
                                    <p class="price">월 예산 {{ number_format($project->budget) }}원
                                        <span>|</span> {{ $project->estimated_duration }}
                                        <span>|</span> {{ $project->application->count() }}명 지원</p>

                                    <p><?php echo mb_strcut($project['detail_content'], 0, 200) . "..."; ?></p>

                                    <div id="tag">
                                        @foreach($project->projects_area as $area)
                                            <div class="button">{{ $area->area }}</div>

                                            @if($count++ % 3 == 0) @break @endif
                                        @endforeach
                                        <div class="button">{{ $project->category }}</div>
                                    </div>
                                    </a>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>


        <!-- Plan -->
        <section class="white-bg padding-top-30 padding-bottom-30">
            <div class="container">

                <!-- Heading -->
                <div class="heading text-center">
                    <h4>패스트엠 프로세스</h4>
                </div>


                <ul class="main_process">
                    <div class="col-md-6 no-p">
                        <li>
                            <img src="images/proc_01.png">
                            <p class="main_process_h">광고캠페인 등록</p>
                            <!--p class="main_process_t">마케팅 프로젝트를 등록하세요</p-->
                        </li>
                        <li>
                            <img src="images/proc_02.png">
                            <p class="main_process_h">지원자 비교</p>
                            <!--p class="main_process_t">다양한 지원자를 비교해보고 선택하세요</p-->
                        </li>
                        <li>
                            <img src="images/proc_03.png">
                            <p class="main_process_h">미팅</p>
                            <!--p class="main_process_t">지원자를 선택하면 미팅이 진행됩니다</p-->
                        </li>
                    </div>
                    <div class="col-md-6 no-p">
                        <li>
                            <img src="images/proc_04.png">
                            <p class="main_process_h">계약</p>
                            <!--p class="main_process_t">미팅이 끝나고 파트너를 선정하여 계약합니다</p-->
                        </li>
                        <li>
                            <img src="images/proc_05.png">
                            <p class="main_process_h">캠페인 진행</p>
                            <!--p class="main_process_t">마케팅 프로젝트를 진행합니다</p-->
                        </li>
                        <li>
                            <img src="images/proc_06.png">
                            <p class="main_process_h">캠페인 완료</p>
                            <!--p class="main_process_t">마케팅 프로젝트를 완료합니다</p-->
                        </li>
                    </div>
                </ul>


                <!-- Start Timeline
                <div id="timeline" class="col-lg-10 col-md-12 col-sm-12">
                  <ul id="dates" class="custom-list">
                    <li><a href="#date1"><span>프로젝트 등록</span></a></li>
                    <li><a href="#date2"><span>지원자 비교</span></a></li>
                    <li><a href="#date3"><span>선택 미팅 및 계약</span></a></li>
                    <li><a href="#date4"><span>프로젝트 진행</span></a></li>
                    <li><a href="#date5"><span>프로젝트 완료</span></a></li>
                  </ul>
                  <ul id="issues" class="custom-list">
                    <li id="date1">
                      <div class="row">
                        <div class="history-thumbnail col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-0"> <img src="images/time-line-img.jpg" alt="" width="130"> </div>
                        <div class="history-content col-lg-5 col-md-5 col-sm-5">
                          <h5 class="title">프로젝트 등록</h5>
                          <p>현재 준비중인 광고캠페인 및 콘텐츠 제작 프로젝트를 등록하면, 패스트엠에 등록된 수많은 광고대행사 및 프리랜서들이 광고캠페인 및 프로젝트를 살펴 보고, 견적서/제안서를 제출합니다.</p>
                        </div>
                      </div>
                    </li>
                    <li id="date2">
                      <div class="row">
                        <div class="history-thumbnail col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-0"> <img src="images/time-line-img.jpg" alt=""> </div>
                        <div class="history-content col-lg-5 col-md-5 col-sm-5">
                          <h5 class="title">지원자 비교</h5>
                          <p>지원자들의 포트폴리오와 다른 광고주들의 평판을 살펴 보십시요. 그리고 파트너가 제출한 견적서나 제안서를 살펴 보시고 마음에 드는 파트너를 선택하시면 됩니다.</p>
                        </div>
                      </div>
                    </li>
                    <li id="date3">
                      <div class="row">
                        <div class="history-thumbnail col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-0"> <img src="images/time-line-img.jpg" alt=""> </div>
                        <div class="history-content col-lg-5 col-md-5 col-sm-5">
                          <h5 class="title">선택 미팅 및 계약</h5>
                          <p>마음에 드는 지원자를 선택하여 주시면 온라인/오프라인 미팅을 주선하여 드립니다. 미팅은 2회까지 가능합니다. 미팅 후 최종 선택을 하시면 패스트엠에서 광고대행 계약서를 작성합니다.</p>
                        </div>
                      </div>
                    </li>
                    <li id="date4">
                      <div class="row">
                        <div class="history-thumbnail col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-0"> <img src="images/time-line-img.jpg" alt=""> </div>
                        <div class="history-content col-lg-5 col-md-5 col-sm-5">
                          <h5 class="title">프로젝트 진행</h5>
                          <p>계약서 작성 후 결제를 하시면 프로젝트가 진행됩니다. 진행되는 동안 패스트엠은 광고주와 약속한 스케쥴대로 프로젝트가 진행되고 있는지 체크하고, 프로젝트가 제대로 마무리 될 수 있도록 중재하기도 합니다.</p>
                        </div>
                      </div>
                    </li>
                    <li id="date5">
                      <div class="row">
                        <div class="history-thumbnail col-lg-5 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-7 col-sm-offset-0"> <img src="images/time-line-img.jpg" alt=""> </div>
                        <div class="history-content col-lg-5 col-md-5 col-sm-5">
                          <h5 class="title">프로젝트 완료</h5>
                          <p>프로젝트는 광고주와 파트너가 모두 승인하는 경우에만 완료가 됩니다. 프로젝트가 완료되면 파트너에게 대행료를 입금하고 마무리 됩니다.</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <a href="#" id="next"><i class="ion-ios-arrow-right"></i></a> <a href="#" id="prev"><i class="ion-ios-arrow-left"></i></a> </div>
                End Timeline -->

            </div>
        </section>


        <!-- Features -->
        <section class="area4">
            <div class="container">
                <div class="col-md-6 no-p">
                    <ul class="area4_ul">
                        <li class="col-sm-6 no-p">
                            <div class="center"><img src="/images/area4_01.png"></div>
                            <p class="main_area4_h">빠른 광고캠페인 진행</p>
                            <p class="main_area4_t">대행사들에게 개별 연락/설명 할 필요 없이, 제안서/견적서를 빠르게 받아 볼 수 있어, 신속한 프로젝트 진행이 가능
                                합니다.</p>
                        </li>
                        <li class="col-sm-6 no-p">
                            <div class="center"><img src="/images/area4_02.png"></div>
                            <p class="main_area4_h">편리한 광고캠페인 진행</p>
                            <p class="main_area4_t">계산서 발행, 계약서, 대금정산, 진행상황 체크, 분쟁조정까지 관리함으로써 업무에만 집중할 수 있도록 도와드립니다.</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 no-p">
                    <ul class="area4_ul">
                        <li class="col-sm-6 no-p">
                            <div class="center"><img src="/images/area4_03.png"></div>
                            <p class="main_area4_h">믿을 수 있는 검증시스템</p>
                            <p class="main_area4_t">업종별 전문 마케팅 대행사들의 실제 진행 사례와 고객들의 평점/후기를 통해 대행사를 객관적으로 평가할 수 있습니다.</p>
                        </li>
                        <li class="col-sm-6 no-p">
                            <div class="center"><img src="/images/area4_04.png"></div>
                            <p class="main_area4_h">안전한 광고캠페인 관리</p>
                            <p class="main_area4_t">에스크로 시스템으로 대금을 안전하게 보호하고, 업무 진척도에 따라 중간 정산까지 알아서 척척. 분쟁을 사전에
                                예방합니다.</p>
                        </li>
                    </ul>

                </div>
            </div>
        </section>


        <section class="light-gray-bg padding-top-30 padding-bottom-20">
            <div class="container">
                <div class="col-md-1"></div>
                <div class="col-md-8" style="text-align:center;">
                    <p>지금 준비중인 광고캠페인이나 영상/디자인/홈페이지/콘텐츠 제작 프로젝트를 등록해 보세요. </p>
                </div>
                <div class="col-md-3">
                    <?php
                    if (!Auth::check()) {
                        echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#loginModal\" class=\"btn_main btn_main-1\">광고캠페인 등록하기<i class=\"fa fa-caret-right\"></i></a>";

                    } else if (Auth::user()->PorC == "C") {
                        echo "<a style = \"cursor : pointer\" href= \"" . url('p_add/1') . "\" class=\"btn_main btn_main-1\">프로젝트 등록하기<i class=\"fa fa-caret-right\"></i></a>";
                    } else {
                        echo "<a style = \"cursor : pointer\" class=\"btn_main btn_main-1\">프로젝트 등록하기<i class=\"fa fa-caret-right\"></i></a>";
                    }
                    ?>

                </div>
            </div>
        </section>


        <section class="white-bg blog padding-top-30 padding-bottom-30">
            <div class="container">
                <!-- Heading -->
                <div class="heading text-center">
                    <h4 class="margin-bottom-30">광고주들이 얘기하는 패스트엠</h4>
                </div>
                <!-- Blog Row -->
                <div class="row">
                    <!-- Blog Post -->
                    <div class="col-md-4 no-padding">
                        <article>
                            <img class="img-responsive post_img00" src="images/m_pho01.png" alt="">

                            <!-- Detail -->
                            <div class="post-detail">
                                <h8 class="post-tittle">쇼핑몰 장지호 대표님</h8>
                                <span><img src="images/m_pho01_txt.png"></span>

                            </div>
                        </article>
                    </div>
                    <!-- Blog Post -->
                    <div class="col-md-4 no-padding">
                        <article>
                            <img class="img-responsive post_img00" src="images/m_pho02.png" alt="">
                            <!-- Detail -->
                            <div class="post-detail">
                                <h8 class="post-tittle">레이호텔 임종정 대표님</h8>
                                <span><img src="images/m_pho02_txt.png"></span>

                            </div>
                        </article>
                    </div>
                    <!-- Blog Post -->
                    <div class="col-md-4 no-padding">
                        <article>
                            <img class="img-responsive post_img00" src="images/m_pho03.png" alt="">
                            <!-- Detail -->
                            <div class="post-detail">
                                <h8 class="post-tittle">솔가 마케팅담당 김서영님</h8>
                                <span><img src="images/m_pho03_txt.png"></span>

                            </div>
                        </article>
                    </div>

                </div>
            </div>

        </section>


        <!-- Counter -->
        <section class="clients  padding-top-30 padding-bottom-30">
            <div class="container">

                <!-- Heading -->
                <div class="heading text-center">
                    <h4>협력업체</h4>
                    <span>법률조언, 분쟁중재 등 광고 프로젝트을 진행하며 발생 할 수 있는 수많은 변수들을 대비했습니다.</span>
                </div>

                <!-- Clients -->
                <div>
                    <div class="item">
                        <ul class="row col-4">
                            <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/family2.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/family3.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/family4.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>

                <!-- Heading -->
                <div class="heading text-center padding-top-70">
                    <h4>클라이언트</h4>
                </div>

                <!-- Clients -->
                <div>
                    <div class="item">
                        <ul class="row col-6">
                            <li><img class="img-responsive" src="images/client/f1.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f2.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f3.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f4.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f5.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f6.jpg" alt=""></li>
                        </ul>
                        <ul class="row col-6">
                            <li><img class="img-responsive" src="images/client/f7.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f8.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f9.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f10.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f11.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f12.jpg" alt=""></li>
                        </ul>
                        <ul class="row col-6">
                            <li><img class="img-responsive" src="images/client/f13.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f14.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f15.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f16.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f17.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f18.jpg" alt=""></li>
                        </ul>
                        <ul class="row col-6">
                            <li><img class="img-responsive" src="images/client/f19.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f20.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f21.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f22.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f23.jpg" alt=""></li>
                            <li><img class="img-responsive" src="images/client/f24.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>


            </div>
        </section>
    </div>
    @include('include.footer')
@endsection
