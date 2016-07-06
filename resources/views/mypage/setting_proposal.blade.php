@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">기본제안서</span>
        <p class="padding-top-5">프로젝트에 지원할 때 광고주에게 기본적으로 제공되는 제안서 입니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page padding-bottom-30">
            <div class="panel-body">
                <form action="{{ url('/setting/proposal/save') }}" method="POST" role="form" class="form-horizontal"
                      enctype="multipart/form-data" accept-charset="UTF-8">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="port_guide img_f">
                                <img src="/images/i_icon.png" style="margin-top:12px;">
                                <p><span class="title">[제안서 관리 안내]</span>
                                <div class="content">연락처, 이메일 등 직거래를 유도 할 수 있는 정보는, 약관에 의해 수정된 후 제공 됩니다.</div></p>
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">
                        <h5 class="panel-title">기본제안서</h5>
                    </div>

                    @if ($loginUser->auth_check == "인증완료")
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p class="text-center"><i class="fa fa-check-circle-o fa-5x"></i></p>
                                <p class="text-center">신원인증이 완료 되었습니다. 감사합니다.</p>
                            </div>
                        </div>
                    @elseif ($loginUser->auth_image && $loginUser->auth_check == "인증요청")
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p class="text-center"><i class="fa fa-check-circle-o fa-5x"></i></p>
                                <p class="text-center">자료 제출 후 인증 대기중</p>
                            </div>
                        </div>
                    @else
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">
                                <span class="symbol required"></span> 파일
                        </label>
                        <div class="col-sm-7">
                            <input class="form-control" type="file"
                                   name="proposal_file" id="file_input"  required="required"
                                   value="" />
                            <p class="validation-error">{{ $errors->first('proposal_file') }}</p>
                        </div>
                    </div>
                    @endif


                    @if ($loginUser->auth_check == "인증전")
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <button class="btn btn-o btn-primary pull-right" type="submit">
                                저장하기
                            </button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>

    </div>
@endsection
