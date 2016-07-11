@include('include.head')
        <!-- Content -->
<div id="content">
    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-20">
        <div class="container">
            <!-- Side Bar -->
            <div class="row">
                <div class="col-md-3">
                    <div class="job-sider-bar003">
                        <h5 class="side-tittle">파트너스</h5>
                        <div class="col-md-12 text-center">
                            <img class="partner_profile_150" src="{{ URL::asset($partner['user']->profileImage) }}"><br>
                        </div>
                        <div class="col-md-12 padding-top-15">
                            <p class="side-title-name big"><h5 class="text-center">{{ $partner->user->nick }}</h5></p>
                        </div>
                    </div>

                    <div class="job-sider-bar02">
                        <div class="side-bar-revenues">
                            <a href="{{ url('partner') }}/{{ $partner['user']->id }}" class="head  {{ (Request::is('partner/'.$partner['user']->id))?"on":"" }}"><i
                                        class="fa fa-angle-double-right"></i> 전체보기</a>

                            <a href="{{ url('partner')}}/{{ $partner['user']->id }}/intro" class="head {{ (Request::is('partner/*/intro'))?"on":"" }}"><i
                                        class="fa fa-angle-double-right "></i> 자기소개</a>

                            <a href="{{ url('partner')}}/{{ $partner['user']->id }}/portfolio" class="head {{ (Request::is('partner/*/portfolio')) || (Request::is('partner/*/portfolio/*'))?"on":"" }}"><i
                                        class="fa fa-angle-double-right "></i> 포트폴리오</a>

                            <a href="{{ url('partner')}}/{{ $partner['user']->id }}/job" class="head {{ (Request::is('partner/*/job'))?"on":"" }}"><i
                                        class="fa fa-angle-double-right "></i> 전문분야</a>

                            <a href="{{ url('partner')}}/{{ $partner['user']->id }}/review" class="head {{ (Request::is('partner/*/review'))?"on":"" }}"><i
                                        class="fa fa-angle-double-right "></i> 클라이언트 평가</a>
                        </div>
                    </div>
                </div>


                <!-- Job  Content -->
                <div class="col-md-9 job-right">
                    @yield('right_content')
                </div>

            </div>
        </div>
    </section>
</div>
@include('include.footer')
