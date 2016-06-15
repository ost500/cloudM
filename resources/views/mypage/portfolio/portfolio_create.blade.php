@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">

                <!--
                        <div class="heading text-left margin-bottom-20">
                          <h4>프로젝트 검색</h4>
                        </div>
                        <div class="coupen">
                          <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
                        </div>
                -->

                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-sider-bar003">
                            @if($loginUser->PorC == "P")
                                <h5 class="side-tittle">파트너스</h5>
                            @else
                                <h5 class="side-tittle">클라이언트</h5>
                            @endif
                            <div>
                                @if($loginUser->profileImage != null)
                                    <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                                @else
                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                                @endif
                                <h6>{{ $loginUser->name }}</h6>
                                <a href="{{ url("/setting") }}">
                                    <div id="tag02">
                                        <div class="button">기본정보수정</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">


                        <!-- Job Content -->
                        <div id="accordion">

                            <!-- Job Section -->
                            <div class="job-content job-post-page">
                                <!-- Job Tittle -->
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <!-- Save -->
                                        <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                                        <!-- PANEL HEADING -->
                                        <div class="panel-heading">


                                            <div class="job-tittle02 txt_color_g">
                                                <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>


                                                <div id="wizard" class="swMain">
                                                    <div class="stepContainer"
                                                         style="height: 558px; padding-top:30px;">
                                                        <form action="{{ url("/portfolio/create") }}" method="post"
                                                              role="form" class="smart-wizard" id="form"
                                                              novalidate="novalidate" enctype="multipart/form-data">
                                                            {!! csrf_field() !!}
                                                            <div id="step-1" class="content" style="display: block;">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 제목 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                   name="title"
                                                                                   aria-required="true"
                                                                                   aria-describedby="title-error"><span
                                                                                    id="title-error"
                                                                                    class="help-block valid"
                                                                                    style="display: none;"></span>
                                                                            <div class="checkbox_css">
                                                                                <input type="checkbox" name="checkbox1"
                                                                                       id="checkbox1" value="option1">
                                                                                <label for="checkbox1">클라우드엠에서 진행한 프로젝트
                                                                                    입니다.</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 분야 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                            <select class="form-control"
                                                                                    name="area"
                                                                                    aria-required="true"
                                                                                    aria-describedby="area-error">
                                                                                <option value="">선택</option>
                                                                                <option value="광고 의뢰">광고 의뢰</option>
                                                                                <option value="운영 대행">운영 대행</option>
                                                                                <option value="Viral">Viral</option>
                                                                                <option value="1회성 프로젝트">1회성 프로젝트</option>
                                                                                <option value="기타">기타</option>
                                                                            </select><span id="area-error"
                                                                                           class="help-block valid"
                                                                                           style="display: none;"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 업종 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
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
                                                                                <option value="교육/대학교">교육/대학교</option>
                                                                                <option value="쇼핑몰">쇼핑몰</option>
                                                                                <option value="기타">기타</option>
                                                                            </select><span id="category-error"
                                                                                           class="help-block valid"
                                                                                           style="display: none;"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 설명 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                    <textarea name="description" class="form-control"
                                                                              rows=10 aria-required="true"
                                                                              aria-describedby="description-error"
                                                                              aria-invalid="false"></textarea>
                                                                            <span class="gry">한글 기준 5000자 이내로 작성해주세요.</span>
                                                                            <span id="description-error"
                                                                                  class="help-block valid"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-success">

                                                                            <label class="control-label"> 참여 시작일 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label><br>
                                                                            <input type="date" class="form-control"
                                                                                   name="from_date">
                                                                            <span id="from_date-error"
                                                                                  class="help-block valid"
                                                                                  style="display: none;"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 참여 종료일 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label><br>
                                                                            <input type="date" class="form-control"
                                                                                   name="to_date">
                                                                            <span id="to_date-error"
                                                                                  class="help-block valid"
                                                                                  style="display: none;"></span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 참여율 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label><br>
                                                                            <input type="text" class="form-control"
                                                                                   name="participation_rate"
                                                                                   aria-required="true"
                                                                                   aria-describedby="name-error"
                                                                                   style="width:49.6%"><span
                                                                                    class="percent">%</span><span
                                                                                    id="participation_rate-error"
                                                                                    class="help-block valid"
                                                                                    style="display: none;"></span><br>
                                                                            <span class="gry">참여율은 1에서 100까지 정수로 입력할 수 있습니다.</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="port_guide img_f">
                                                                        <img src="/images/i_icon.png"
                                                                             style="margin-top:2px;">
                                                                        <div class="p_add_span"
                                                                             style="padding-left:69px;">
                                                                            <strong>[포트폴리오 추가 가이드]</strong><br>
                                                                            포트폴리오 이미지는 가로 775px로 변환되어 보입니다.<br>
                                                                            이미지 파일(.jpg, .jpeg, .png, .gif 등)만 업로드할 수
                                                                            있습니다.<br>
                                                                            파일 크기는 최대 8MB까지 업로드가 가능합니다.
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 대표이미지 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                            <div class="filebox">
                                                                                <input
                                                                                        id="image1"
                                                                                       class="upload-name"
                                                                                       value="이미지를 등록해주세요"
                                                                                       disabled="disabled" aria-required="true"
                                                                                        aria-describedby="image1-error">
                                                                                <label class="upload_button" for="ex_filename" >이미지 업로드</label>
                                                                                <input name="image1" type="file"
                                                                                       id="ex_filename" accept="jpg,jpeg,png,gif">
                                                                                <span
                                                                                id="image1-error"
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


                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 이미지2 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                            <div class="filebox">
                                                                                <input id="image2_name"
                                                                                        class="upload-name"
                                                                                       value="두번째 이미지를 등록해주세요"
                                                                                       disabled="disabled">
                                                                                <label class="upload_button" for="ex_filename2">이미지 업로드</label>
                                                                                <input name="image2" type="file" id="ex_filename2"
                                                                                       class="upload-hidden" accept="jpg,jpeg,png,gif">
                                                                                <script>
                                                                                    $("#ex_filename2").change(function (ev) {

                                                                                        $("#image2_name").val(this.value);
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group has-success">
                                                                            <label class="control-label"> 이미지3 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                            <div class="filebox">
                                                                                <input id="image3_name"
                                                                                        class="upload-name"
                                                                                       value="세번째 이미지를 등록해주세요"
                                                                                       disabled="disabled" accept="jpg,jpeg,png,gif">
                                                                                <label class="upload_button" for="ex_filename3">이미지 업로드</label>
                                                                                <input name="image3" type="file" id="ex_filename3"
                                                                                       class="upload-hidden">
                                                                                <script>
                                                                                    $("#ex_filename3").change(function (ev) {
                                                                                        alert(this.value);
                                                                                        $("#image3_name").val(this.value);
                                                                                    });
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--<div class="col-md-12">--}}
                                                                    {{--<div class="form-group has-success">--}}
                                                                    {{--<label class="control-label"> 한줄설명 <span--}}
                                                                    {{--class="symbol ok"--}}
                                                                    {{--aria-required="true"></span>--}}
                                                                    {{--</label>--}}
                                                                    {{--<input type="text" class="form-control"--}}
                                                                    {{--name="name"--}}
                                                                    {{--aria-required="true"--}}
                                                                    {{--aria-describedby="name-error"><span--}}
                                                                    {{--id="name-error"--}}
                                                                    {{--class="help-block valid"--}}
                                                                    {{--style="display: none;"></span>--}}
                                                                    {{--<span class="gry">한글 기준 120자 미만</span>--}}
                                                                    {{--</div>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-12">--}}
                                                                        {{--<div class="form-group has-success">--}}
                                                                            {{--<label class="control-label"> 태그 <span--}}
                                                                                        {{--class="symbol ok"--}}
                                                                                        {{--aria-required="true"></span>--}}
                                                                            {{--</label>--}}
                                                                            {{--<ul class="checkbox_css02">--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0001"--}}
                                                                                           {{--id="checkbox0001"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0001">Photoshop</label>--}}
                                                                                {{--</li>--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0002"--}}
                                                                                           {{--id="checkbox0002"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0002">Android</label>--}}
                                                                                {{--</li>--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0003"--}}
                                                                                           {{--id="checkbox0003"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0003">HTML5</label>--}}
                                                                                {{--</li>--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0004"--}}
                                                                                           {{--id="checkbox0004"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0004">Python</label>--}}
                                                                                {{--</li>--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0005"--}}
                                                                                           {{--id="checkbox0005"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0005">Photoshop</label>--}}
                                                                                {{--</li>--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0006"--}}
                                                                                           {{--id="checkbox0006"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0006">Android</label>--}}
                                                                                {{--</li>--}}
                                                                                {{--<li>--}}
                                                                                    {{--<input type="checkbox"--}}
                                                                                           {{--name="checkbox0007"--}}
                                                                                           {{--id="checkbox0007"--}}
                                                                                           {{--value="option1">--}}
                                                                                    {{--<label for="checkbox0007">HTML5</label>--}}
                                                                                {{--</li>--}}
                                                                            {{--</ul>--}}
                                                                            {{--<div class="clear"></div>--}}
                                                                            {{--<span class="gry">최대 5개까지 입력 가능합니다.</span>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}

                                                                </div>
                                                                <!--<p class="text-small">
                                                                 <a href="javascript:void(0)" data-content="Your personal information is not required for unlawful purposes, but only in order to proceed in this tutorial" data-title="Don't worry!" data-placement="top" data-toggle="popover" data-original-title="" title=""> 왜 개인정보가 필요한가요? </a>
                                                                </p>-->


                                                                <button type="submit"
                                                                        class="btn btn-1 btn-primary btn-o finish-step btn-wide pull-right">
                                                                    Finish <i class="fa fa-arrow-circle-right"></i>
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <!-- Content -->
                                        <!--<div id="job1" class="panel-collapse collapse in">
                                          <div class="panel-body">
                                            <p> [프로젝트 진행 방식] 시작시점에 미팅, 주 1회 미팅 등 [프로젝트의 현재 상황] 리뉴얼 기획 제안서만 있음 [상세한 업무 내용] 반응형 웹 제작 [참고자료 / 유의사항] http://www.skhynix.com/kor/index.jsp 와 같은 톤앤매너 구상</p>


                                            </div>
                                          </div>-->


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
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

    <script>


        $("#form").validate({
            rules: {
                title: "required",
                area:"required",
                category:"required",
                description: {required:true, maxlength:10000},
                from_date: {required:true,date: true},
                to_date: {required:true,date: true},
                participation_rate: {required:true,
                                        range:[0,100]},
                image1: {required:true,extension: "jpg|jpeg|png|gif"},
                image2: {extension: "jpg|jpeg|png|gif"},
                image3: {extension: "jpg|jpeg|png|gif"},

            },
            messages: {
                title: "제목을 입력해 주세요",
                area: "분야를 선택해 주세요",
                category: "업종을 선택해 주세요",
                description: "입력해 주세요",
                from_date: "참여 시작일을 입력해 주세요",
                to_date: "참여 종료일을 입력해 주세요",
                participation_rate: "참여율을 입력해 주세요",
                image1: {required:"업로드해 주세요",
                    extension:"이미지 파일을 확인해 주세요"},
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
            extension:"이미지 파일을 확인해 주세요"
        });

    </script>





    @include('include.footer')
@endsection

