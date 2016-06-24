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
                                            <option value="네이버CPC">네이버CPC
                                            </option>
                                            <option value="언론보도">언론보도
                                            </option>
                                            <option value="구글광고">구글광고
                                            </option>
                                            <option value="페이스북 스폰서광고">페이스북
                                                광고
                                            </option>
                                            <option value="매체 기타">매체 기타
                                            </option>
                                        </optgroup>
                                        <optgroup label="바이럴">
                                            <option value="네이버SEO">네이버SEO
                                            </option>
                                            <option value="컨텐츠배포">컨텐츠배포
                                            </option>
                                            <option value="체험단모집">체험단모집
                                            </option>
                                            <option value="바이럴 기타">바이럴 기타
                                            </option>
                                        </optgroup>
                                        <optgroup label="운영대행">
                                            <option value="블로그">블로그</option>
                                            <option value="페이스북페이지">
                                                페이스북페이지
                                            </option>
                                            <option value="기타SNS">기타SNS
                                            </option>
                                            <option value="홈페이지">홈페이지
                                            </option>
                                            <option value="운영대행 기타">운영대행
                                                기타
                                            </option>
                                        </optgroup>
                                        <optgroup label="1회성 프로젝트">
                                            <option value="개발">개발</option>
                                            <option value="디자인">디자인</option>
                                            <option value="웹툰">웹툰</option>
                                            <option value="영상">영상</option>
                                            <option value="1회성 프로젝트 기타">1회성
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
                                            <input type="date"
                                                   class="form-control"
                                                   name="deadline"
                                                   min="{{ $tomorrow->format('Y-m-d') }}"
                                                   max="{{ $tomorrow->modify('+14 day')->format('Y-m-d') }}"
                                                   value="{{ $update_project['deadline'] }}">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 프로젝트 예상
                                                시작일 <span class="symbol required"></span>
                                            </label>
                                            <input type="date"
                                                   class="form-control"
                                                   name="expecting_start"
                                                   value="{{ $update_project['expected_start_date'] }}">


                                        </div>
                                    </div>
                                </div>


                                <div class="row padding-top-10">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 모집 마감일자
                                                <span class="symbol required"></span>
                                            </label>

                                            <?php $tomorrow = new DateTime('+1 day')?>
                                            <input type="date"
                                                   class="form-control"
                                                   name="deadline"
                                                   min="{{ $tomorrow->format('Y-m-d') }}"
                                                   max="{{ $tomorrow->modify('+14 day')->format('Y-m-d') }}"
                                                   value="{{ $update_project['deadline'] }}">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> 프로젝트 예상
                                                시작일 <span class="symbol required"></span>
                                            </label>
                                            <input type="date"
                                                   class="form-control"
                                                   name="expecting_start"
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

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-1 btn-primary btn-o finish-step btn-wide pull-right">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 수정 완료 <i
                                            class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>


    </div>
    <div>


    </div>


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

        $(".multiselect").click(function () {
            $(".multiselect").multipleSelect("setSelects", [1, 3]);
        });
    </script>
</div>
<button onclick="location.reload()" class="button004 hover">취소
</button>