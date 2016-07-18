@extends('include.head')
@section('content')


    <div id="content">

        <!-- Revenues -->
        <section class="revenues padding-top-15 padding-bottom-30">
            <div class="container">

                <div class="row">
                    <!-- Revenues Sidebar -->
                    <div class="col-md-3">
                        <div class="job-sider-bar02">
                            <div class="side-bar-revenues">

                                <a href="{{route('introduction')}}" aria-expanded="false" id="first" class="head"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;회사소개</a>
                                <a href="{{route('news')}}" aria-expanded="false" id="second" class="head"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;언론보도</a>
                            </div>
                        </div>
                    </div>

                    @yield('company')

                </div>
            </div>
        </section>
    </div>
    <script>
        $(function () {
            if ($("#first").hasClass('on'))
                $("#first").removeClass('on');
            if ($("#second").hasClass('on'))
                $("#second").removeClass('on');
            if ($("#third").hasClass('on'))
                $("#third").removeClass('on');
            if ($("#fourth").hasClass('on'))
                $("#fourth").removeClass('on');
            if ($("#fifth").hasClass('on'))
                $("#fifth").removeClass('on');
            if ($("#sixth").hasClass('on'))
                $("#sixth").removeClass('on');



            @if(starts_with(Route::getCurrentRoute()->getPath(), 'company/introduction'))
                $("#first").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'company/news'))
                $("#second").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'company/address'))
                $("#third").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'personal_info'))
                $("#fourth").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'customer/man_to_man'))
                $("#fifth").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'password/reset'))
                $("#sixth").addClass("on");
            @endif
        });
    </script>

@include('include.footer')
@endsection

