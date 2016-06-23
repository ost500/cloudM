@extends('include.head')
@section('content')


    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">


                <div class="coupen">
                    <p>프로젝트 등록 전에 <span>광고주 정보</span>를 입력해주세요.</p>
                </div>


                <!-- Side Bar -->
                <div class="row">


                    <!-- Job  Content -->
                    <div class="col-md-12 job-right">


                        <!-- Job Content -->
                        <div id="accordion">

                            <!-- Job Section -->
                            <div class="job-content job-post-page">
                                <!-- Job Tittle -->
                                <div class="panel-group">
                                    <div class="panel panel-default">

                                        <form action="{{ url("/p_add") }}" method="post" role="form"
                                              class="smart-wizard" id="form"
                                              novalidate="novalidate">
                                            {!! csrf_field() !!}
                                            <div id="wizard" class="swMain">
                                                <!-- start: WIZARD SEPS -->
                                                <ul class="anchor">
                                                    <li>
                                                        <a href="#step-1" class="wait selected" isdone="1" rel="1">
                                                            <div class="stepNumber">
                                                                1
                                                            </div>
                                                            <span class="stepDesc"><small> 광고주 기본 정보 등록 </small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-2" class="wait done" isdone="1" rel="2">
                                                            <div class="stepNumber">
                                                                2
                                                            </div>
                                                            <span class="stepDesc"> <small> 프로젝트 정보 등록 </small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-3" class="wait done" isdone="1" rel="3">
                                                            <div class="stepNumber">
                                                                3
                                                            </div>
                                                            <span class="stepDesc"> <small> 프로젝트 등록 완료 </small> </span>
                                                        </a>
                                                    </li>

                                                </ul>


                                                <div class="stepContainer" style="height: 558px; padding-top:30px;">
                                                    <div id="step-1" class="content" style="display: block;">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="padding-30">
                                                                    {{--<h6 class="StepTitle">정확한 광고주 기본정보를 입력해 주세요.</h6>--}}
                                                                    {{--<p>--}}
                                                                    {{--This is an added measure against fraud and to--}}
                                                                    {{--help with billing issues.--}}
                                                                    {{--</p>--}}
                                                                    {{--<p class="text-small">--}}
                                                                    {{--Enter security questions in case you lose access--}}
                                                                    {{--to your account.--}}
                                                                    {{--</p>--}}
                                                                    <img src="/images/p_add_bannIMG.png"
                                                                         class="margin-top_-30">
                                                                    <h6 class="p_add_banntitle">당신의 마케팅 프로젝트,<br>클라우드엠과
                                                                        함께 하세요!</h6>
                                                                    <ul class="p_add_ul">
                                                                        <li class="p_add_ul_num01">빠르게 마케팅 대행사를 찾을 수
                                                                            있습니다.
                                                                        </li>
                                                                        <li class="p_add_ul_num02">실력있는 대행사를 꼼꼼하게 비교하고
                                                                            선택할 수 있습니다.
                                                                        </li>
                                                                        <li class="p_add_ul_num03">안전하게 프로젝트를 진행할 수
                                                                            있습니다.
                                                                        </li>
                                                                        <li class="p_add_ul_num04">계약부터, 분쟁조정, 대금지급까지
                                                                            편리하게 프로젝트를 진행할 수 있습니다.
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7">


                                                                <fieldset>
                                                                    <legend>
                                                                        광고주 기본 정보
                                                                    </legend>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 담당자 <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                       name="name" aria-required="true"
                                                                                       aria-describedby="name-error"
                                                                                       value="{{ $user->name }}"><span
                                                                                        id="name-error"
                                                                                        class="help-block valid"
                                                                                        style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 연락처 <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <input type="text"
                                                                                       class="form-control input-mask-phone"
                                                                                       name="phone" aria-required="true"
                                                                                       aria-describedby="phone-error"
                                                                                       value="{{ $user->phone_num }}"><span
                                                                                        id="phone-error"
                                                                                        class="help-block valid"
                                                                                        style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 회사형태 <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <select class="form-control"
                                                                                        name="company_type"
                                                                                        aria-required="true"
                                                                                        aria-describedby="company_type-error">
                                                                                    <option value="">선택</option>
                                                                                    <option value="개인"
                                                                                            @if($user->clients->company_type=="개인") selected @endif>
                                                                                        개인
                                                                                    </option>
                                                                                    <option value="팀"
                                                                                            @if($user->clients->company_type=="팀") selected @endif>
                                                                                        팀
                                                                                    </option>
                                                                                    <option value="개인 사업자"
                                                                                            @if($user->clients->company_type=="개인 사업자") selected @endif>
                                                                                        개인 사업자
                                                                                    </option>
                                                                                    <option value="법인 사업자"
                                                                                            @if($user->clients->company_type=="법인 사업자") selected @endif>
                                                                                        법인 사업자
                                                                                    </option>
                                                                                    <option value="기타@if($user->clients->company_type=="기타") selected @endif">
                                                                                        기타
                                                                                    </option>
                                                                                </select> <span id="company_type-error"
                                                                                                class="help-block valid"
                                                                                                style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label> 광고주소개 <span
                                                                                            class="symbol required"></span></label>
                                                                                <textarea name="company_intro"
                                                                                          class="form-control"
                                                                                          rows=10
                                                                                          value="">{{ $user->clients->intro }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--<p class="text-small">--}}
                                                                    {{--<a href="javascript:void(0)"--}}
                                                                    {{--data-content="Your personal information is not required for unlawful purposes, but only in order to proceed in this tutorial"--}}
                                                                    {{--data-title="Don't worry!"--}}
                                                                    {{--data-placement="top" data-toggle="popover"--}}
                                                                    {{--data-original-title="" title=""> 왜 개인정보가--}}
                                                                    {{--필요한가요? </a>--}}
                                                                    {{--</p>--}}
                                                                </fieldset>


                                                                <div class="form-group">
                                                                    <button class="btn btn-1 btn-primary btn-o next-step btn-wide pull-right">
                                                                        Next <i class="fa fa-arrow-circle-right"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="step-2" class="content" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="padding-30">
                                                                    {{--<h2 class="StepTitle">Create an account <span--}}
                                                                    {{--class="text-large block">to manage everything you do with Clip-Two</span>--}}
                                                                    {{--</h2>--}}
                                                                    {{--<p>--}}
                                                                    {{--You’ll enjoy personal services and great--}}
                                                                    {{--benefits including:--}}
                                                                    {{--</p>--}}
                                                                    {{--<p class="text-small">--}}
                                                                    {{--</p>--}}
                                                                    {{--<ul class="no-margin">--}}
                                                                    {{--<li>--}}
                                                                    {{--Access to exclusive releases and limited--}}
                                                                    {{--products.--}}
                                                                    {{--</li>--}}
                                                                    {{--<li>--}}
                                                                    {{--ng-Clip services, benefits and promotions.--}}
                                                                    {{--</li>--}}
                                                                    {{--</ul>--}}
                                                                    {{--<p></p>--}}
                                                                    <img src="/images/p_add_bannIMG.png"
                                                                         class="margin-top_-30">
                                                                    <h6 class="p_add_banntitle">당신의 마케팅 프로젝트,<br>클라우드엠과
                                                                        함께 하세요!</h6>
                                                                    <ul class="p_add_ul">
                                                                        <li class="p_add_ul_num01">빠르게 마케팅 대행사를 찾을 수
                                                                            있습니다.
                                                                        </li>
                                                                        <li class="p_add_ul_num02">실력있는 대행사를 꼼꼼하게 비교하고
                                                                            선택할 수 있습니다.
                                                                        </li>
                                                                        <li class="p_add_ul_num03">안전하게 프로젝트를 진행할 수
                                                                            있습니다.
                                                                        </li>
                                                                        <li class="p_add_ul_num04">계약부터, 분쟁조정, 대금지급까지
                                                                            편리하게 프로젝트를 진행할 수 있습니다.
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <fieldset>
                                                                    <legend>
                                                                        프로젝트 정보를 입력하세요
                                                                    </legend>
                                                                    {{--<div class="form-group">--}}
                                                                    {{--<label class="control-label"> 카테고리 <span--}}
                                                                    {{--class="symbol ok"--}}
                                                                    {{--aria-required="true"></span>--}}
                                                                    {{--</label>--}}
                                                                    {{--<select name="category" class="form-control03">--}}
                                                                    {{--<option name="카테고리">카테고리</option>--}}
                                                                    {{--<option name="키워드">광고 의뢰</option>--}}
                                                                    {{--<option>바이럴</option>--}}
                                                                    {{--<option>SNS</option>--}}
                                                                    {{--<option>언론</option>--}}
                                                                    {{--<option>영상</option>--}}
                                                                    {{--<option>디자인</option>--}}
                                                                    {{--<option>콘텐츠 제작</option>--}}
                                                                    {{--<option>기타</option>--}}
                                                                    {{--</select>--}}
                                                                    {{--</div>--}}

                                                                    <div class="row padding-top-15">

                                                                        <div class="form-group"
                                                                             style="padding:0 15px 0 15px;">
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

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 마케팅진행
                                                                                    목적 <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <select class="form-control"
                                                                                        name="purpose"
                                                                                        aria-required="true"
                                                                                        aria-describedby="purpose-error">
                                                                                    <option value="">선택</option>
                                                                                    <option value="단기 매출증대">단기 매출증대
                                                                                    </option>
                                                                                    <option value="웹사이트 유입증가">웹사이트
                                                                                        유입증가
                                                                                    </option>
                                                                                    <option value="상담 DB확보">상담 DB확보
                                                                                    </option>
                                                                                    <option value="이벤트 참여">이벤트 참여
                                                                                    </option>
                                                                                    <option value="상품인지">상품인지</option>
                                                                                    <option value="장기 브랜딩">장기 브랜딩
                                                                                    </option>
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
                                                                                <select class="form-control"
                                                                                        name="category"
                                                                                        aria-required="true"
                                                                                        aria-describedby="category-error">
                                                                                    <option value="">선택</option>
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


                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 마케팅 진행 기간
                                                                                    (개월/년) <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <input type="text"
                                                                                       placeholder="(최대 3자리, 예 : 3개월)"
                                                                                       class="form-control"
                                                                                       name="duration">
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
                                                                                <input type="text"
                                                                                       placeholder="( VAT 별도, 예 : 100,000,000)"
                                                                                       class="form-control"
                                                                                       name="money"><span id="money"
                                                                                                          class="help-block valid"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label class="control-label"> 프로젝트 제목 <span
                                                                                    class="symbol required"></span>
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                               name="project_name" aria-required="true"
                                                                               aria-describedby="project_name-error"><span
                                                                                id="project_name-error"
                                                                                class="help-block valid"
                                                                                style="display: none;"></span>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label class="control-label"> 프로젝트 내용 <span
                                                                                    class="symbol required"></span>
                                                                        </label>
                                                                        <div class="form-group">
								<textarea name="content_detail" class="form-control" rows=20>< 프로젝트 진행 방식 >
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

                                                                    <div class="row padding-top-15">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 모집 마감일자
                                                                                    <span class="symbol required"></span>
                                                                                </label>
                                                                                {{--<select class="form-control"--}}
                                                                                {{--name="deadline"--}}
                                                                                {{--aria-required="true"--}}
                                                                                {{--aria-describedby="companyType-error">--}}
                                                                                {{--<option>2016년 2월 29일</option>--}}
                                                                                {{--<option>등록 후 2일 날짜</option>--}}
                                                                                {{--<option>등록 후 3일 날짜</option>--}}
                                                                                {{--<option>등록 후 4일 날짜</option>--}}
                                                                                {{--<option>등록 후 5일 날짜</option>--}}
                                                                                {{--<option>등록 후 6일 날짜</option>--}}
                                                                                {{--<option>등록 후 7일 날짜</option>--}}
                                                                                {{--</select>--}}

                                                                                <input id="deadline"
                                                                                       class="form-control"
                                                                                       name="deadline"

                                                                                >


                                                                            </div>
                                                                            <p class="text-small">
                                                                                <a href="javascript:void(0)"
                                                                                   data-content="지원자를 모집하는 기간입니다. 최소 1일부터 최대 2주까지 가능합니다"
                                                                                   data-title="주의사항!"
                                                                                   data-placement="top"
                                                                                   data-toggle="popover"
                                                                                   data-original-title="" title="">최소
                                                                                    1일부터 14일까지 가능합니다</a>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 프로젝트 예상
                                                                                    시작일 <span
                                                                                            class="symbol required"></span>
                                                                                </label>

                                                                                <input id="start_day"
                                                                                       class="form-control"
                                                                                       name="expecting_start"

                                                                                >


                                                                            </div>
                                                                            <p class="text-small">
                                                                                <a href="javascript:void(0)"
                                                                                   data-content="지원자를 모집하는 기간입니다. 최소 1일부터 최대 4주까지 가능합니다"
                                                                                   data-title="주의사항!"
                                                                                   data-placement="top"
                                                                                   data-toggle="popover"
                                                                                   data-original-title="" title="">최소
                                                                                    1일부터 4주까지 가능합니다</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 사전미팅 <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <select class="form-control"
                                                                                        name="pre_meeting"
                                                                                        aria-required="true"
                                                                                        aria-describedby="pre_meeting-error">
                                                                                    <option value="">선택
                                                                                    <option value="오프라인 미팅">오프라인 미팅
                                                                                    </option>
                                                                                    <option value="온라인 미팅">온라인 미팅 (카카오톡,
                                                                                        skype, 행아웃 등)
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
                                                                                    <option value="">선택</option>
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
                                                                            <p class="text-small">
                                                                                <a href="javascript:void(0)"

                                                                                   data-original-title="" title="">사전
                                                                                    미팅을 진행할 지역을 선택해 주세요</a>
                                                                            </p>
                                                                        </div>

                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label"> 마케팅 진행
                                                                                    경험여부 <span
                                                                                            class="symbol required"></span>
                                                                                </label>
                                                                                <select class="form-control"
                                                                                        name="experience"
                                                                                        aria-required="true"
                                                                                        aria-describedby="experience-error">
                                                                                    <option value="">선택</option>
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
                                                                                    <option value="">선택</option>
                                                                                    <option value="견적문의">견적문의</option>
                                                                                    <option value="시장조사">시장조사</option>
                                                                                    <option value="실제진행">실제진행</option>
                                                                                </select><span id="reason-error"
                                                                                               class="help-block valid"
                                                                                               style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </fieldset>


                                                                <div class="form-group">
                                                                    <button class="btn btn-1 btn-primary btn-o back-step btn-wide pull-left">
                                                                        <i class="fa fa-circle-arrow-left"></i> 이전으로
                                                                    </button>
                                                                    {{--<button class="btn btn-1 btn-primary btn-o next-step btn-wide pull-right">--}}
                                                                    {{--Next <i class="fa fa-arrow-circle-right"></i>--}}
                                                                    {{--</button>--}}
                                                                    <button type="submit"
                                                                            class="btn btn-1 btn-primary btn-o finish-step btn-wide pull-right">
                                                                        등록하기 <i class="fa fa-arrow-circle-right"></i>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="step-3" class="content" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="text-center">
                                                                    <h1 class=" ti-check block text-primary"></h1>
                                                                    <h2 class="StepTitle">프로젝트를 등록해주셔서 감사합니다.</h2>
                                                                    <p class="text-large">
                                                                        크라우드엠 내부 검수 후에 지원자 모집이 시작됩니다.<br>
                                                                        검수에는 <strong>최대 24시간</strong>이 소요되며, 크라우드엠 매니저가
                                                                        정확한 검수를 위해 유선 또는 이메일 연락을 할 수 있습니다.</span>
                                                                    </p>
                                                                    <p class="text-small">
                                                                        검수 결과는 <strong>이메일과 SMS</strong>를 통해
                                                                        발송해드립니다.<br>
                                                                        검수에 대한 문의는 <strong>고객센터(1661-8863)</strong>를
                                                                        이용해주세요.
                                                                    </p>
                                                                    <a class="btn btn-primary btn-o go-first"
                                                                       href="javascript:void(0)"> Back to first
                                                                        step </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="actionBar">
                                                        <div class="msgBox">
                                                            <div class="content"></div>

                                                            <a href="#" class="close">X</a>
                                                        </div>

                                                        <div class="loader">Loading</div>

                                                        <a href="#" class="buttonFinish buttonDisabled">Finish</a>

                                                        <a href="#" class="buttonNext">Next</a>

                                                        <a href="#" class="buttonPrevious buttonDisabled">Previous</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>


                                        <!-- Revenues Sidebar -->
                                        <div class="col-lg-4 job-right margin-bottom-40">
                                        </div>
                                        <!-- Story -->
                                        <div class="col-lg-8 job-right">
                                            <article>
                                                <div class="signup02">


                                                </div>
                                            </article>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </section>
    </div>

    <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-success">Click me</button>

    <link href="http://coderthemes.com/ubold_1.5/light/assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet"
          type="text/css">
    <script src="http://coderthemes.com/ubold_1.5/light/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/jquery.sweet-alert.init.js"></script>

    <div class="sweet-overlay" tabindex="-1" style="opacity: -0.04; display: none;"></div>
    <div class="sweet-alert hideSweetAlert" data-custom-class="" data-has-cancel-button="false"
         data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false"
         data-animation="pop" data-timer="null" style="display: none; margin-top: -192px; opacity: -0.04;">

        <div class="sa-icon sa-error" style="display: none;">
      <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
        <span class="sa-line sa-right"></span>
      </span>
        </div>

        <div class="sa-icon sa-warning" style="display: none;">
            <span class="sa-body"></span>
            <span class="sa-dot"></span>
        </div>

        <div class="sa-icon sa-info" style="display: none;"></div>

        <div class="sa-icon sa-success" style="display: block;">
            <span class="sa-line sa-tip"></span>
            <span class="sa-line sa-long"></span>

            <div class="sa-placeholder"></div>
            <div class="sa-fix"></div>
        </div>

        <div class="sa-icon sa-custom"
             style="display: none; width: 80px; height: 80px; background-image: url(&quot;assets/plugins/sweetalert/thumbs-up.jpg&quot;);"></div>
        <h2>등록되었습니다.</h2>
        <p style="display: block;"></p>
        <p class="text-small">
            패스트엠 내부 검수 후에 지원자 모집이 시작됩니다.<br><br>
            검수에는 <strong>최대 24시간</strong>이 소요되며,<br>
            정확한 검수를 위해 유선 또는 이메일 연락을 할 수 있습니다.<br><br>

            검수 결과는 <strong>이메일과 SMS</strong>를 통해
            발송해 드립니다.<br><br>
            검수에 대한 문의는 <strong>고객센터(1544-2329)</strong>를
            이용해주세요.
        </p>
        <fieldset style="margin:0 !important;">
            <input type="text" tabindex="3" placeholder="">
            <div class="sa-input-error"></div>
        </fieldset>

        <div class="sa-error-container">
            <div class="icon">!</div>
            <p>Not valid!</p>
        </div>

        <div class="sa-button-container">
            <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
            <div class="sa-confirm-button-container">
                <button class="confirm" tabindex="1"
                        style="display: inline-block; box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.0470588) 0px 0px 0px 1px inset; background-color: rgb(140, 212, 245);">
                    OK
                </button>
                <div class="la-ball-fall">
                    <div></div>
                    <div></div>
                    <div></div>
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
    <script src="/js/form_wizard.js"></script>




    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormWizard.init();

        });

    </script>



    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <?php $tomorrow = new DateTime('+1 day')?>
    <script type="text/javascript">

        $.datepicker.setDefaults($.datepicker.regional['ko']);
        $('#deadline').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: +1,
            maxDate: +14,


        });
        $('#start_day').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: +1,
            maxDate: +28,


        });
        $(function () {
            var localTime = new Date();
            var ptTime = new Date();
            ptTime.setMinutes(ptTime.getMinutes() + localTime.getTimezoneOffset() - 420);

        });


    </script>



    <script src="/js/multiple-select.js"></script>

    <script>
        // for all
        $(".multiselect").multipleSelect({
            width: '100%'
        });
    </script>



    @include('include.footer')
@endsection