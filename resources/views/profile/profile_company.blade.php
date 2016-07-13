@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">회사소개서</span>
        <p class="padding-top-5">프로젝트에 지원할 때 광고주에게 기본적으로 제공되는 회사소개서 입니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page padding-bottom-30">
            <form action="{{ url('/profile/company/save') }}" method="POST"  id="form"
                  novalidate="novalidate" class="smart-wizard form-horizontal"
                  enctype="multipart/form-data" accept-charset="UTF-8">
                {!! csrf_field() !!}

                <div class="form-group panel-body">
                    <div class="col-sm-12">
                        <div class="port_guide img_f">
                            <img src="/images/i_icon.png" style="margin-top:12px;">
                            <p><span class="title">[회사소개서 관리 안내]</span>
                            <div class="content">업체명, 연락처, 이메일 등 직거래를 유도 할 수 있는 정보는, 약관에 의해 수정된 후 제공 됩니다.</div></p>

                            <div class="p_add_span">
                                <p class="title">1. 회사소개서 등록.</p>
                                <div class="content">ppt, pptx 파일만 업로드 가능 합니다.</div>

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
                    @if($loginUser->partners['company_file_check'])
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p class="text-center"><i class="fa fa-check-circle-o fa-5x"></i></p>
                                <p class="text-center">회사소개서가 등록되었습니다.</p>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <div class="col-sm-12">
                                <p class="text-center"><i class="fa fa-exclamation-circle fa-5x"></i></p>
                                <p class="text-center">패스트엠 검수중 입니다.</p>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">
                            <span class="symbol required"></span> 파일
                        </label>
                        <div class="col-sm-7">
                            <input class="form-control" type="file"
                                   name="company_attach" id="company_attach"  required="required"
                                   value="" />
                            <p class="validation-error">{{ $errors->first('company_attach') }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <button class="btn btn-dark-azure pull-right" type="submit">
                                저장하기
                            </button>
                        </div>
                    </div>
                @endif
            </form>
        </div>

    </div>

    <script src="/js/jquery.validate.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

    <script>
        $("#form").validate({
            rules: {
                company_attach: {
                    extension: "ppt|pptx",

                },

            },
            messages: {
                company_attach: {
                    required: "업로드해 주세요",
                    extension: "ppt, pptx 파일만 업로드 가능합니다."
                },
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }


        })
        jQuery.extend(jQuery.validator.messages, {
            extension: "ppt, pptx 파일만 업로드 가능합니다."
        });

    </script>
@endsection
