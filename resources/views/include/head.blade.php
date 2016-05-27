<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">
    <title>클라우드엠</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ionicons.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,800,200,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600italic,400italic,300,300italic,600,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400italic,400,700' rel='stylesheet'
          type='text/css'>

    <!-- COLORS -->
    <link rel="stylesheet" id="color" href="../css/colors/default.css">

    <!-- JavaScripts -->
    <script src="../js/modernizr.js"></script>
    <script src="/js/jquery-1.11.0.min.js"></script>
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

                        <li class="notice-li"><p><i class="fa fa-bell"></i></p></li>
                        <li class="notice-li notice-li-txt "><p id="noti">dsdf</p></li>
                        <li class="notice-li">
                            <i class="fa fa-chevron-left"></i>
                            <i class="fa fa-chevron-right"></i>
                        </li>


                    </ul>

                    <!-- Right Sec -->
                    <div class="right-sec">
                        <!-- social -->
                        <ul class="social">
                            <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#."><i class="fa fa-google"></i></a></li>
                            <li><a href="#."><i class="fa fa-linkedin"></i></a></li>
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
                                                                    src="{{ URL::asset('images/logo02.png') }}"></a>
                    </div>

                    <!-- Nav -->
                    <ul class="nav ownmenu">
                        <?php


                        if (!Auth::check()) {
                            echo "<li><a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#loginModal\" >프로젝트 등록</a></li>";
                        } else if (Auth::user()->PorC == "C") {
                            echo "<li><a style = \"cursor : pointer\" href=" . url('p_add/1') . ">프로젝트 등록</a></li>";
                        }
                        ?>
                        <li><a href="{{ url('p_search') }}">프로젝트 검색</a></li>
                        <li><a href="{{ url('partner') }}">파트너 목록</a></li>
                        <li><a href="{{ url('services') }}">이용방법</a></li>


                    </ul>


                    <!-- Search -->
                    <div class="search-icon">
                        <?php
                        if (Auth::check()) {
                            echo "<a href=" . url("/mypage") . " class=\"button signin\">내 정보</a>";
                            echo "<a href=" . url("/logout") . " class=\"button signup\">로그아웃</a>";

                        } else {
                            echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#loginModal\" class=\"button signin\">로그인</a>";
                            echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#signinModal\" class=\"button signup\">회원가입</a>";
                        }

                        ?>

                    </div>
                </div>
            </div>
        </nav>
        @if(Auth::check())
            <div class="my_bar">
                <ul>
                    <li><a href="{{ url("/dashboard") }}">대시보드</a></li>
                    <li><a href="{{ url("/mypage") }}">마이페이지</a></li>
                    <li><a href="{{ url("/setting") }}">기본정보</a></li>
                </ul>
            </div>

        @endif
    </header>
</div>


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">로그인</h4>
            </div>
            <div class="modal-body" style="padding:30px 100px 50px 100px;">

                <form role="form" method="POST" id="loginForm" action="/login">
                    {!! csrf_field() !!}
                    <div class="checkbox clip-check check-primary">
                        <input type="checkbox" id="remember" value="1">
                        <label for="remember"> 아이디 저장 </label>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" placeholder="이메일" value="{{ old('email') }}">
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" placeholder="비밀번호">
					<span id="passError" class="help-block">
						<strong id="error"></strong>
					</span>
                    </div>

                    <div class="text-left">
                        <a href="login_forgot.html"> 비밀번호를 잃어버리셨나요? </a><br>
                        <a href="login_registration.html"> 간단 회원가입하기 </a>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-red btn-block">
                            로그인
                        </button>
                    </div>

                </form>
                <div class="form-actions">
                    <button type="button" class="btn btn-red btn-block">
                        페이스북으로 로그인
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="modal-title" id="myModalLabel">회원가입</span>
            </div>
            <div class="modal-body loginmodal-container" style="padding:30px 100px 30px 100px;">

                <form role="form" method="POST" id="signupForm" action="/register">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('ClientPartners') ? ' has-error' : '' }}">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" name="paymentMethod" id="option1" autocomplete="off" value="ccc">
                                <i class="fa fa-cc-visa"></i> 클라이언트 </label>

                            <label class="btn btn-primary">
                                <input type="radio" name="paymentMethod" id="option2" autocomplete="off" value="ppp">
                                <i class="fa fa-cc-paypal"></i> 파트너스 </label>
                        </div>
                        <div id="PorCError"></div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" placeholder="이메일" value="{{ old('email') }}">
                        <div id="emailError"></div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" placeholder="비밀번호">
                        <div id="passwordError"></div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" name="password_confirmation" placeholder="비밀번호 재입력">
                        <div id="passwordconfirmError"></div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" placeholder="이름" value="{{ old('name') }}">
                        <div id="nameError"></div>
                    </div>

                    <div class="checkbox clip-check check-primary">
                        <input type="checkbox" id="agree1" value="1">
                        <label for="agree1"> 이용약관 동의 </label><br>
                        <input type="checkbox" id="agree2" value="1">
                        <label for="agree2"> 개인정보수집 및 이용에 대한 안내 동의</label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-red btn-block">
                            가입하기
                        </button>
                    </div>

                </form>
                <div class="form-actions">
                    <img src="/images/btn_login_fb.png" width="250">
                </div>
            </div>


        </div>
    </div>
</div>


<script src="/js/signup.js"></script>


{{--<script>--}}
{{--var display_results = $("#noti");--}}

{{--var maxnumofNoti = Number(2);--}}
{{--var numofNoti = maxnumofNoti;--}}

{{--function executeNoti() {--}}
{{--$.ajax({--}}
{{--url: "/notification/" + numofNoti,--}}
{{--success: function (result) {--}}
{{--display_results.html(result);--}}

{{--numofNoti -= 1;--}}
{{--if (numofNoti < 1) {--}}
{{--numofNoti = maxnumofNoti;--}}
{{--}--}}
{{--}--}}
{{--});--}}
{{--}--}}

{{--$(document).ready(function () {--}}
{{--executeNoti();--}}

{{--setInterval(executeNoti, 4000);--}}

{{--});--}}

{{--</script>--}}


@yield('content')