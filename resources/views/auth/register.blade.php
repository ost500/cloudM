@extends('include.head')
@section('content')

    <div id="content">
        <div class="container">

            <div class="coupen">
                <p class="h3 text-bold">회원가입</p>
                <p class="padding-top-10"> 마케팅 플랫폼 <span>패스트엠</span>에 오신것을 환영합니다.</p>
            </div>

            <div class="row margin-top-15">

                <!-- Revenues Sidebar -->
                <div class="col-md-8">
                    <div class="job-content job-post-page register_box">
                        <div class="panel-body padding-30">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="email" value="">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 회원타입 </label>
                                    <div class="col-sm-7">

                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="PorC" id="option1" autocomplete="off"
                                                       value="ccc" checked>
                                                광고주 </label>

                                            <label class="btn btn-primary">
                                                <input type="radio" name="PorC" id="option2" autocomplete="off"
                                                       value="ppp">
                                                대행사 </label>
                                        </div>

                                        @if ($errors->has('PorC'))
                                            <span class="help-block">
                                            <p class="validation-error">{{ $errors->first('PorC') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 이름 </label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" name="name" required="required"
                                               value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <p class="validation-error">{{ $errors->first('name') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 이메일 </label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" name="email" required="required"
                                               value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <p class="validation-error">{{ $errors->first('email') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 비밀번호 </label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="password" name="password" required="required">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <p class="validation-error">{{ $errors->first('password') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                class="symbol required"></span> 비밀번호 확인 </label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="password" name="password_confirmation"
                                               required="required">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                            <p class="validation-error">{{ $errors->first('password_confirmation') }}</p>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group padding-top-15">
                                    <label class="col-sm-3 control-label" for="inputEmail3"></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" name="checkbox1" id="checkbox1" value="option1"
                                               checked="" required="required">
                                        <label for="checkbox1"><a href="{{route('agreement')}}">이용약관</a> 및 <a
                                                    href="{{route('personal_info')}}">개인정보 보호방침</a>에
                                            동의합니다.</label>
                                    </div>
                                    <div class="col-sm-1" id="submit_loading"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail3"></label>
                                    <div class="col-sm-7">
                                        <div class="">
                                            <button id="register_submit" class="btn btn-app" type="submit">
                                                회원가입
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
                    <div class="job-content job-post-page register_box">
                        <div class="login_right">
                            <a style="cursor:pointer" id="facebook" class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 페이스북
                                회원가입</a>
                            <a id="naver" class="btn-naver btn-lg btn-block"><img style="height:25px"
                                                                                  src="{{asset("images/naver_login_icon.png")}}">
                                네이버 로그인</a>
                            <script>
                                $("#facebook").click(function () {
                                    if ($("#option1").is(":checked")) {
                                        if(confirm("광고주로 가입 하시겠습니까?")){
                                            window.location.replace("{{url('/fbauth?PorC=C')}}");
                                        }
                                    } else {
                                        if(confirm("대행사로 가입 하시겠습니까?")){
                                            window.location.replace("{{url('/fbauth?PorC=P')}}");
                                        }
                                    }
                                });
                                $("#naver").click(function () {
                                    alert('준비 중입니다')
                                });
                            </script>
                            <p class="redirect01">이미 회원이신가요? <a
                                        href="{{ url('/login') }}"><br><strong>로그인</strong></a></p>
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
        $(function () {
            $('input:radio[name=ClientPartners]')[0].checked = true;
        });

    </script>

    <script>
        var submit_loading = $("#submit_loading");
        $("#register_submit").click(function () {
            submit_loading.html("<img src=images/ajax-loader.gif>");
        });

    </script>

    @include('include.footer')
@endsection