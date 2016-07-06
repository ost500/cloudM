@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">회사소개서</span>
        <p class="padding-top-5">프로젝트에 지원할 때 광고주에게 기본적으로 제공되는 회사소개서 입니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page padding-bottom-30">
            <div class="panel-body">
                <form action="{{ url('/profile/company/save') }}" method="POST" role="form" class="form-horizontal"
                      enctype="multipart/form-data" accept-charset="UTF-8">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="port_guide img_f">
                                <img src="/images/i_icon.png" style="margin-top:12px;">
                                <p><span class="title">[회사소개서 관리 안내]</span>
                                <div class="content">연락처, 이메일 등 직거래를 유도 할 수 있는 정보는, 약관에 의해 수정된 후 제공 됩니다.</div></p>

                                <div class="p_add_span">
                                    <p class="title">1. 회사소개서 등록.</p>
                                    <div class="content">ppt, pptx, pdf 파일만 업로드 가능 합니다.</div>

                                    <p class="title">2. 회사소개서 변경</p>
                                    <div class="content">회사소개서 등록 후 서류 변경을 원하실 경우에는, <br>패스트엠 고객센터를 통해 연락 주시면 신속히 처리해 드립니다.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-heading">
                        <h5 class="panel-title">
                            @if ($partners->company_file_name && File::exists($company_file))
                                회사소개서 등록 완료
                            @else
                                회사소개서 등록
                            @endif
                        </h5>
                    </div>

                    @if ($partners->company_file_name && File::exists($company_file))
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p class="text-center"><i class="fa fa-check-circle-o fa-5x"></i></p>
                                <p class="text-center">등록된 회사소개서 : {{ $partners->company_origin_name }}</p>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="inputEmail3">
                                <span class="symbol required"></span> 파일
                            </label>
                            <div class="col-sm-7">
                                <input class="form-control" type="file"
                                       name="company_attach" id="file_input"  required="required"
                                       value="" />
                                <p class="validation-error">{{ $errors->first('company_attach') }}</p>
                            </div>
                        </div>
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
