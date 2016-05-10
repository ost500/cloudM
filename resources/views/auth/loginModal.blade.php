
<form role="form" method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" name="user" placeholder="이메일">
        @if ($errors->has('email'))
            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" name="pass" placeholder="비밀번호">
        @if ($errors->has('password'))
            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
        @endif
    </div>
    <input type="checkbox" name="remember"> 아이디 저장
    <input type="submit" name="login" class="login loginmodal-submit" value="로그인">
</form>