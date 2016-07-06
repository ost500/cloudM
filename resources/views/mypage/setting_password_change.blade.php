@extends('layouts.master_layout')
@section('right_content')
<div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
    <span class="h3 text-bold">비밀번호 변경</span>
    <p class="padding-top-5">개인정보를 주기적으로 변경하여 개인정보를 보호해 주세요.</p>
</div>


<!-- Job Content -->
<div id="accordion">
    <div class="job-content job-post-page ">
        <div class="panel-body">
            <form action="{{ url('/setting/passwordUpdate') }}" method="POST" role="form" class="form-horizontal"
                  accept-charset="UTF-8">
                {!! csrf_field() !!}
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="port_guide img_f">
                            <img src="/images/i_icon.png" style="margin-top:12px;">
                            <p><span class="title">[비밀번호 변경 안내]</span>
                            <div class="content">안전한 대금 거래를 위해, 타사이트와 다른 고유한 비밀번호 사용하기를 권장합니다.</div></p>
                        </div>
                    </div>
                </div>

                <div class="panel-heading">
                    <h5 class="panel-title">비밀번호 변경</h5>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputEmail3"><span class="symbol required"></span>비밀번호 </label>
                    <div class="col-sm-7">
                        <input class="form-control" type="password"
                               name="password" id="auth_file_input" required="required" />
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="inputEmail3"><span class="symbol required"></span> 비밀번호 확인</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="password"
                               name="password_re" id="auth_file_input" required="required" />
                        {{ $errors->first('password_re') }}
                    </div>
                </div>
                <div class="form-group padding-top-30">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-4 pull-right">
                        <button class="btn btn-o btn-danger" type="button" onclick="window.location.href='/setting/password';">
                            취소
                        </button>
                        <button class="btn btn-o btn-primary" type="submit">
                            변경하기
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
