@extends('include.head')
@section('content')
        <!-- HOME MAIN SLIDER -->
<section class="home-slide">
    <ul class="slides">

        <!-- SLIDER 1 -->
        <li class="slide-img-1" data-stellar-background-ratio="0.6">
            <div class="position-center-center">


               <p class="main_banner_2">마케팅 중계 플랫폼, 클라우드엠에 오신 것을 환영합니다.</p>
			   <p class="main_banner_3"></p><p class="b_txt01">믿을 수 있는 광고대행사와 기업을 연결 해 드립니다. 지금 프로젝트를 등록하세요.</p>


            <?php
            if (!Auth::check()) {
                echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#login-modal\" class=\"btn_main\">무료로 프로젝트 등록하기<i class=\"fa fa-caret-right\"></i></a>";

            } else if (Auth::user()->PorC == "C") {
                echo "<a style = \"cursor : pointer\" href= \"" . url('p_add/1') . "\" class=\"btn_main\">무료로 프로젝트 등록하기<i class=\"fa fa-caret-right\"></i></a>";
            } else {
                echo "<a style = \"cursor : pointer\" class=\"btn_main\">무료로 프로젝트 등록하기<i class=\"fa fa-caret-right\"></i></a>";
            }
            ?>
            </div>
        </li>
        </li>
    </ul>
</section>
<section class="counter">
    <div class="container">

        <!-- Team Member -->
        <ul class="row">
            <li class="col-md-3">
                <div class="count">
				<span class="number">
					<i class="fa fa-file-powerpoint-o" aria-hidden="true" style="color:#333; font-size:25px;"></i>
					<span class="timer" data-speed="2000" data-refresh-interval="10" data-to="16812" data-from="0">16,812</span>
				</span>
                    <span style="font-size:16px;" class="b">건</span>
                    <h6 class="h6_txt">등록된 프로젝트</h6>
                </div>
            </li>

            <!-- Line Of Codes -->
            <li class="col-md-6">
                <div class="count">
				<span class="number">
					<i class="fa fa-check-square-o" aria-hidden="true" style="color:#333; font-size:25px;"></i>
					<span class="timer" data-speed="2000" data-refresh-interval="10" data-to="4820012302" data-from="0">4,820,012,302</span>
				</span>
                    <span style="font-size:16px;" class="b">원</span>
                    <h6 class="h6_txt">프로젝트 등록금액</h6>
                </div>
            </li>
            <!-- 변경끝------------------------------------------------------------------------------- -->




            <!-- Satisfied Client -->
            <li class="col-md-3">
                <div class="count">
				<span class="number">
					<i class="fa fa-smile-o" aria-hidden="true" style="color:#333; font-size:25px;"></i>
					<span class="timer" data-speed="2000" data-refresh-interval="10" data-to="92" data-from="0">92</span>
				</span>
                    <span style="font-size:16px;" class="b">명</span>
                    <h6 class="h6_txt">대행사 &amp; 프리랜서</h6>
                </div>
            </li>
        </ul>
    </div>
</section>


<!-- Content -->
<div id="content">

    <!-- SERVICES -->
    <section class="light-gray-bg services padding-top-40 padding-bottom-30">
        <div class="container">
            <!-- Heading -->
            <div class="heading text-center">
                <h4>프로세스</h4>
            </div>
        </div>

        <div class="best-services">
            <!-- Row -->
            <div class="container">
                <ul class="row list">
                    <li class="col-md-4">
                        <article class="thumb">
                            <a href="#"><h5>현대글로비스 공식 블로그 관리</h5></a>
                            <p class="price">\ 48,000,000 | 1년 | 21명 지원</p>

                            <p>현대글로비스 공식 블로그 연간 관리 대행사를 찾습니다. 연간 기획 및 운영 기획안을 포함한 제안서를 제출 하시면 내부검토후 1차 합격자만...</p>

                            <div id="tag">
                                <div class="button">blog</div>
                                <div class="button">페이스북</div>
                                <div class="button">홈페이지</div>
                            </div>
                            </a>
                        </article>
                    </li>

                    <li class="col-md-4">
                        <article class="thumb">
                            <a href="#"><h5>현대글로비스 공식 블로그 관리</h5></a>
                            <p class="price">\ 48,000,000 | 1년 | 21명 지원</p>

                            <p>현대글로비스 공식 블로그 연간 관리 대행사를 찾습니다. 연간 기획 및 운영 기획안을 포함한 제안서를 제출 하시면 내부검토후 1차 합격자만...</p>

                            <div id="tag">
                                <div class="button">blog</div>
                                <div class="button">페이스북</div>
                                <div class="button">홈페이지</div>
                            </div>
                            </a>
                        </article>
                    </li>

                    <li class="col-md-4">
                        <article class="thumb">
                            <a href="#"><h5>현대글로비스 공식 블로그 관리</h5></a>
                            <p class="price">\ 48,000,000 | 1년 | 21명 지원</p>

                            <p>현대글로비스 공식 블로그 연간 관리 대행사를 찾습니다. 연간 기획 및 운영 기획안을 포함한 제안서를 제출 하시면 내부검토후 1차 합격자만...</p>

                            <div id="tag">
                                <div class="button">blog</div>
                                <div class="button">페이스북</div>
                                <div class="button">홈페이지</div>
                            </div>
                            </a>
                        </article>
                    </li>

                    <li class="col-md-4">
                        <article class="thumb">
                            <a href="#"><h5>현대글로비스 공식 블로그 관리</h5></a>
                            <p class="price">\ 48,000,000 | 1년 | 21명 지원</p>

                            <p>현대글로비스 공식 블로그 연간 관리 대행사를 찾습니다. 연간 기획 및 운영 기획안을 포함한 제안서를 제출 하시면 내부검토후 1차 합격자만...</p>

                            <div id="tag">
                                <div class="button">blog</div>
                                <div class="button">페이스북</div>
                                <div class="button">홈페이지</div>
                            </div>
                            </a>
                        </article>
                    </li>

                    <li class="col-md-4">
                        <article class="thumb">
                            <a href="#"><h5>현대글로비스 공식 블로그 관리</h5></a>
                            <p class="price">\ 48,000,000 | 1년 | 21명 지원</p>

                            <p>현대글로비스 공식 블로그 연간 관리 대행사를 찾습니다. 연간 기획 및 운영 기획안을 포함한 제안서를 제출 하시면 내부검토후 1차 합격자만...</p>

                            <div id="tag">
                                <div class="button">blog</div>
                                <div class="button">페이스북</div>
                                <div class="button">홈페이지</div>
                            </div>
                            </a>
                        </article>
                    </li>

                    <li class="col-md-4">
                        <article class="thumb">
                            <a href="#"><h5>현대글로비스 공식 블로그 관리</h5></a>
                            <p class="price">\ 48,000,000 | 1년 | 21명 지원</p>

                            <p>현대글로비스 공식 블로그 연간 관리 대행사를 찾습니다. 연간 기획 및 운영 기획안을 포함한 제안서를 제출 하시면 내부검토후 1차 합격자만...</p>

                            <div id="tag">
                                <div class="button">blog</div>
                                <div class="button">페이스북</div>
                                <div class="button">홈페이지</div>
                            </div>
                            </a>
                        </article>
                    </li>
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
            <div style="text-align:center;">
                <p>광고 캠페인/영상/홈페이지/콘텐츠 제작 등 프로젝트를 찾고 있는 대행사/프리랜서인가요? <a href="#." class="btn_main btn_main-1"
                                                                       style="margin-left:30px;">회원가입하기<i
                                class="fa fa-caret-right"></i></a></p>
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
                                        <p>에스크로 시스템을 통한 안전하게 대금을 보관하며, 진행하는 광고 캠페인 및 프로젝트가 정확히 마무리 되었을때만 비용을 지급합니다.</p>
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
            <div style="text-align:center;">
                <p>지금 준비중인 광고 캠페인이나 영상/디자인/홈페이지/콘텐츠 제작 프로젝트를 등록해 보세요. <a href="#." class="btn_main btn_main-1"
                                                                         style="margin-left:30px;">프로젝트 등록하기<i
                                class="fa fa-caret-right"></i></a></p>
            </div>
        </div>
    </section>


    <section class="white-bg blog padding-top-30 padding-bottom-30">
        <div class="container">
            <!-- Heading -->
            <div class="heading text-center">
                <h4>광고주들이 얘기하는 클라우드엠</h4>
            </div>
            <!-- Blog Row -->
            <div class="row">
                <!-- Blog Post -->
                <div class="col-md-4 no-padding">
                    <article><img class="img-responsive" src="images/m_pho01.png" alt="">


                        <!-- Detail -->
                        <div class="post-detail"><a href="#." class="post-tittle">April stats Details</a> <span>By Admin  /  2 Comments</span>
                            <p>Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere
                                libero dui id orci. Nam congue, pede vitae dapibus aliquet.</p>
                        </div>
                    </article>
                </div>
                <!-- Blog Post -->
                <div class="col-md-4 no-padding">
                    <article><img class="img-responsive" src="images/m_pho02.png" alt="">
                        <!-- Detail -->
                        <div class="post-detail"><a href="#." class="post-tittle">EU LAWs vs US Laws</a> <span>By Admin  /  2 Comments</span>
                            <p>Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere
                                libero dui id orci. Nam congue, pede vitae dapibus aliquet.</p>
                        </div>
                    </article>
                </div>
                <!-- Blog Post -->
                <div class="col-md-4 no-padding">
                    <article><img class="img-responsive" src="images/m_pho03.png" alt="">

                        <!-- Detail -->
                        <div class="post-detail"><a href="#." class="post-tittle">Team Expanded</a> <span>By Admin  /  2 Comments</span>
                            <p>Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere
                                libero dui id orci. Nam congue, pede vitae dapibus aliquet.</p>
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
                <h4>클라우드엠 협력업체</h4>
                <span>법률조언, 분쟁중재 등 광고 프로젝트을 진행하며 발생 할 수 있는 수많은 변수들을 대비했습니다.</span>
            </div>

            <!-- Clients -->
            <div>
                <div class="item">
                    <ul class="row col-4">
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family2.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                    </ul>
                </div>
            </div>


            <!-- Heading -->
            <div class="heading text-center padding-top-70">
                <h4>클라우드엠 클라이언트</h4>
            </div>

            <!-- Clients -->
            <div>
                <div class="item">
                    <ul class="row col-6">
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family2.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                    </ul>

                    <ul class="row col-6">
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family2.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                    </ul>

                    <ul class="row col-6">
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family2.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                    </ul>

                    <ul class="row col-6">
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family2.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                        <li><img class="img-responsive" src="images/client/family1.jpg" alt=""></li>
                    </ul>
                </div>
            </div>


        </div>
    </section>
</div>
@include('include.footer')
@endsection
