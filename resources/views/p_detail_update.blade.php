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
                                <div class="form-group has-success">
                                    <label class="control-label"> 프로젝트 제목 <span
                                                class="symbol ok"
                                                aria-required="true"></span>
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
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label"> <i class="fa fa-krw"></i>
                                            예상금액 <span class="symbol ok" aria-required="true"></span>
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
                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label"> <i class="fa fa-clock-o"></i> 예상기간 <span
                                                    class="symbol ok"
                                                    aria-required="true"></span>
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
                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label"> <i class="fa fa-calendar-minus-o"></i> 모집마감
                                        <span class="symbol ok"
                                              aria-required="true"></span>
                                        </label>

                                        <input type="date"
                                               class="form-control"
                                               name="deadline"
                                               value="{{ $update_project['deadline'] }}">

                                    </div>
                                </div>


                            </div>
                            <div style="clear:both;"></div>

                            <div class="panel02 panel-default02 margin-top-20">


                                <div class="panel-body03">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 목적 <span
                                                            class="symbol ok"
                                                            aria-required="true"></span>
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
                                        <div class="col-md-3">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 매니징경험 <span class="symbol ok"
                                                                                          aria-required="true"></span>
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
                                        <div class="col-md-3">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 등록일자 <span class="symbol ok"
                                                                                         aria-required="true"></span>
                                                </label>
                                                <input style="margin-top: 5px" type="date"
                                                       class="form-control"
                                                       name="expecting_start"
                                                       value="{{ date_format($update_project['created_at'],'Y-m-d') }}">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="panel02 panel-default02 margin-top-20">

                                <div class="panel-body03">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 프로젝트 예상
                                                    시작일 <span class="symbol ok"
                                                              aria-required="true"></span>
                                                </label>
                                                <input style="margin-top: 5px"
                                                       type="date"
                                                       class="form-control"
                                                       name="expecting_start"
                                                       value="{{ $update_project['expected_start_date'] }}">


                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 사전미팅 <span
                                                            class="symbol ok"
                                                            aria-required="true"></span>
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
                                        <div class="col-md-3">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 사전 미팅 지역
                                                                                    <span class="symbol ok"
                                                                                          aria-required="true"></span>
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

                                </div>
                            </div>
                        </div>


                        <div style="clear:both;"></div>
                        <div class="p_search02_txt margin-top-20">
                            <div class="form-group has-success">
                                <label class="control-label"> 프로젝트 내용 <span
                                            class="symbol ok"
                                            aria-required="true"></span>
                                </label>
                                <div class="form-group">
								<textarea name="content_detail" class="form-control" rows=20>
                                    < 프로젝트 진행 방식 >
예시) 시작시점에 미팅, 주 1회 미팅 등

< 프로젝트의 현재 상황 >
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

< 상세한 업무 내용 >
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

< 참고자료 / 유의사항 >
예시) 참고사이트, 기타 유의사항 등 </textarea>

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


                            <div class="margin-top-10">

                                <ul class="tags dall margin-top-20 margin-bottom-10">
                                    <div class="row padding-top-15">
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 분야
                                                                                    <span class="symbol ok"
                                                                                          aria-required="true"></span>
                                                </label>
                                                <select class="form-control"
                                                        name="area"
                                                        aria-required="true"
                                                        aria-describedby="area-error">
                                                    <option value="{{ $update_project['area'] }}">{{ $update_project['area'] }}</option>
                                                    <option value="광고 의뢰">광고 의뢰</option>
                                                    <option value="운영 대행">운영 대행</option>
                                                    <option value="Viral">Viral</option>
                                                    <option value="1회성 프로젝트">1회성 프로젝트
                                                    </option>
                                                    <option value="기타">기타</option>
                                                </select><span id="area-error"
                                                               class="help-block valid"
                                                               style="display: none;"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label class="control-label"> 업종
                                                                                    <span class="symbol ok"
                                                                                          aria-required="true"></span>
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
                                                    <option value="교육/대학교">교육/대학교
                                                    </option>
                                                    <option value="쇼핑몰">쇼핑몰</option>
                                                    <option value="기타">기타</option>

                                                </select><span id="category-error"
                                                               class="help-block valid"
                                                               style="display: none;"></span>
                                            </div>
                                        </div>

                                    </div>


                                </ul>
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
</div>
<button onclick="location.reload()" class="button004 hover">취소
</button>