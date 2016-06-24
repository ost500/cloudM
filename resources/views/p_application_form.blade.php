@extends('include.head')
@section('content')

    @foreach($detailProject as $project)

        <!-- Content -->
        <div id="content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

            <!-- Job -->
            <section class="job padding-top-15 padding-bottom-70">
                <div class="container">

                    <div class="coupen">
                        <p><span>프로젝트 상세</span> - 내가 찾는 프로젝트를 검색해보세요.</p>
                    </div>

                    <!-- Side Bar -->
                    <div class="row">
                        <div class="col-md-3">


                            <div class="job-sider-bar003">
                                <h5 class="side-tittle">광고주</h5>
                                <div>
                                    @if($project->client->profileImage != null)
                                        <img class="partner_profile02"
                                             src="{{ URL::asset($project->client->profileImage) }}"><br>
                                    @else
                                        <img class="partner_profile02" src="/images/p_img02.png"><br>
                                    @endif

                                </div>
                                <h5 class="text-center">{{ $project->client->name }}</h5>
                                <span class="side-tittle_txt01">{{ $project->client->intro }}</span>
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
                                                <div class="job-tittle03">

                                                    <div class="media-body02">
                                                        <h3 class="margin-bottom-20">{{ $project['title'] }}</h3>
                                                    </div>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-krw"></i> 월 예산 <span>{{ number_format($project['budget']) }}</span></span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-clock-o"></i> 예상기간 <span>{{ $project['estimated_duration'] }} </span></span>
                                                    <span class="media-body-sm la-line"><i
                                                                class="fa fa-calendar-minus-o"></i> 모집마감 <span>{{ $project['deadline'] }} </span></span>
                                                    <div style="clear:both;"></div>

                                                    <div class="panel02 panel-default02 margin-top-20">

                                                        <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <tr>
                                                                <th>기획상태</th>
                                                                <th>마케팅 경험</th>
                                                                <th>등록일자</th>
                                                                <th>예상시작일</th>
                                                                <th>미팅방식</th>
                                                                <th>진행지역</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $project['purpose'] }}</td>
                                                                <td>{{ $project['managing_experience'] }}</td>
                                                                <td>{{ date_format($project['created_at'],'Y-m-d') }}</td>
                                                                <td>{{ $project['expected_start_date'] }}</td>
                                                                <td>{{ $project['meeting_way'] }}</td>
                                                                <td>{{ $project['address_sido'] }}</td>
                                                            </tr>
                                                        </table>

                                                        {{--<div class="panel-heading03">--}}
                                                        {{--<div class="row">--}}
                                                        {{--<span class="col-xs-2"><strong>목적</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>매니징경험</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>등록일자</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>예상시작일</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>미팅방식</strong></span>--}}
                                                        {{--<span class="col-xs-2"><strong>진행지역</strong></span>--}}

                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="panel-body03">--}}
                                                        {{--<ul>--}}
                                                        {{--<li class="row">--}}
                                                        {{--<span class="col-xs-2">{{ $project['purpose'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['managing_experience'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['created_at'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['expected_start_date'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['meeting_way'] }}</span>--}}
                                                        {{--<span class="col-xs-2">{{ $project['address_sido'] }}</span>--}}
                                                        {{--</li>--}}
                                                        {{--</ul>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                </div>


                                                <div style="clear:both;"></div>
                                                <div class="p_search02_txt margin-top-20">
                                                    <h5>프로젝트 내용</h5>

                                                    <?php echo nl2br($project['detail_content']); ?><br><br>


                                                    <div class="margin-top-10">
                                                        <span class="media-body-sm margin-top-23">관련기술</span>
                                                        <ul class="tags dall margin-top-20 margin-bottom-10">
                                                            @foreach($project->projects_area as $areas)
                                                                <li><a href="#.">{{ $areas->area }}</a></li>
                                                            @endforeach
                                                            <li><a href="#.">{{ $project['category'] }}</a></li>
                                                        </ul>
                                                    </div>


                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="wizard" class="swMain">
                                <div class="job-content job-post-page margin-top-20 padding-bottom-20">
                                    <h5>{{ $project->title }}의 지원서 작성</h5>
                                    <form action="{{ url("/apply/".$project->id) }}" method="post" role="form"
                                          class="smart-wizard" id="form"
                                          novalidate="novalidate" enctype="multipart/form-data" accept-charset="UTF-8">
                                        {!! csrf_field() !!}

                                        <div class="col-md-20">


                                            <fieldset>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"> 지원 금액 <span
                                                                        class="symbol required"></span>
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   name="money" aria-required="true"
                                                                   aria-describedby="money-error"
                                                                   value=""><span
                                                                    id="money-error"
                                                                    class="help-block valid"
                                                                    style="display: none;"></span>

                                                        </div>
                                                        <p class="text-small">
                                                            <a data-original-title="" title="">※ 수수료 10%를 포함한 가격입니다</a>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label"> 지원 기간 <span
                                                                        class="symbol required"></span>
                                                            </label>
                                                            <input id="duration" type="text" name="duration"
                                                                   class="form-control" placeholder="3개월"

                                                            ><span
                                                                    id="phone-error"
                                                                    class="help-block valid"
                                                                    style="display: none;"></span>
                                                        </div>
                                                        <p class="text-small">
                                                            <a data-original-title="" title="">※ 월 단위로 입력해 주세요</a>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> 지원 내용 <span
                                                                        class="symbol required"></span></label>
                                                    <textarea name="contents"
                                                              class="form-control"
                                                              rows=10 aria-required="true"
                                                    ></textarea>
                                                        </div>
                                                        <p class="text-small">
                                                            <a href="javascript:void(0)"
                                                               data-content="이메일, 전화번호 등을 게시하는 경우 서비스 이용에 제재를 받을 수 있습니다."
                                                               data-title="주의사항!" data-placement="top"
                                                               data-toggle="popover"
                                                               data-original-title="" title="">※이메일,
                                                                전화번호 등 게시금지</a>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label"> 관련 포트폴리오 <span
                                                                        class="symbol required"></span></label>
                                                        </div>
                                                        <div class="radio">

                                                            <div class="col-md-4">
                                                                <input class="radio" type="radio" id="radio1"
                                                                       name="has_portfolio" value="true"><label
                                                                        for="radio1">관련 포트폴리오가 있습니다</label>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <input class="radio" type="radio" id="radio2"
                                                                       name="has_portfolio"
                                                                       checked="checked" value="false"><label
                                                                        for="radio2">관련 포트폴리오가 없습니다</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"> 첨부파일 <span
                                                                        class="symbol"></span>
                                                            </label>
                                                            <div class="form-group">
                                                                <input class="form-control" type="file"
                                                                       name="application_attach"
                                                                       id="application_attach"/>

                                                            </div>
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
                                                <button type="submit"
                                                        class="btn btn-1 btn-primary btn-o next-step btn-wide pull-right">
                                                    제출 <i class="fa fa-arrow-circle-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>




    @endforeach

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
                money: "required",
                duration: "required",
                contents: "required",

                application_attach: {
                    extension: "zip",

                },

            },
            messages: {
                money: "지원 금액을 입력해 주세요",
                duration: "지원 기간을 입력해 주세요",
                contents: "지원 내용을 입력해 주세요",

                application_attach: {
                    required: "업로드해 주세요",
                    extension: "파일을 다시 확인해 주세요"
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
            extension: "파일을 다시 확인해 주세요"
        });

    </script>



    @include('include.footer')
@endsection