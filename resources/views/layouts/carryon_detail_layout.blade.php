@include('include.head')
    <div id="content">
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">
                <div class="coupen">
                    <p class="h3 text-bold"><span>{{ $project['title'] }}</span> 캠페인의 업무/계약 가이드</p>
                    <p class="padding-top-10">캠페인의 계약 사항과 업무 내용을 한눈에 살펴 볼 수 있도록, 정리해 두었습니다.</p>
                </div>

                <div class="row padding-top-15">
                    <div class="col-md-12">
                        <div id="accordion">
                            <div class="job-content job-post-page">

                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="port_guide img_f">
                                            <img src="/images/i_icon.png" style="margin-top:10px;">
                                            <div class="p_add_span padding-top-0 padding-left-60">
                                                <div class="content">안전한 대금 지급과 캠페인 진행을 위해서, 가능한 패스트엠 시스템을 이용하여 주시기 바랍니다.<br>기본적으로 대금 지급은 광고주 승인이후에 진행 됩니다.</div>
                                            </div>

                                            <div class="p_add_span">
                                                <p class="title">1. 광고주 지급승인시</p>
                                                <div class="content">광고주가 지급승인시 대행사에게 익일 오후 2시까지, 캠페인 대금을 지급합니다.</div>

                                                <p class="title">2. 지급시기가 지났는데 지급승인을 하지 않는 경우</p>
                                                <div class="content">패스트엠이 광고주와 통화 후 지급하며, 특별한 사유 없이 5일동안 승인이 없으면 임의 지급합니다.</div>

                                                <p class="title">3. 자료전달, 업무요청, 답변</p>
                                                <div class="content">분쟁 방지를 위하여 자료 전달, 업무요청, 답변 등은 캠페인 게시판을 이용하여 주시기 바랍니다.</div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="panel padding-top-20">
                                        <div class="tabbable">
                                            <ul id="myTab1" class="nav nav-tabs">
                                                <li class="">
                                                    <a href="#project_tab1" data-toggle="tab" aria-expanded="false"> 계약사항/업무가이드 </a>
                                                </li>
                                                <li class="">
                                                    <a href="#project_tab2" data-toggle="tab" aria-expanded="false"> 체크리스트 </a>
                                                </li>
                                                <li class="active">
                                                    <a href="#project_tab3" data-toggle="tab" aria-expanded="true"> 캠페인 게시판 </a>
                                                </li>
                                                <li class="">
                                                    <a href="#project_tab4" data-toggle="tab" aria-expanded="false"> 결제 정보 상세 </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content padding-top-20">
                                                @yield('right_content')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript" src="http://tectonic.kaijuthemes.com/assets/demo/demo-app-todo.js"></script>
@include('include.footer')