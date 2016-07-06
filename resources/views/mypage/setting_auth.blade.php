@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">신원 인증</span>
        <p class="padding-top-5">안전한 프로젝트 진행과 계약을 위해서, 사업자등록증 또는 신분증을 통한 확인을 거칩니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page padding-bottom-30">
            <div class="panel-body">
                <form action="{{ url('/mypage/auth') }}" method="POST" role="form" class="form-horizontal"
                      enctype="multipart/form-data" accept-charset="UTF-8">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="port_guide img_f">
                                <img src="/images/i_icon.png" style="margin-top:12px;">
                                <p><span class="title">[인증 서류 및 인증 과정 안내]</span>
                                <div class="content">제출한 인증 서류는 개인 정보 취급 방침에 의해 관리됩니다.</div></p>

                                <div class="p_add_span">
                                    <p class="title">1. 인증서류 제출.</p>
                                    <div class="content">프로젝트의 계약을 위해서는 반드시 인증 서류가 필요합니다. <br>사용 용도 : 계약서 작성</div>

                                        <table class="table_03" width=95% cellpadding=0 cellspacing=0>
                                            <col style="width:30%;"/>
                                            <col style="width:20%;"/>
                                            <col style="width:15%;"/>
                                            <col style="width:35%;"/>
                                            <tr><td colspan="4" class="padding-top-0"></td></tr>
                                            <tr>
                                                <th>법인 사업자, 개인 사업자</th>
                                                <td>사업자등록증</td>

                                                <th>개인, 팀</th>
                                                <td>주민등록증, 운전면허증, 여권</td>
                                            </tr>
                                        </table>

                                    <p class="title">2. 인증요청</p>
                                    <div class="content">인증은 근무일 기준 24시간 이상 소요 되며,<br>이상이 있을 경우 패스트엠 관리팀에서 이메일로 문의 드립니다.</div>

                                    <p class="title">3. 인증완료</p>
                                    <div class="content">인증완료 후 서류 변경을 원하실 경우에는, <br>패스트엠 고객센터를 통해 연락 주시면 신속히 처리해 드립니다.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">
                        <h5 class="panel-title">신원 {{ $loginUser->auth_check }}</h5>
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
                                <span class="symbol required"></span> 사진
                        </label>
                        <div class="col-sm-7">
                            <input class="form-control" type="file"
                                   name="auth_image" id="auth_file_input"  required="required"
                                   value="{{ $loginUser->auth_image.".jpg" }}" />
                            <p class="validation-error">{{ $errors->first('auth_image') }}</p>
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
