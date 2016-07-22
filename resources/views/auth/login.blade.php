@extends('include.head')
@section('content')

    <div class="content">
        <div class="container">

            <div class="coupen">
                <p class="h3 text-bold">로그인</p>
                <p class="padding-top-10"> 마케팅 플랫폼 <span>패스트엠</span>에 오신것을 환영합니다.</p>
            </div>

            <div class="login row margin-top-15 margin-bottom-30">

                <!-- Revenues Sidebar -->
                <div class="col-md-8">
                    <div class="job-content job-post-page ">
                        <div class="panel-body padding-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="email" value="">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 이메일 </label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="email" name="email" placeholder=""
                                               required="required">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <p class="validation-error">{{ $errors->first('email') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 비밀번호 </label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="password" name="password"
                                               placeholder="" required="required">
                                        </label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <p class="validation-error">{{ $errors->first('password') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15">
                                    <label class="col-sm-3 control-label" for="inputEmail3"></label>
                                    <div class="col-sm-4">
                                        아이디 저장 <input type="checkbox" name="remember">
                                    </div>
                                    <div class="col-sm-2" id="login_loading"></div>


                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail3"></label>
                                    <div class="col-sm-7">
                                        <div class="">
                                            <button id="login_submit" class="btn btn-app" type="submit">
                                                로그인
                                            </button>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group padding-top-15">
                                    <label class="col-sm-3 control-label" for="inputEmail3"></label>
                                    <div class="col-sm-7">
                                        비밀번호 기억이 안나면? <a href="/password/reset"><span>비밀번호 찾기</span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Stories -->
                <div class="col-md-4">
                    <div class="job-content job-post-page padding-bottom-32">
                        <div class="login_right">
                            <a style="cursor:pointer" id="facebook" class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 페이스북
                                로그인</a>
                            <a style="cursor:pointer" id="naver" class="btn-naver btn-lg btn-block"><img style="height:25px"
                                                                                  src="{{asset("images/naver_login_icon.png")}}">
                                네이버 로그인</a>
                            <script>
                                $("#facebook").click(function () {
                                    window.location.replace("{{url('/fbauth')}}");
                                });
                                $("#naver").click(function () {
                                    window.location.replace("{{url('/auth/naver')}}");
                                });
                            </script>
                            <p class="redirect01">아직 회원이 아니신가요? <a
                                        href="{{ url('/register') }}"><br><strong>회원가입하기</strong></a></p>
                            <p class="redirect01">비밀번호를 잊으셨나요? <br/><a
                                        href="{{ url('/password/reset') }}"><strong>비밀번호 찾기</strong></a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var submit_loading = $("#login_loading");
        $("#login_submit").click(function () {
            submit_loading.html("<img src=images/ajax-loader.gif>");
        });

    </script>
    @include('include.footer')
@endsection

