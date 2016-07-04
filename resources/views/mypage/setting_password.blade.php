@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">비밀번호 변경</span>
        <p class="padding-top-5">개인정보를 주기적으로 변경하여 개인정보를 보호해 주세요.</p>
    </div>


    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page ">

            <div class="panel-heading">
                <h5 class="panel-title">비밀번호 확인</h5>
            </div>

            <div class="panel-body padding-right-30">
                <form action="{{ url('/setting/passwordCheck') }}" method="POST" role="form" class="form-horizontal"
                      accept-charset="UTF-8">
                    {!! csrf_field() !!}
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">아이디 </label>
                        <div class="col-sm-8">
                            <p class="margin-top-8">{{ Auth::user()->email }}</p>
                            <p class="validation-error"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3"><span class="symbol required"></span> 비밀번호 </label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password"
                                   name="password" id="auth_file_input" required="required"  />

                            <p class="validation-error">{{ $errors->first('password') }}</p>
                        </div>
                    </div>
                    <div class="form-group margin-top-20 padding-right-35">
                        <div class="col-sm-offset-10 col-sm-10">
                            <button class="btn btn-o btn-primary" type="submit">
                                로그인
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
