@extends('include.head')
@section('content')
    <!-- HOME MAIN SLIDER -->
    <section class="home-slide">
        <ul class="slides">

            <!-- SLIDER 1 -->
            <li class="slide-img-1" data-stellar-background-ratio="0.6">
                <div class="position-center-center">


                    <div class="mainv_cir"></div>
                    <p class="main_banner_2">마케팅 중개 플랫폼, 클라우드엠에 오신 것을 환영합니다.</p>
                    <p class="b_txt01">믿을 수 있는 광고대행사와 기업을 연결 해 드립니다. 지금 프로젝트를 등록하세요.</p>





                <?php
                    if (!Auth::check()) {
                        echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#login-modal\" class=\"main_top_btn\">무료로 프로젝트 등록하기</a>";

                    } else if (Auth::user()->PorC == "C") {
                        echo "<a style = \"cursor : pointer\" href= \"" . url('p_add/1') . "\" class=\"main_top_btn\">무료로 프로젝트 등록하기</a>";
                    } else {
                        echo "<a style = \"cursor : pointer\" class=\"main_top_btn\">무료로 프로젝트 등록하기</a>";
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
                    <h4>신규 프로젝트</h4>
                </div>
            </div>

            <div class="best-services">
                <!-- Row -->
                <div class="container">
                    <ul class="row list">
                        @foreach($projects as $project)
                            <li class="col-md-4">
                                <article class="thumb">
                                    <a href="{{ url("/detail/".$project->id) }}"><h5>{{ $project->title }}</h5></a>
                                    <p class="price">월 예산 {{ number_format($project->budget) }}원   <span>|</span>   {{ $project->estimated_duration }}   <span>|</span>   {{ $project->application->count() }}명 지원</p>

                                    <p><?php echo mb_strcut($project['detail_content'], 0, 200)."..."; ?></p>

                                    <div id="tag">

                                        <div class="button">{{ $project->area }}</div>
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
                    <h4>클라우드엠 프로세스</h4>
                </div>
                <div class="main_process_big"><img class="img-responsive" src="images/cloud_ex.png"></div>
                <div class="main_process_small"><img class="img-responsive" src="images/cloud_ex_600px.png"></div>

            </div>
        </section>


        <section class="light-gray-bg padding-top-30 padding-bottom-20">
            <div class="container">

                <div class="col-md-1"></div>
                <div class="col-md-8" style="text-align:center;">
                    <p>광고 캠페인/영상/홈페이지/콘텐츠 제작 등 프로젝트를 찾고 있는 대행사/프리랜서인가요?</p>
                </div>
                <div class="col-md-3">
                    <a href="#." class="btn_main btn_main-1">회원가입하기<i
                                class="fa fa-caret-right"></i></a>
                </div>

            </div>
        </section>


        <!-- Features -->
        <section class="features padding-top-30 padding-bottom-30">
            <div class="container">
                <!-- Heading -->
                <div class="heading text-center">
                    <h4>빠르고 안정적인 클라우드엠</h4>
                </div>

                <!-- Features -->
                <div class="list-style-featured">
                    <div class="row no-margin">
                        <!-- LIST LEFT -->
                        <div class="col-md-4 no-padding">
                            <ul class="text-right">
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>무료로 당신의 캠페인을 알리세요.</h6>
                                            <p>원하는 광고 프로젝트를 빠르고 안정되게 진행할 수 있습니다. 클라우드엠과 함께하는 수많은 파트너들에게 당신의 광고 캠페인을
                                                알려보세요.</p>
                                        </div>
                                        <div class="media-right">
                                            <div class="m_icon01"> <!--<i class="fa fa-paint-brush"></i>--> </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>동영상/홈페이지/디자인/콘텐츠까지</h6>
                                            <p>광고와 관련된 영상/디자인/홈페이지/콘텐츠 제작까지 클라우드엠을 통해 해결하세요. 고도로 숙련된 프로들이 함께합니다.</p>
                                        </div>
                                        <div class="media-right">
                                            <div class="m_icon02"> <!--<i class="fa fa-tablet"></i>--> </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6>실력있는 대행사를 빠르게 비교검색</h6>
                                            <p>다양한 경험을 가진 지원자들의 포트폴리오와 제안서. 함께 일했던 광고주들의 평가까지 한눈에 살펴보고 비교할 수 있습니다.</p>
                                        </div>
                                        <div class="media-right">
                                            <div class="m_icon03"> <!--<i class="fa fa-chrome"></i>--> </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- LIST IMAGE -->
                        <div class="col-md-4 text-center no-padding"><img class="img-responsive" src="images/iphone.png"
                                                                          alt=""></div>

                        <!-- LIST ICON RIGHT -->
                        <div class="col-md-4 no-padding">
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="m_icon04"> <!--<i class="fa fa-gear"></i>--> </div>
                                        </div>
                                        <div class="media-body">
                                            <h6>안전한 대금보호와 정확한 비용처리</h6>
                                            <p>에스크로 시스템을 통한 안전하게 대금을 보관하며, 진행하는 광고 캠페인 및 프로젝트가 정확히 마무리 되었을때만 비용을
                                                지급합니다.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="m_icon05"> <!--<i class="icon-layers"></i>--> </div>
                                        </div>
                                        <div class="media-body">
                                            <h6>안심 계약서 및 분쟁조정</h6>
                                            <p>공증 받아 안심할 수 있는 계약서 작성 및 세금계산서 발행, 이후 혹시 모를 분쟁조정까지, 클라우드엠이 안전하고 꼼꼼하게 처리해
                                                드립니다.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="m_icon06"> <!--<i class="icon-bulb"></i>--> </div>
                                        </div>
                                        <div class="media-body">
                                            <h6>프로젝트 일정관리 시스템</h6>
                                            <p>클라우드엠 표준작업공정표를 이용하여 프로젝트의 일정을 관리하고 있으며, 이를 통해 작업 지연에 의한 손실을 최소화 합니다.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="light-gray-bg padding-top-30 padding-bottom-20">
            <div class="container">
                <div class="col-md-1"></div>
                <div class="col-md-8" style="text-align:center;">
                    <p>지금 준비중인 광고 캠페인이나 영상/디자인/홈페이지/콘텐츠 제작 프로젝트를 등록해 보세요. </p>
                </div>
                <div class="col-md-3">
                    <a href="#." class="btn_main btn_main-1">프로젝트 등록하기<i
                                class="fa fa-caret-right"></i></a>
                </div>
            </div>
        </section>


        <section class="white-bg blog padding-top-30 padding-bottom-30">
            <div class="container">
                <!-- Heading -->
                <div class="heading text-center">
                    <h4 class="margin-bottom-30">광고주들이 얘기하는 클라우드엠</h4>
                </div>
                <!-- Blog Row -->
                <div class="row">
                    <!-- Blog Post -->
                    <div class="col-md-4 no-padding">
                        <article> <img class="img-responsive post_img00" src="images/m_pho01.png" alt="" >


                            <!-- Detail -->
                            <div class="post-detail"> <h8 class="post-tittle">비즈팜 김남형 부장님</h8> <span><img src="images/m_pho01_txt.png"></span>
                                <p>급하게 진행할 마케팅 프로젝트에서 대행사를 찾고 있었는데,<br>
                                    프로젝트 등록 후  빠르게 적합한 대행사를 찾아<br>
                                    프로젝트를 진행할 수 있었습니다.</p>
                            </div>
                        </article>
                    </div>
                    <!-- Blog Post -->
                    <div class="col-md-4 no-padding">
                        <article> <img class="img-responsive post_img00" src="images/m_pho02.png" alt="" >
                            <!-- Detail -->
                            <div class="post-detail"> <h8 class="post-tittle">펠리체 송영종 대표님</h8> <span><img src="images/m_pho02_txt.png"></span>
                                <p>업종/분야별 전문 대행사들이 실제로 진행한<br>
                                    프로젝트 포트폴리오와 객관적인 고객들의 평가를 통해서<br>
                                    실력있는 대행사를 찾을 수 있어 너무 좋았습니다.</p>
                            </div>
                        </article>
                    </div>
                    <!-- Blog Post -->
                    <div class="col-md-4 no-padding">
                        <article> <img class="img-responsive post_img00" src="images/m_pho03.png" alt="" >

                            <!-- Detail -->
                            <div class="post-detail"> <h8 class="post-tittle">솔가 마케팅담당 김서영님</h8> <span><img src="images/m_pho03_txt.png"></span>
                                <p>프로젝트 계약부터 대금보호, 분쟁조정, 대금지금까지<br>
                                    클라우드엠 프로젝트 매니저가 꼼꼼하게 일을 처리해주어서<br>
                                    프로젝트에만 집중해서 좋은 결과를 낼 수 있었습니다.</p>
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
