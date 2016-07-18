@extends('layouts.customer_layout')
@section('customer_centre')


    <div class="col-md-9 job-right" id="story">

        <div class="panel panel-default">
            <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                <span style="color:black" class="h3 text-bold">비밀번호 찾기</span>
                <p class="padding-top-5">비밀번호를 잊으셨나요?</p>
            </div>

            <div class="job-content">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/password/email') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail 주소</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-fastm">
                                        <i class="fa fa-btn fa-envelope"></i> 비밀번호 리셋 링크 보내기
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>


        </div>
    </div>




@endsection
