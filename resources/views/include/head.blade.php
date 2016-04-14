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

<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Raleway:400,600,800,200,500' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600italic,400italic,300,300italic,600,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400italic,400,700' rel='stylesheet' type='text/css'>

<!-- COLORS -->
<link rel="stylesheet" id="color" href="../css/colors/default.css">

<!-- JavaScripts -->
<script src="../js/modernizr.js"></script>
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
              <p><i class="fa fa-phone"></i> 1661-8863</p>
            </li>
            <li>
              <p>Hi! Here comes custom txt line </p>
            </li>
            <li>
              <p>help@gmlab.kr</p>
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
          <div class="logo"> <a href="/"><img  class="img-responsive" src="images/logo02.png" alt="" ></a> </div>
          
          <!-- Nav -->
          <ul class="nav ownmenu">
            <li> <a href="{{ url('p_add/1') }}">프로젝트 등록</a></li>
            <li> <a href="{{ url('p_search') }}">프로젝트 검색</a> </li>
            <li> <a href="{{ url('partner') }}">파트너 목록</a></li>
            <li> <a href="{{ url('services') }}">이용방법</a></li>
          </ul>
			
		  
          <!-- Search -->
          <div class="search-icon"> 
			 <a href="{{ url("/login") }}" class="button signin">로그인</a>
			 <a href="signup.php" class="button signup">회원가입</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  @yield('content')