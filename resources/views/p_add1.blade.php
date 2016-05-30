@extends('include.head')
@section('content')


    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">


                <div class="heading text-left margin-bottom-20">
                    <h4>프로젝트 등록</h4>
                </div>
                <div class="coupen">
                    <p>프로젝트 등록 전에 <span>광고주 정보</span>를 입력해주세요.</p>
                </div>


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

                                        <form class="smart-wizard" id="form" role="form" action="#"
                                              novalidate="novalidate">
                                            <div class="swMain" id="wizard">
                                                <!-- start: WIZARD SEPS -->
                                                <ul class="anchor">
                                                    <li>
                                                        <a class="wait selected" href="#step-1" rel="1" isdone="1">
                                                            <div class="stepNumber">
                                                                1
                                                            </div>
                                                            <span class="stepDesc"><small> 광고주 기본 정보 등록 </small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="wait disabled" href="#step-2" rel="2" isdone="0">
                                                            <div class="stepNumber">
                                                                2
                                                            </div>
                                                            <span class="stepDesc"> <small> 프로젝트 정보 등록 </small></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="wait disabled" href="#step-3" rel="3" isdone="0">
                                                            <div class="stepNumber">
                                                                3
                                                            </div>
                                                            <span class="stepDesc"> <small> 프로젝트 등록 완료 </small> </span>
                                                        </a>
                                                    </li>
                                                    <!--li>
                                                        <a href="#step-4" class="disabled" isdone="0" rel="4">
                                                        <div class="stepNumber">
                                                            4
                                                        </div> <span class="stepDesc"> <small> Complete </small> </span> </a>
                                                    </li-->
                                                </ul>


                                                <div class="stepContainer" style="height: 662px;">
                                                    <div class="stepContainer content"
                                                         style="height: 558px; padding-top:30px;">
                                                        <div class="content" id="step-1" style="display: block;">
                                                            <div class="row">
                                                                <!--<div class="col-md-5">
                                                                    <div class="padding-30">
                                                                        <h6 class="StepTitle">정확한 광고주 기본정보를 입력해 주세요.</h6>
                                                                        <p>
                                                                            This is an added measure against fraud and to help with billing issues.
                                                                        </p>
                                                                        <p class="text-small">
                                                                            Enter security questions in case you lose access to your account.
                                                                        </p>
                                                                    </div>
                                                                </div>-->
                                                                <div class="col-md-12">


                                                                    <article>
                                                                        <div class="signup02">


                                                                            <div class="margin-bottom-30">

                                                                                <h2 class="p_add_header"><i
                                                                                            class="fa fa-file-text-o"
                                                                                            aria-hidden="true"></i>
                                                                                    광고주님의 기본정보를 입력해주세요!</h2>


                                                                                <label>이름<span class="set_st">*</span>
                                                                                    <input name="title"
                                                                                           class="form-control03"
                                                                                           type="text" placeholder="">
                                                                                </label>
                                                                                <!--주의박스 시작-->
                                                                                <span class="rd margin-bottom-5"><span
                                                                                            class="rd_box">주의</span> 전부 입력해주세요.</span>
                                                                                <div class="clear"></div>
                                                                                <!--주의박스 끝-->
                                                                                <br>
                                                                                <label>핸드폰번호<span
                                                                                            class="set_st">*</span><br>
                                                                                    <select name="form_of_phone"
                                                                                            class="form-control03 phone_width"
                                                                                            id="form_of_business"
                                                                                            required="required">
                                                                                        <option>010</option>
                                                                                        <option>011</option>
                                                                                        <option>016</option>
                                                                                        <option>017</option>
                                                                                        <option>019</option>
                                                                                    </select>
                                                                                    <input name="phone_num"
                                                                                           class="form-control03 phone_width"
                                                                                           type="text" placeholder="">
                                                                                    <input class="form-control03 phone_width"
                                                                                           type="text" placeholder="">
                                                                                </label>
                                                                                <!--주의박스 시작-->
                                                                                <span class="rd margin-bottom-5"><span
                                                                                            class="rd_box">주의</span> 전부 입력해주세요.</span>
                                                                                <div class="clear"></div>
                                                                                <!--주의박스 끝-->
                                                                                <br>
                                                                                <label>회사형태<span class="set_st">*</span>
                                                                                    <select name="address_sido"
                                                                                            class="form-control03 ie-form-control"
                                                                                            id="address_sido">
                                                                                        <option value="">개인</option>
                                                                                        <option value="">팀</option>
                                                                                        <option value="">개인 사업자</option>
                                                                                        <option value="">법인 사업자</option>
                                                                                    </select>
                                                                                </label>
                                                                                <!--주의박스 시작-->
                                                                                <span class="rd margin-bottom-5"><span
                                                                                            class="rd_box">주의</span> 전부 입력해주세요.</span>
                                                                                <div class="clear"></div>
                                                                                <!--주의박스 끝-->
                                                                                <br>
                                                                                <label>광고주소개<span
                                                                                            class="set_st">*</span>
                                                                                    <textarea name="advertiser_intro"
                                                                                              class="form-control04"
                                                                                              id="company_intro"
                                                                                              rows="4" cols="40"
                                                                                              autocomplete="off"></textarea></label><br>
                                                                                <span class="gry">회사(개인)에 대해 간략하게 설명해주세요. (150자 이내)</span><br>
                                                                                <!--주의박스 시작-->
                                                                                <span class="rd margin-bottom-5"><span
                                                                                            class="rd_box">주의</span> 전부 입력해주세요.</span>
                                                                                <div class="clear"></div>
                                                                                <!--주의박스 끝-->


                                                                                <button class="button004 signup003 margin-top-10"
                                                                                        type="submit">등록하기
                                                                                </button>
                                                                            </div>


                                                                        </div>
                                                                    </article>


                                                                    <div class="form-group">
                                                                        <button class="btn btn-1 btn-primary btn-o next-step btn-wide pull-right">
                                                                            Next
                                                                            <i class="fa fa-arrow-circle-right"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="content" id="step-2" style="display: none;">
                                                            <div class="row">

                                                                <div class="col-md-12">
                                                                    <article>
                                                                        <div class="signup02">
                                                                            <div class="margin-bottom-40 job-tittle04 padding-bottom-40">
                                                                                <h2 class="p_add_header"><i
                                                                                            class="fa fa-file-text-o"
                                                                                            aria-hidden="true"></i> 등록하실
                                                                                    프로젝트 정보를 입력해주세요!</h2>
                                                                                <form role="form"
                                                                                      action="{{ url('p_add/2') }}"
                                                                                      method="post">

                                                                                    <label for="ca001">카테고리<span
                                                                                                class="set_st">*</span><br>


                                                                                        <select name="category"
                                                                                                class="form-control03">
                                                                                            <option name="카테고리">카테고리
                                                                                            </option>
                                                                                            <option name="키워드">광고 의뢰
                                                                                            </option>
                                                                                            <option>바이럴</option>
                                                                                            <option>SNS</option>
                                                                                            <option>언론</option>
                                                                                            <option>영상</option>
                                                                                            <option>디자인</option>
                                                                                            <option>콘텐츠 제작</option>
                                                                                            <option>기타</option>
                                                                                        </select>


                                                                                    </label>
                                                                                    <br>
                                                                                    <label>프로젝트 제목<span
                                                                                                class="set_st">*</span>
                                                                                        <input class="form-control03"
                                                                                               type="text"
                                                                                               placeholder="">
                                                                                    </label><br>
                                                                                    <label>예상 기간 (일)<span
                                                                                                class="set_st">*</span>
                                                                                        <input class="form-control03 "
                                                                                               type="text"
                                                                                               placeholder="">
                                                                                    </label><br><span class="gry">프로젝트를 진행할 기간을 일 단위로 입력해 주세요. (최대 3자리, 예 : 10일)</span><br><br>
                                                                                    <label>지출 가능 예산 (원)<span
                                                                                                class="set_st">*</span>
                                                                                        <input class="form-control03"
                                                                                               type="text"
                                                                                               placeholder="">
                                                                                    </label><br><span class="gry">지출 가능한 예산을 입력해 주세요. ( VAT 별도, 예 : 100,000,000)</span><br><br>
                                                                                    <label>기획상태<span
                                                                                                class="set_st">*</span><br>
                                                                                        <label class="label_n02"
                                                                                               for="e01"><input
                                                                                                    name="eee" id="e01"
                                                                                                    type="radio"
                                                                                                    value="e01">아이디어만
                                                                                            있습니다.</label><br>
                                                                                        <label class="label_n02"
                                                                                               for="e02"><input
                                                                                                    name="eee" id="e02"
                                                                                                    type="radio"
                                                                                                    value="e02">필요한 내용들을
                                                                                            간단히 정리했습니다.</label><br>
                                                                                        <label class="label_n02"
                                                                                               for="e03"><input
                                                                                                    name="eee" id="e03"
                                                                                                    type="radio"
                                                                                                    value="e03">상세한 기획
                                                                                            문서가
                                                                                            존재합니다.</label>
                                                                                    </label><br><br>
                                                                                    <label>프로젝트 내용<span
                                                                                                class="set_st">*</span>
        <textarea name="p_intro" class="form-control05" id="p_intro" rows="4" cols="40" autocomplete="off">&lt;프로젝트 진행 방식&gt;
예시) 시작시점에 미팅, 주 1회 미팅 등


&lt;프로젝트의 현재 상황&gt;
예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등


&lt;상세한 업무 내용&gt;
예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등


&lt;참고자료 / 유의사항&gt;
예시) 참고사이트, 기타 유의사항 등
        </textarea></label><br>
                                                                                    <span class="rd"><span
                                                                                                class="rd_box">주의</span> 이메일, 전화번호 등을 게시하는 경우 서비스 이용에 제재를 받을 수 있습니다.</span><br><br>
                                                                                    <label>관련기술<span
                                                                                                class="set_st">*</span>
                                                                                        <input class="form-control03"
                                                                                               type="text"
                                                                                               placeholder="">
                                                                                    </label><br><span class="gry">다수의 관련 기술을 입력 할때에는 쉼표(,)로 구분해 주세요. (최대 5개)<br>
        예) Photoshop, Android, HTML5, Python, Django</span>
                                                                                </form>
                                                                            </div>


                                                                            <div class="margin-bottom-20 padding-bottom-30">
                                                                                <label for="ca002">모집 마감일자<span
                                                                                            class="set_st">*</span><br>
                                                                                    <select name="ca002"
                                                                                            class="form-control03"
                                                                                            id="form_of_birth01">
                                                                                        <option>2016년 2월 29일</option>
                                                                                        <option>등록 후 2일 날짜</option>
                                                                                        <option>등록 후 3일 날짜</option>
                                                                                        <option>등록 후 4일 날짜</option>
                                                                                        <option>등록 후 5일 날짜</option>
                                                                                        <option>등록 후 6일 날짜</option>
                                                                                        <option>등록 후 7일 날짜</option>
                                                                                    </select>
                                                                                </label><br><span class="gry">지원자를 모집하는 기간입니다. 최소 1일에서 최대 14일까지 가능합니다.</span><br><br>
                                                                                <label for="ca003">사전미팅<span
                                                                                            class="set_st">*</span><br>
                                                                                    <select name="ca003"
                                                                                            class="form-control03"
                                                                                            id="form_of_birth01">
                                                                                        <option>오프라인 미팅</option>
                                                                                        <option>온라인 미팅 (카카오톡, skype, 행아웃
                                                                                            등)
                                                                                        </option>
                                                                                    </select>
                                                                                </label><br><span class="gry">사전 미팅 방식을 선택해주세요.<br>
        마음에 드는 지원자와의 미팅을 크라우드엠에서 주선해드립니다.</span><br><br>
                                                                                <label for="ca004">사전 미팅 지역<span
                                                                                            class="set_st">*</span><br>
                                                                                    <select name="ca004"
                                                                                            class="form-control03"
                                                                                            id="form_of_birth01">
                                                                                        <option value="">선택</option>
                                                                                        <option value="1">서울특별시</option>
                                                                                        <option value="2">부산광역시</option>
                                                                                        <option value="3">대구광역시</option>
                                                                                        <option value="4">인천광역시</option>
                                                                                        <option value="5">광주광역시</option>
                                                                                        <option value="6">대전광역시</option>
                                                                                        <option value="7">울산광역시</option>
                                                                                        <option value="8">세종특별자치시
                                                                                        </option>
                                                                                        <option value="9">경기도</option>
                                                                                        <option value="10">강원도</option>
                                                                                        <option value="11">충청북도</option>
                                                                                        <option value="12">충청남도</option>
                                                                                        <option value="13">전라북도</option>
                                                                                        <option value="14">전라남도</option>
                                                                                        <option value="15">경상북도</option>
                                                                                        <option value="16">경상남도</option>
                                                                                        <option value="17">제주특별자치도
                                                                                        </option>
                                                                                    </select>
                                                                                </label><br>
                                                                                <label for="ca002">프로젝트 예상 시작일<span
                                                                                            class="set_st">*</span><br>
                                                                                    <select name="ca002"
                                                                                            class="form-control03"
                                                                                            id="form_of_birth01">
                                                                                        <option>2016년 2월 29일</option>
                                                                                        <option>등록 후 2일 날짜</option>
                                                                                        <option>등록 후 3일 날짜</option>
                                                                                        <option>등록 후 4일 날짜</option>
                                                                                        <option>등록 후 5일 날짜</option>
                                                                                        <option>등록 후 6일 날짜</option>
                                                                                        <option>등록 후 7일 날짜</option>
                                                                                    </select>
                                                                                </label><br><br>
                                                                                <label>프로젝트 매니징 경험<span
                                                                                            class="set_st">*</span><br>
                                                                                    <label class="label_n02"
                                                                                           for="m01"><input name="mmm"
                                                                                                            id="m01"
                                                                                                            type="radio"
                                                                                                            value="m01">있습니다.</label>
                                                                                    &nbsp;
                                                                                    <label class="label_n02"
                                                                                           for="m02"><input name="mmm"
                                                                                                            id="m02"
                                                                                                            type="radio"
                                                                                                            value="m02">없습니다.</label>
                                                                                </label>
                                                                                <button class="button005 margin-top-10"
                                                                                        type="submit">프로젝트등록하기
                                                                                </button>

                                                                            </div>
                                                                        </div>
                                                                    </article>


                                                                    <div class="form-group">
                                                                        <button class="btn btn-1 btn-primary btn-o back-step btn-wide pull-left">
                                                                            <i class="fa fa-circle-arrow-left"></i> Back
                                                                        </button>
                                                                        <button class="btn btn-1 btn-primary btn-o next-step btn-wide pull-right">
                                                                            Next
                                                                            <i class="fa fa-arrow-circle-right"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="content" id="step-3" style="display: none;">
                                                            <div class="row">

                                                                <div class="col-md-12">


                                                                    <article>
                                                                        <div class="signup02">
                                                                            <div class="margin-bottom-40 padding-bottom-40">
                                                                                <h4 class="p_add_h4">프로젝트를 등록해주셔서
                                                                                    감사합니다.</h4>
<span class="p_add_span">크라우드엠 내부 검수 후에 지원자 모집이 시작됩니다.<br>
검수에는 <strong>최대 24시간</strong>이 소요되며, 크라우드엠 매니저가 정확한 검수를 위해 유선 또는 이메일 연락을 할 수 있습니다.</span>

                                                                                <div class="margin-top-30 padding-top-30 img_f">
                                                                                    <img src="/images/i_icon.png">
<span class="p_add_span">
검수 결과는 <strong>이메일과 SMS</strong>를 통해 발송해드립니다.<br>
검수에 대한 문의는 <strong>고객센터(1661-8863)</strong>를 이용해주세요.
</span>
                                                                                </div>

                                                                                <a class="button005 margin-top-10"
                                                                                   href="{{url('/')}}">메인화면으로 이동</a>
                                                                            </div>

                                                                        </div>
                                                                    </article>


                                                                    <div class="form-group">
                                                                        <button class="btn btn-primary btn-o back-step btn-wide pull-left">
                                                                            <i class="fa fa-circle-arrow-left"></i> Back
                                                                        </button>
                                                                        <button class="btn btn-primary btn-o next-step btn-wide pull-right">
                                                                            Next
                                                                            <i class="fa fa-arrow-circle-right"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content" id="step-4" style="display: none;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="text-center">
                                                                        <h1 class=" ti-check block text-primary"></h1>
                                                                        <h2 class="StepTitle">Congratulations!</h2>
                                                                        <p class="text-large">
                                                                            Your tutorial is complete.
                                                                        </p>
                                                                        <p class="text-small">
                                                                            Thank you for your registration. Your
                                                                            transaction has been completed, and a
                                                                            receipt for your purchase has been emailed
                                                                            to you. You may log into your account to
                                                                            view details of this transaction.
                                                                        </p>
                                                                        <a class="btn btn-primary btn-o go-first"
                                                                           href="javascript:void(0)"> Back to first
                                                                            step </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="actionBar content">
                                                        <div class="msgBox">
                                                            <div class="content"></div>
                                                            <a class="close" href="#">X</a></div>
                                                        <div class="loader">Loading</div>
                                                        <a class="buttonFinish buttonDisabled" href="#">Finish</a><a
                                                                class="buttonNext" href="#">Next</a><a
                                                                class="buttonPrevious buttonDisabled"
                                                                href="#">Previous</a></div>
                                                </div>
                                                <div class="actionBar">
                                                    <div class="msgBox">
                                                        <div class="content"></div>
                                                        <a class="close" href="#">X</a></div>
                                                    <div class="loader">Loading</div>
                                                    <a class="buttonFinish buttonDisabled" href="#">Finish</a><a
                                                            class="buttonNext" href="#">Next</a><a
                                                            class="buttonPrevious buttonDisabled" href="#">Previous</a>
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
        jQuery(document).ready(function() {
            Main.init();
            FormWizard.init();
        });
    </script>



    @include('include.footer')
@endsection