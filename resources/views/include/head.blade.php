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

                        <li>
                            <p><i class="fa fa-bell"></i>
                                <span id="noti"></span>
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <i class="fa fa-chevron-right" aria-hidden="true"></i></p>

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
                            echo "<li><a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#login-modal\" >프로젝트 등록</a></li>";
                        }
                        else if (Auth::user()->PorC == "C") {
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
                            echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#login-modal\" class=\"button signin\">로그인</a>";
                            echo "<a style = \"cursor : pointer\" data-toggle=\"modal\" data-target=\"#signup-modal\" class=\"button signup\">회원가입</a>";
                        }

                        ?>


                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

<div class="modal" id="login-modal" tabindex="-1"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>로그인</h1><br>

            <form role="form" method="POST" id="loginForm" action="/login">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" placeholder="이메일" value="{{ old('email') }}">

                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" placeholder="비밀번호">
                    <span id="passError" class="help-block">
                        <strong id="error"></strong>
                    </span>

                </div>
                <input type="checkbox" name="remember"> 아이디 저장
                <input type="submit" name="login" class="login loginmodal-submit" value="로그인">
            </form>

            <div class="login-help">
                <a href="#">가입하기</a> - <a href="#">비밀번호 찾기</a>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="signup-modal" tabindex="-1"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>회원가입</h1><br>


            <form role="form" method="POST" id="signupForm" action="/register">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('ClientPartners') ? ' has-error' : '' }}">

                    <label for="ccc" class="label_n"><input name="PorC" id="ccc"
                                                            type="radio"
                                                            value="ccc">클라이언트</label>
                    <label for="ppp" class="label_n"><input name="PorC" id="ppp"
                                                            type="radio"
                                                            value="ppp">파트너스</label>
                    <div id="PorCError"></div>


                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <input type="text" name="name" placeholder="이름"
                           value="{{ old('name') }}">
                    <div id="nameError"></div>

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

                    <input type="password" name="password_confirmation"
                           placeholder="비밀번호 재입력">

                    <div id="passwordconfirmError"></div>
                </div>
                <strong id="errorSignup"></strong>
                <input type="submit" name="login" class="login loginmodal-submit" value="회원가입">
            </form>


        </div>
    </div>
</div>

<script src="js/signup.js"></script>


<script>
    var display_results = $("#noti");

    var maxnumofNoti = Number(2);
    var numofNoti = maxnumofNoti;

    function executeNoti() {
        $.ajax({
            url: "notification/" + numofNoti,
            success: function (result) {
                display_results.html(result);

                numofNoti -= 1;
                if (numofNoti < 1) {
                    numofNoti = maxnumofNoti;
                }
            }
        });
    }

    $(document).ready(function () {
        executeNoti();

        setInterval(executeNoti, 4000);

    });

</script>


@yield('content')