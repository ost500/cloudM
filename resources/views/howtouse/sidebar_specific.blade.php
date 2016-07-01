@extends('include.head')
@section('content')
        <!-- Content -->
<div id="content">

    <!-- Revenues -->
    <section class="revenues padding-top-15 padding-bottom-70">
        <div class="container">



            <!-- coupen -->
            <div class="coupen">
                <p> 마케팅 중개 플랫폼 <span>패스트엠 이용방법</span>을 안내해드립니다.</p>
            </div>

            <div class="row">
                <!-- Revenues Sidebar -->
                <div class="col-md-3">
                    <div class="job-sider-bar02">
                        <div class="side-bar-revenues">

                            <!-- Key Financials -->
                            <h6 id="first"style="cursor:pointer" class="head"><a aria-expanded="false"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;서비스소개</a></h6>

                            <!-- Key Financials -->
                            <h6 id="second"style="cursor:pointer" class="head"><a aria-expanded="false"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;광고주 이용방법</a></h6>
                            {{--AJAX 사용할 때 href를 넣으면 안된다--}}
                                    <!-- Media Relations -->
                            <h6 id="third"style="cursor:pointer" class="head"><a aria-expanded="false"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;파트너 이용방법</a></h6>

                            <!-- Key Financials -->
                            <h6 id="fourth" style="cursor:pointer"class="head"><a aria-expanded="false"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;이용요금</a></h6>


                            <!-- Key Financials -->
                            <h6 id="fifth"style="cursor:pointer" class="head la_line"><a aria-expanded="false"><i
                                            class="fa fa-angle-double-right "></i> &nbsp;자주 묻는 질문</a></h6>


                        </div>
                    </div>
                </div>

                <div id="story"></div>


            </div>
        </div>
    </section>
</div>
<script type="text/javascript">

    var currentpage = "serviceintro";
    var currentbutton = 1;

    $(function () {

            currentbutton = "{{ $number }}";
            if ("{{$number}}" == "1") {
                currentpage = "client-use";
            } else if ("{{$number}}" == "2") {
                currentpage = "client-use";
            } else if ("{{$number}}" == "3") {
                currentpage = "partner-use";
            } else if ("{{$number}}" == "4") {
                currentpage = "charge";
            } else if ("{{$number}}" == "5") {
                currentpage = "faq";
            }
        
        viewLoad();
        clickfocus();
    });

    function clickfocus() {
        if ($("#first").hasClass('head_on'))
            $("#first").removeClass('head_on').addClass('head');
        if ($("#second").hasClass('head_on'))
            $("#second").removeClass('head_on').addClass('head');
        if ($("#third").hasClass('head_on'))
            $("#third").removeClass('head_on').addClass('head');
        if ($("#fourth").hasClass('head_on'))
            $("#fourth").removeClass('head_on').addClass('head');
        if ($("#fifth").hasClass('head_on'))
            $("#fifth").removeClass('head_on').addClass('head');

        if (currentbutton == 1) {
            $("#first").removeClass('head').addClass('head_on');
        }
        else if (currentbutton == 2) {
            $("#second").removeClass('head').addClass('head_on');
        }
        else if (currentbutton == 3){
            $("#third").removeClass('head').addClass('head_on');
        }
        else if (currentbutton == 4){
            $("#fourth").removeClass('head').addClass('head_on');
        }
        else if (currentbutton == 5){
            $("#fifth").removeClass('head').addClass('head_on');
        }
    }

    function viewLoad() {
        var display_results = $("#story");
        display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");
        $.ajaxSetup({cache: false});

        $.ajax({
            url: "/"+currentpage,
            success: function (result, b) {
                display_results.html(result, b);
            }

        });
    }
    $("#first").click(function () {
        currentpage = "serviceintro";
        currentbutton = 1;
        viewLoad();
        clickfocus();
    });
    $("#second").click(function () {
        currentpage = "client-use";
        currentbutton = 2;
        viewLoad();
        clickfocus();
    });
    $("#third").click(function () {
        currentpage = "partner-use";
        viewLoad();
        currentbutton = 3;
        clickfocus();
    });
    $("#fourth").click(function () {
        currentpage = "charge";
        viewLoad();
        currentbutton = 4;
        clickfocus();
    });
    $("#fifth").click(function () {
        currentpage = "faq";
        viewLoad();
        currentbutton = 5;
        clickfocus();
    });

</script>
{{--endsection 뒤에 있으면 안됨--}}
@include('include.footer')
@endsection
