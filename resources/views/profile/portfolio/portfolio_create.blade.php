@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">포트폴리오</span>
        <p class="padding-top-5">체계적인 포트폴리오 관리를 통해 광고주의 선택을 받을 수 있습니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        <div class="job-content job-post-page">
            <div class="panel-heading">
                <h5 class="panel-title">포트폴리오 관리</h5>
            </div>
            <div class="panel-body padding-right-30">
                <form action="{{ url("/profile/portfolio/create") }}" method="post"
                      role="form" class="smart-wizard form-horizontal" id="form"
                      novalidate="novalidate" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span> 제목 </label>
                        <div class="col-sm-8">

                            <input type="text" class="form-control"
                                   name="title"
                                   aria-required="true"
                                   aria-describedby="title-error">
                            <span id="title-error"
                                  class="help-block valid"
                                  style="display: none;"></span>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <div class="checkbox_css">
                                <input type="checkbox" name="checkbox1"
                                       id="checkbox1" value="option1">
                                <label for="checkbox1">패스트엠에서 진행한 프로젝트
                                    입니다.</label>
                                <p class="validation-error"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol">대표 프로젝트</span></label>
                        <div class="col-sm-8">
                            <div class="checkbox_css">
                                <input type="hidden" name="top"
                                       id="checkbox2" value="0">
                                <input type="checkbox" name="top"
                                       id="checkbox2" value="1">
                                <label for="checkbox2">대표 프로젝트로 선정.</label>
                                <p class="validation-error"></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span> 분야 및 업종</label>

                        <div class="col-sm-4">
                            <select class="form-control"
                                    name="area"
                                    aria-required="true"
                                    aria-describedby="area-error">


                                    <option selected="selected" value="">분야</option>

                                    <optgroup label="매체 광고">
                                        <option value="네이버CPC">네이버CPC</option>
                                        <option value="언론보도">언론보도</option>
                                        <option value="구글광고">구글광고</option>
                                        <option value="페이스북광고">페이스북광고</option>
                                        <option value="매체 기타">매체 기타</option>
                                    </optgroup>
                                    <optgroup label="바이럴">
                                        <option value="네이버SEO">네이버SEO</option>
                                        <option value="컨텐츠 배포">컨텐츠 배포</option>
                                        <option value="체험단 모집">체험단 모집</option>
                                        <option value="바이럴 기타">바이럴 기타</option>
                                    </optgroup>
                                    <optgroup label="운영대행">
                                        <option value="블로그">블로그</option>
                                        <option value="페이스북페이지">페이스북페이지</option>
                                        <option value="기타SNS">기타SNS</option>
                                        <option value="홈페이지">홈페이지</option>
                                        <option value="운영대행 기타">운영대행 기타</option>
                                    </optgroup>
                                    <optgroup label="1회성 프로젝트">
                                        <option value="개발">개발</option>
                                        <option value="디자인">디자인</option>
                                        <option value="웹툰">웹툰</option>
                                        <option value="영상">영상</option>
                                        <option value="1회성 프로젝트 기타">1회성 프로젝트 기타</option>
                                    </optgroup>
                                    <optgroup label="오프라인 광고">
                                        <option value="TV광고">TV광고</option>
                                        <option value="신문광고">신문광고</option>
                                        <option value="라디오광고">라디오광고</option>
                                        <option value="지하철광고">지하철광고</option>
                                        <option value="버스광고">버스광고</option>
                                        <option value="잡지광고">잡지광고</option>
                                        <option value="외부광고">외부광고</option>
                                        <option value="오프라인 기타">오프라인 기타</option>
                                    </optgroup>


                            </select><span id="area-error"
                                           class="help-block valid"
                                           style="display: none;"></span>
                        </div>

                        <div class="col-sm-4">
                            <select class="form-control"
                                    name="category"
                                    aria-required="true"
                                    aria-describedby="category-error">
                                <option value="">업종</option>
                                <option value="의료">의료</option>
                                <option value="법률">법률</option>
                                <option value="스타트업">스타트업</option>
                                <option value="프랜차이즈">프랜차이즈</option>
                                <option value="교육/대학교">교육/대학교</option>
                                <option value="쇼핑몰">쇼핑몰</option>
                                <option value="기타">기타</option>
                            </select><span id="category-error"
                                           class="help-block valid"
                                           style="display: none;"></span>
                        </div>
                    </div>


                    <div class="form-group margin-top-20">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span> 프로젝트 설명 </label>
                        <div class="col-sm-8">
                            <textarea name="description" class="form-control"
                                      rows=10 aria-required="true"
                                      aria-describedby="description-error"
                                      aria-invalid="false"></textarea>
                            <span class="gry">한글 기준 5000자 이내로 작성해주세요.</span>
                                                        <span id="description-error"
                                                              class="help-block valid"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span> 진행기간 </label>
                        <div class="col-sm-4">
                            <input id="start_portfolio" class="form-control"
                                   name="from_date">
                            <span id="from_date-error"
                                  class="help-block valid"
                                  style="display: none;"></span>
                        </div>

                        <div class="col-sm-4">
                            <input id="end_portfolio" class="form-control"
                                   name="to_date">
                            <span id="to_date-error" class="help-block valid" style="display: none;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <div class="port_guide img_f">
                                <img src="/images/i_icon.png"
                                     style="margin-top:2px;">
                                <div class="p_add_span"
                                     style="">
                                    <strong>[포트폴리오 추가 가이드]</strong><br>
                                    포트폴리오 이미지는 가로 775px로 변환되어 보입니다.<br>
                                    이미지 파일(.jpg, .jpeg, .png, .gif 등)만 업로드할 수
                                    있습니다.<br>
                                    파일 크기는 최대 8MB까지 업로드가 가능합니다.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span>대표 이미지 </label>
                        <div class="col-sm-8">
                            <div class="filebox">
                                <input
                                        id="image1"
                                        class="upload-name"
                                        value="이미지를 등록해주세요"
                                        disabled="disabled"
                                        aria-required="true"
                                        aria-describedby="image1-error">
                                <label class="upload_button"
                                       for="ex_filename">이미지 업로드</label>
                                <input name="image1" type="file"
                                       id="ex_filename"
                                       accept="jpg,jpeg,png,gif">
                            <span id="image1-error"
                                  class="help-block valid"
                                  style="display: none;"></span>
                                <script>
                                    $("#ex_filename").change(function (ev) {

                                        $("#image1").val(this.value);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol"></span> 이미지2 </label>
                        <div class="col-sm-8">
                            <div class="filebox">
                                <input id="image2_name"
                                       class="upload-name"
                                       value="두번째 이미지를 등록해주세요"
                                       disabled="disabled">
                                <label class="upload_button"
                                       for="ex_filename2">이미지
                                    업로드</label>
                                <input name="image2" type="file"
                                       id="ex_filename2"
                                       class="upload-hidden"
                                       accept="jpg,jpeg,png,gif">
                                <script>
                                    $("#ex_filename2").change(function (ev) {
                                        $("#image2_name").val(this.value);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol"></span> 이미지3 </label>
                        <div class="col-sm-8">
                            <div class="filebox">
                                <input id="image3_name"
                                       class="upload-name"
                                       value="세번째 이미지를 등록해주세요"
                                       disabled="disabled"
                                       accept="jpg,jpeg,png,gif">
                                <label class="upload_button"
                                       for="ex_filename3">이미지
                                    업로드</label>
                                <input name="image3" type="file"
                                       id="ex_filename3"
                                       class="upload-hidden">
                                <script>
                                    $("#ex_filename3").change(function (ev) {
                                        $("#image3_name").val(this.value);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>


                    <div class="form-group margin-top-50 margin-bottom-20">
                        <div class="col-sm-offset-5 col-sm-10">
                            <button class="btn btn-dark-azure" type="submit">
                                등록하기
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- form-wizard start -->
    <script src="/js/js.cookie.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/jquery.smartWizard.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    <script src="/js/form_wizard_main.js"></script>
    <!-- end: Packet JAVASCRIPTS -->
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

    <script>


        $("#form").validate({
            rules: {
                title: "required",
                area: "required",
                category: "required",
                description: {required: true, maxlength: 10000},
                from_date: {required: true, date: true},
                to_date: {required: true, date: true},
                image1: {
                    required: true,
                    extension: "jpg|jpeg|png|gif",

                },
                image2: {
                    extension: "jpg|jpeg|png|gif",

                },
                image3: {
                    extension: "jpg|jpeg|png|gif",

                },

            },
            messages: {
                title: "제목을 입력해 주세요",
                area: "분야를 선택해 주세요",
                category: "업종을 선택해 주세요",
                description: "입력해 주세요",
                from_date: "진행 시작일을 입력해 주세요",
                to_date: "진행 종료일을 입력해 주세요",
                image1: {
                    required: "업로드해 주세요",
                    extension: "이미지 파일을 확인해 주세요"
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
            extension: "이미지 파일을 확인해 주세요"
        });

    </script>

    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-i18n.js') }}">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script type="text/javascript">


        $('#start_portfolio').datepicker({
            dateFormat: "yy-mm-dd"
        });

        $('#end_portfolio').datepicker({
            dateFormat: "yy-mm-dd"
        });


    </script>


@endsection

