@extends('include.head')
@section('content')
        <!-- Content -->
<div id="content">

    <!-- Revenues -->
    <section class="revenues padding-top-15 padding-bottom-70">
        <div class="container">

            <div class="row">
                <!-- Revenues Sidebar -->
                <div class="col-md-3">
                    <div class="job-sider-bar02">
                        <div class="side-bar-revenues">

                            <!-- Key Financials -->
                            <a aria-expanded="false" id="first" class="head"><i
                                        class="fa fa-angle-double-right "></i> &nbsp;서비스소개</a>

                            <a aria-expanded="false" id="second" class="head"><i
                                        class="fa fa-angle-double-right "></i> &nbsp;광고주 이용방법</a>

                            <a aria-expanded="false" id="third" class="head"><i
                                        class="fa fa-angle-double-right "></i> &nbsp;파트너 이용방법</a>

                            <a aria-expanded="false" id="fourth" class="head"><i
                                        class="fa fa-angle-double-right "></i> &nbsp;이용요금</a>

                            <a aria-expanded="false" id="fifth" class="head"><i
                                        class="fa fa-angle-double-right "></i> &nbsp;자주 묻는 질문</a>


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

        if (currentbutton == 1) {
            $("#first").addClass('on');;
        }
        else if (currentbutton == 2) {
            $("#second").addClass('on');;
        }
        else if (currentbutton == 3){
            $("#third").addClass('on');;
        }
        else if (currentbutton == 4){
            $("#fourth").addClass('on');;
        }
        else if (currentbutton == 5){
            $("#fifth").addClass('on');;
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
