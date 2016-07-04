@extends('include.head')
@section('content')
        <!-- Content -->
<div id="content">

    <!-- Revenues -->
    <section class="check-out padding-top-15 padding-bottom-30">
        <div class="container">
            <!-- Heading -->
            <div class="heading text-left margin-bottom-20">
                <h4>로그인</h4>
            </div>

            <!-- coupen -->
            <div class="coupen">
                <p> 마케팅 플랫폼 <span>착한마케팅</span>에 오신것을 환영합니다.</p>
            </div>

            <!--div class="top_title">
                <h4>로그인</h4>
                <span>착한마케팅과 </span>
            </div-->


            <div class="row">

                <!-- Revenues Sidebar -->
                <div class="col-md-8">
                    <!-- Story -->
                    <div class="story">
                        <article>
                            <div class="login">

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>아이디 *
                                            <input class="form-control" type="email" name="email" placeholder="">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label>비밀번호 *
                                            <input class="form-control" type="password" name="password"
                                                   placeholder="">
                                        </label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn login_button margin-top-20">로그인<i
                                                    class="fa fa-caret-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </article>
                    </div>

                </div>

                <!-- Stories -->
                <div class="col-md-4">

                    <!-- Story -->
                    <div class="story">
                        <article>
                            <div class="login_right">
                                {{--<label>페이스북으로 로그인해보세요!--}}
                                    {{--<a class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 페이스북으로--}}
                                        {{--로그인</a>--}}
                                {{--</label>--}}
                                <p class="redirect01">아직 회원이 아니신가요? <a
                                            href="{{ url('/register') }}"><br><strong>회원가입하기</strong></a></p>
                                <p class="redirect01">아이디,비밀번호를 잊으셨나요? <br/><a
                                            href="{{ url('/password/reset') }}"><strong>아이디,비밀번호 찾기</strong></a>
                                </p>

                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@include('include.footer')
@endsection

