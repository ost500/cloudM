<!-- Job Section -->
<div class="job-content job-post-page" xmlns="http://www.w3.org/1999/html">
    <!-- Job Tittle -->
    <div class="panel-group">
        <div class="panel panel-default">
            <!-- Save -->
            <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
            <!-- PANEL HEADING -->
            <div class="panel-heading">
                <form action="{{ url("/p_update") }}" method="POST" role="form"
                      class="smart-wizard" id="form"
                      novalidate="novalidate">
                    {!! csrf_field() !!}
                    <input hidden name="id" value="{{ $update_project['id'] }}">

                    <div id="wizard" class="swMain">

                        <div class="job-tittle03">

                            <div class="media-body02">
                                <div class="form-group">
                                    <label class="control-label"> 분야 <span
                                                class="symbol required"></span>
                                    </label>
                                    <select name="area[]" id="area"
                                            multiple="multiple" id="filter"
                                            class="multiselect"
                                            style="display: none;"
                                            aria-required="true"
                                            aria-describedby="area-error"
                                            required>
                                        <optgroup label="광고 의뢰">

                                            <option value="네이버CPC"
                                                    @if($update_project_area->has("네이버CPC")) selected @endif
                                            >네이버CPC
                                            </option>
                                            <option value="언론보도"
                                                    @if($update_project_area->has("언론보도")) selected @endif
                                            >언론보도
                                            </option>
                                            <option value="구글광고"
                                                    @if($update_project_area->has("구글광고")) selected @endif
                                            >구글광고
                                            </option>
                                            <option value="페이스북광고"
                                                    @if($update_project_area->has("페이스북광고")) selected @endif
                                            >페이스북
                                                광고
                                            </option>
                                            <option value="매체 기타"
                                                    @if($update_project_area->has("매체 기타")) selected @endif
                                            >매체 기타
                                            </option>
                                        </optgroup>
                                        <optgroup label="바이럴">
                                            <option value="네이버SEO"
                                                    @if($update_project_area->has("네이버SEO")) selected @endif
                                            >네이버SEO
                                            </option>
                                            <option value="컨텐츠배포"
                                                    @if($update_project_area->has("컨텐츠배포")) selected @endif
                                            >컨텐츠배포
                                            </option>
                                            <option value="체험단모집"
                                                    @if($update_project_area->has("체험단모집")) selected @endif
                                            >체험단모집
                                            </option>
                                            <option value="바이럴 기타"
                                                    @if($update_project_area->has("바이럴 기타")) selected @endif
                                            >바이럴 기타
                                            </option>
                                        </optgroup>
                                        <optgroup label="운영대행">
                                            <option value="블로그">블로그</option>
                                            <option value="페이스북페이지">
                                                페이스북페이지
                                            </option>
                                            <option value="기타SNS"
                                                    @if($update_project_area->has("기타SNS")) selected @endif
                                            >기타SNS
                                            </option>
                                            <option value="홈페이지"
                                                    @if($update_project_area->has("홈페이지")) selected @endif
                                            >홈페이지
                                            </option>
                                            <option value="운영대행 기타"
                                                    @if($update_project_area->has("운영대행 기타")) selected @endif
                                            >운영대행
                                                기타
                                            </option>
                                        </optgroup>
                                        <optgroup label="1회성 프로젝트">
                                            <option value="개발"
                                                    @if($update_project_area->has("개발")) selected @endif
                                            >개발
                                            </option>
                                            <option value="디자인"
                                                    @if($update_project_area->has("디자인")) selected @endif
                                            >디자인
                                            </option>
                                            <option value="웹툰"
                                                    @if($update_project_area->has("웹툰")) selected @endif
                                            >웹툰
                                            </option>
                                            <option value="영상"
                                                    @if($update_project_area->has("영상")) selected @endif
                                            >영상
                                            </option>
                                            <option value="1회성 프로젝트 기타"
                                                    @if($update_project_area->has("1회성 프로젝트 기타")) selected @endif
                                            >1회성
                                                프로젝트 기타
                                            </option>
                                        </optgroup>
                                    </select><span id="area-error"
                                                   class="help-block valid"
                                                   style="display: none;"></span>
                                </div>
                            </div>

                            <div class="row padding-top-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> 마케팅진행 목적 <span
                                                    class="symbol required"></span>
                                        </label>
                                        <select class="form-control" name="purpose"
                                                aria-required="true"
                                                aria-describedby="purpose-error">
                                            <option value="{{ $update_project['purpose'] }}">{{ $update_project['purpose'] }}</option>
                                            <option value="단기 매출증대">단기 매출증대</option>
                                            <option value="웹사이트 유입증가">웹사이트 유입증가</option>
                                            <option value="상담 DB확보">상담 DB확보</option>
                                            <option value="이벤트 참여">이벤트 참여</option>
                                            <option value="상품인지">상품인지</option>
                                            <option value="장기 브랜딩">장기 브랜딩</option>
                                            <option value="기타">기타</option>
                                        </select><span id="purpose-error"
                                                       class="help-block valid"
                                                       style="display: none;"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> 업종 <span
                                                    class="symbol required"></span>
                                        </label>
                                        </label>
                                        <select class="form-control"
                                                name="category"
                                                aria-required="true"
                                                aria-describedby="category-error">
                                            <option value="{{ $update_project['category'] }}">{{ $update_project['category'] }}</option>
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
                            </div>

                            <div class="row padding-top-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> 마케팅 진행 기간
                                            (개월/년) <span
                                                    class="symbol required"></span>
                                        </label>
                                        </label>
                                        <input type="text"
                                               placeholder="(최대 3자리, 예 : 3개월)"
                                               class="form-control"
                                               name="duration"
                                               value="{{ $update_project['estimated_duration'] }}">
                                        {{--<span id="duration-error"--}}
                                        {{--class="help-block valid"></span>--}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> 총 예산(혹은 월
                                            예산)
                                            (원) <span
                                                    class="symbol required"></span>
                                        </label>
                                        <input size="10"
                                               type="text"
                                               placeholder="( VAT 별도, 예 : 100,000,000)"
                                               class="form-control"
                                               name="money" value="{{ number_format($update_project['budget']) }}"><span
                                                id="money"
                                                class="help-block valid"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="media-body02 padding-top-10">
                                <div class="form-group">
                                    <label class="control-label"> 프로젝트 제목 <span
                                                class="symbol required"></span>
                                    </label>
                                    <input type="text" class="form-control"
                                           name="project_name" aria-required="true"
                                           aria-describedby="project_name-error"
                                           value="{{ $update_project['title'] }}"><span
                                            id="project_name-error"
                                            class="help-block valid"
                                            style="display: none;"></span>
                                </div>
                            </div>

                            <div class="p_search02_txt margin-top-20">
                                <div class="form-group">
                                    <label class="control-label"> 프로젝트 내용 <span
                                                class="symbol required"></span>
                                    </label>
                                    <div class="form-group">
                                        <textarea name="content_detail" class="form-control"
                                                  rows=20>{{ $update_project['detail_content'] }}</textarea>

                                    </div>
                                    <p class="text-small">
                                        <a href="javascript:void(0)"
                                           data-content="이메일, 전화번호 등을 게시하는 경우 서비스 이용에 제재를 받을 수 있습니다."
                                           data-title="주의사항!" data-placement="top"
                                           data-toggle="popover"
                                           data-original-title="" title="">※이메일,
                                            전화번호 등 게시금지.</a>
                                    </p>
                                </div>


                                <div class="row padding-top-10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 모집 마감일자
                                                <span class="symbol required"></span>
                                            </label>

                                            <?php $tomorrow = new DateTime('+1 day')?>
                                            <input
                                                    class="form-control"
                                                    name="deadline"
                                                    id="deadline"
                                                    value="{{ $update_project['deadline'] }}">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 프로젝트 예상
                                                시작일 <span class="symbol required"></span>
                                            </label>
                                            <input
                                                    class="form-control"
                                                    name="expecting_start"
                                                    id="start_day"
                                                    value="{{ $update_project['expected_start_date'] }}">


                                        </div>
                                    </div>
                                </div>


                                <div class="row padding-top-10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 사전미팅 <span
                                                        class="symbol required"></span>
                                            </label>
                                            <select class="form-control"
                                                    name="pre_meeting"
                                                    aria-required="true"
                                                    aria-describedby="pre_meeting-error">
                                                <option value="{{ $update_project['meeting_way'] }}">{{ $update_project['meeting_way'] }}
                                                <option value="오프라인 미팅">오프라인 미팅
                                                </option>

                                                <option value="온라인 미팅">온라인 미팅 (카카오톡,
                                                    skype, 행아웃
                                                    등)
                                                <option value="온/오프라인 미팅">오프라인 미팅
                                                </option>
                                                </option>
                                            </select><span id="pre_meeting-error"
                                                           class="help-block valid"
                                                           style="display: none;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 사전 미팅 지역
                                                <span class="symbol required"></span>
                                            </label>
                                            <select class="form-control"
                                                    name="address_sido"
                                                    aria-required="true"
                                                    aria-describedby="address_sido-error">
                                                <option value="{{ $update_project['address_sido'] }}">{{ $update_project['address_sido'] }}</option>
                                                <option value="서울특별시">서울특별시</option>
                                                <option value="부산광역시">부산광역시</option>
                                                <option value="대구광역시">대구광역시</option>
                                                <option value="인천광역시">인천광역시</option>
                                                <option value="광주광역시">광주광역시</option>
                                                <option value="대전광역시">대전광역시</option>
                                                <option value="울산광역시">울산광역시</option>
                                                <option value="세종특별자치시">세종특별자치시
                                                </option>
                                                <option value="경기도">경기도</option>
                                                <option value="강원도">강원도</option>
                                                <option value="충청북도">충청북도</option>
                                                <option value="충청남도">충청남도</option>
                                                <option value="전라북도">전라북도</option>
                                                <option value="전라남도">전라남도</option>
                                                <option value="경상북도">경상북도</option>
                                                <option value="경상남도">경상남도</option>
                                                <option value="제주특별자치도">제주특별자치도
                                                </option>
                                            </select><span id="address_sido-error"
                                                           class="help-block valid"
                                                           style="display: none;"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row padding-top-10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 마케팅 진행 경험여부 <span
                                                        class="symbol required"></span>
                                            </label>
                                            <select class="form-control"
                                                    name="experience"
                                                    aria-required="true"
                                                    aria-describedby="experience-error">
                                                <option value="{{ $update_project['managing_experience'] }}">{{ $update_project['managing_experience'] }}</option>
                                                <option value="있음">있습니다</option>
                                                <option value="없음">없습니다</option>
                                            </select><span id="experience-error"
                                                           class="help-block valid"
                                                           style="display: none;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 프로젝트 등록 사유
                                                <span class="symbol required"></span>
                                            </label>
                                            <select class="form-control"
                                                    name="reason"
                                                    aria-required="true"
                                                    aria-describedby="reason-error">
                                                <option value="{{ $update_project['reason'] }}">{{ $update_project['reason'] }}</option>
                                                <option value="견적문의">견적문의</option>
                                                <option value="시장조사">시장조사</option>
                                                <option value="실제진행">실제진행</option>
                                            </select><span id="reason-error"
                                                           class="help-block valid"
                                                           style="display: none;"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group text-center margin-top-20">
                                <button type="submit" class="btn btn-dark-azure finish-step">수정 완료</button>
                                <button onclick="location.reload()" class="btn btn-danger">취소</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>


    </div>
    <div>


    </div>


    {{--달력--}}
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-i18n.js') }}">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">

    <script type="text/javascript">

        $.datepicker.setDefaults($.datepicker.regional['ko']);
        $('#deadline').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 'today',
            maxDate: "{{ $update_project['created_at']->modify('+14 day')->format('Y-m-d')  }}",


        });
        $('#start_day').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 'today',
            maxDate: "{{ $update_project['created_at']->modify('+28 day')->format('Y-m-d')  }}",


        });

    </script>


    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormWizard.init();
        });
    </script>


    <script src="/js/multiple-select.js"></script>

    <script>
        // for all
        $(".multiselect").multipleSelect({
            width: '100%'
        });


    </script>

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
                name: {
                    minlength: 2,
                    required: true
                },
                phone: {
                    minlength: 10,
                    required: true
                },
                company_type: {
                    required: true
                },
                company_intro: {
                    maxlength: 255,
                    required: true
                },
                area: {
                    required: true
                },
                category: {
                    required: true
                },
                project_name: {
                    required: true
                },
                duration: {
                    required: true
                }, money: {
                    required: true
                }, purpose: {
                    required: true
                }, content_detail: {
                    required: true
                }, deadline: {
                    required: true
                }, expecting_start: {
                    required: true
                }, pre_meeting: {
                    required: true
                }, experience: {
                    required: true
                }, reason: {
                    required: true
                }
            },
            messages: {
                name: "이름을 입력해 주세요.",
                phone: "연락처를 입력해 주세요.",
                company_type: "회사형태를 선택해 주세요.",
                area: "선택해 주세요",
                category: "선택해 주세요",
                project_name: "입력해 주세요",
                duration: "입력해 주세요",
                money: "입력해 주세요",
                purpose: "선택해 주세요",
                content_detail: "입력해 주세요",
                deadline: "입력해 주세요",
                expecting_start: "입력해 주세요",
                pre_meeting: "선택해 주세요",
                experience: "선택해 주세요",
                reason: "선택해 주세요"
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


</div>
