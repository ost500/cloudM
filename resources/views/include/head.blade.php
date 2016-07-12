<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">

    <meta property="og:type" content="website">
    <meta property="og:title" content="패스트엠 (Fastm)">
    <meta property="og:image" content="http://fastm.app/images/preview.png">
    <meta property="og:description" content="마케팅 중개 플랫폼, 패스트엠에 오신 것을 환영합니다. 믿을 수 있는 광고대행사와 기업을 연결 해 드립니다.">

    <title>패스트엠::마케팅 중개 플랫폼</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/multiple-select.css') }}" rel="stylesheet">

    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,800,200,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600italic,400italic,300,300italic,600,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400italic,400,700' rel='stylesheet'
          type='text/css'>

    <!-- COLORS -->
    <link rel="stylesheet" id="color" href="{{ asset('css/colors/default.css') }}">

    <!-- JavaScripts -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Wrap -->
<div id="wrap">

    <!-- header -->
    <header>

        <!-- Top bar -->
        <div class="top-bar">
            <div class="top-info">
                <div class="container">
                    <ul class="personal-info">

                        <li class="notice-li ring"><p><i class="fa fa-bell"></i></p></li>
                        <li class="notice-li notice-li-txt "><p id="noti"></p></li>
                        <li class="notice-li">
                            <a style="cursor:pointer;" id="left_btn" class="white-text"><i
                                        class="fa fa-chevron-left"></i></a>
                            <a style="cursor:pointer;" id="right_btn" class="white-text"><i
                                        class="fa fa-chevron-right"></i></a>
                        </li>


                    </ul>

                    <!-- Right Sec -->
                    <div class="right-sec">
                        <!-- social -->
                        <ul class="social">
                            {{--<li><a href="#."><i class="fa fa-facebook"></i></a></li>--}}
                            {{--<li><a href="#."><i class="fa fa-twitter"></i></a></li>--}}
                            {{--<li><a href="#."><i class="fa fa-google"></i></a></li>--}}
                            {{--<li><a href="#."><i class="fa fa-linkedin"></i></a></li>--}}
                            <li><a href="http://blog.fastm.io"><i class="fa fa-bold"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Navigation -->
        <nav class="navbar">
            <div class="sticky">
                <div class="container">

                    <!-- LOGO -->
                    <div class="logo"><a href="{{ url("/") }}"><img class="img-responsive"
                                                                    src="{{ URL::asset('images/logo02.png') }}"
                                                                    width="144"></a>
                    </div>

                    <!-- Nav -->
                    <ul class="nav ownmenu">
                        <?php


                        if (!Auth::check()) {
                            echo "<li><a href=".url('/login')." >프로젝트 등록</a></li>";
                        } else if (Auth::user()->PorC == "C") {
                            echo "<li><a style = \"cursor : pointer\" href=" . url('p_add/1') . ">프로젝트 등록</a></li>";
                        }
                        ?>
                        <li><a href="{{ url('project') }}">프로젝트 검색</a></li>
                        <li><a href="{{ url('partner') }}">파트너 목록</a></li>

                        <li><a href="{{ url('customer/notification') }}">고객센터</a></li>
                        <li><a href="{{ url('services') }}">이용안내</a></li>


                    </ul>


                    <!-- Search -->
                    <div class="search-icon">
                        <?php
                        if (Auth::check()) {
                            echo "<a href=" . url("/setting/profile") . " class=\"button signin\">내 정보</a>";
                            echo "<a href=" . url("/logout") . " class=\"button signup\">로그아웃</a>";

                        } else {
                            echo "<a href=" . url("/login") . " class=\"button signin\">로그인</a>";
                            echo "<a href=\"".url("/register")." \" class=\"button signup\">회원가입</a>";
                        }

                        ?>

                    </div>
                </div>
            </div>
        </nav>
        @if(Auth::check())
            <div class="my_bar">
                <ul>

                    @if(Auth::user()->PorC == "P")
                        <li><a href="{{ url("/profile") }}">프로필</a></li>
                        <li><a href="{{ url("/dashboard") }}">프로젝트 관리</a></li>
                        <li><a href="{{ url("/partner/project/apply") }}">지원한 프로젝트</a></li>
                        <li><a href="{{ url("/partner/project/carryon") }}">진행중 프로젝트</a></li>
                        <li><a href="{{ url("/partner/project/done") }}">완료된 프로젝트</a></li>
                    @else
                        <li><a href="{{ url("/dashboard") }}">프로젝트 관리</a></li>
                        <li><a href="{{ url("/client/project/checking") }}">검수중 프로젝트</a></li>
                        <li><a href="{{ url("/client/project/posted") }}">등록 프로젝트</a></li>
                        <li><a href="{{ url("/client/project/carryon") }}">진행중 프로젝트</a></li>
                        <li><a href="{{ url("/client/project/done") }}">완료된 프로젝트</a></li>
                    @endif

                </ul>
            </div>

        @endif
    </header>
</div>


<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">제안서/견적서</h4>
            </div>
            <div class="modal-body" style="padding:30px 100px 50px 100px;">

                <form role="form" method="POST" id="fileForm" action="/apply/attach_update"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="app_id" value="">

                    <div class="form-group">
                        <input type="file" name="application_attach" class="form-control" placeholder="첨부파일"
                               required="required">
                    </div>


                    <div class="text-left">10MB까지 zip파일만 업로드 가능합니다</div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-red btn-block">
                            제출하기
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<script src="{{ asset('js/signup.js') }}"></script>


<script>
    var display_results = $("#noti");

    var Noti = [];
    var index = -1;


    function executeNoti() {
        $.ajax({
            url: "/notification/",
            success: function (result) {
                Noti = result.split("/");
                console.log(Noti);
                show_noti();

                setInterval(show_noti, 4000);
            }
        });
    }
    function show_noti() {
        index = index + 1;
        if (index >= Noti.length - 1) {
            index = 0;
        }

        display_results.html(Noti[index]);

    }
    $("#left_btn").click(function () {
        index = index - 1;
        if (index < 1) {
            index = Noti.length - 2;
        }

        display_results.html(Noti[index]);
    });
    $("#right_btn").click(function () {
        index = index + 1;
        if (index >= Noti.length - 1) {
            index = 0;
        }

        display_results.html(Noti[index]);
    });

    $(document).ready(function () {
        executeNoti();

    });

</script>


@yield('content')