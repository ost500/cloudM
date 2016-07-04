@extends('include.head')
@section('content')


        <!-- Content -->
<div id="content">

    <!-- Revenues -->
    <section class="check-out padding-top-15 padding-bottom-30">
        <div class="container">
            <!-- Heading -->
            <div class="heading text-left margin-bottom-20">
                <h4>회원가입</h4>
            </div>

            <!-- coupen -->
            <div class="coupen">
                <p>회원가입 후 이용하시면 <span>더 많은 서비스</span>를 이용하실 수 있습니다.</p>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}
                            <article>
                                <div class="signup">
                                    <div class="form-group{{ $errors->has('ClientPartners') ? ' has-error' : '' }}">
                                        <label>이용목적 *<br/>
                                            <label for="ccc" class="label_n"><input name="ClientPartners" id="ccc"
                                                                                    type="radio"
                                                                                    value="ccc">클라이언트</label>
                                            <label for="ppp" class="label_n"><input name="ClientPartners" id="ppp"
                                                                                    type="radio"
                                                                                    value="ppp">파트너스</label>
                                            @if ($errors->has('ClientPartners'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ClientPartners') }}</strong>
                                                </span>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label>이름 *
                                            <input class="form-control" type="text" name="name" placeholder=""
                                                   value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </label>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>이메일 *
                                            <input class="form-control" type="text" name="email" placeholder=""
                                                   value="{{ old('email') }}">
                                        </label>
                                        @if ($errors->has('email'))
                                            <span class=" help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label>비밀번호 *
                                            <input class="form-control" type="text" name="password" placeholder="">
                                        </label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label>비밀번호 재입력 *
                                            <input class="form-control" type="text" name="password_confirmation"
                                                   placeholder="">
                                        </label>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="checkbox">
                                        <input type="checkbox" name="checkbox1" id="checkbox1" value="option1"
                                               checked="">
                                        <label for="checkbox1"><a href="#">이용약관</a> 및 <a href="#">개인정보 보호방침</a>에
                                            동의합니다.</label>
                                    </div>

                                    <button type="submit" href="#" class="btn login_button margin-top-20">회원가입<i
                                                class="fa fa-caret-right"></i></button>
                                </div>
                            </article>
                        </form>
                    </div>

                </div>

                <!-- Stories -->
                <div class="col-md-4">
                    <!-- Story -->
                    <div class="story">
                        <article>
                            <div class="signup_right">

                                {{--<a class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 페이스북 아이디로 가입</a>--}}
                                {{--<a class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 네이버 아이디로 가입</a>--}}
                                {{--<a class="btn-facebook btn-lg btn-block"><i class="fa fa-google-plus"></i> 구글 아이디로--}}
                                    {{--가입</a>--}}

                                <p class="redirect01">이미 회원이신가요? <a href="#"><br><strong>로그인하기</strong></a></p>
                                <p class="redirect01">아이디,비밀번호를 잊으셨나요? <br/><a href="#"><strong>아이디,비밀번호 찾기</strong></a>
                                </p>


                            </div>
                        </article>
                    </div>


                </div>
            </div>

        </div>
    </section>
</div>
<script>
    $(function(){
        $('input:radio[name=ClientPartners]')[0].checked = true;
    });

</script>

@include('include.footer')
@endsection