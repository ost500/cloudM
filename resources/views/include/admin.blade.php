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

                                <a href="{{url('customer_centre/notification')}}" aria-expanded="false" id="first" class="head"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;공지사항</a>


                                <a aria-expanded="false" id="second" class="head"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;일대일 문의</a>

                                <a href="{{url('password/reset')}}" aria-expanded="false" id="third" class="head"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;비밀번호 찾기</a>

                            </div>
                        </div>
                    </div>

                    @yield('customer_centre')

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

            @if(starts_with(Route::getCurrentRoute()->getPath(), 'customer_centre/notification'))
            $("#first").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'customer_centre/man_to_man'))
                $("#second").addClass("on");
            @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'password/reset'))
                $("#third").addClass("on");
            @endif
        });
    </script>

@include('include.footer')
@endsection

