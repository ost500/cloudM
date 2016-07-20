@extends('include.head')
@section('content')

    @foreach($detailProject as $project)
        <!-- Content -->
        <div id="content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

            <!-- Job -->
            <section class="job padding-top-15 padding-bottom-70">
                <div class="container">
                    <!-- Side Bar -->
                    <div class="row">
                        <div class="col-md-3">

                            <div class="job-sider-bar003">
                                <h5 class="side-tittle">광고주</h5>
                                <div class="col-md-12 text-center">
                                    @if($project->client->profileImage != null)
                                        <img class="partner_profile_200"
                                             src="{{ URL::asset($project->client->profileImage) }}"><br>
                                    @else
                                        <img class="partner_profile0_150" src="/images/p_img02.png"><br>
                                    @endif
                                </div>

                                <div id="tag02" class="padding-20">
                                    <span class="side-tittle_txt01">{{ $project->client->intro }}</span>
                                </div>
                            </div>

                            <div class="job-sider-bar02">
                                <h5 class="side-tittle">클라이언트 정보</h5>
                                <table class="history_table">
                                    <tbody>
                                    <tr>
                                        <th>등록 프로젝트</th>
                                        <td>{{ $count['등록'] }}건</td>
                                    </tr>
                                    <tr>
                                        <th>계약한 프로젝트</th>
                                        <td>{{ $count['계약'] }}건</td>
                                    </tr>
                                    <tr>
                                        <th>계약률</th>
                                        <td>{{ $count['계약률'] }}%</td>
                                    </tr>
                                    <tr>
                                        <th>진행중 프로젝트</th>
                                        <td>{{ $count['진행'] }}건</td>
                                    </tr>
                                    <tr>
                                        <th>완료한 프로젝트</th>
                                        <td>{{ $count['완료'] }}건</td>
                                    </tr>
                                    {{--<tr>--}}
                                    {{--<th>평균 진행기간</th>--}}
                                    {{--<td>{{ $project->count() }}건</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<th>평균 집행비용</th>--}}
                                    {{--<td>{{ $project->count() }}건</td>--}}
                                    {{--</tr>--}}
                                    </tbody>
                                </table>
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
                                                    </div>
                                                </div>


                                                <div style="clear:both;"></div>
                                                <div class="p_search02_txt margin-top-20">
                                                    <h5>프로젝트 내용</h5>

                                                    <?php echo nl2br($project['detail_content']); ?><br><br>


                                                    <div class="margin-top-10">
                                                        <span class="media-body-sm margin-top-23">희망매체</span>
                                                        <ul class="tags margin-top-20 margin-bottom-10">
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
                                    <form action="{{ url("/apply/".$project->id) }}" method="post" role="form"
                                          class="smart-wizard form-horizontal" id="form"
                                          novalidate="novalidate" enctype="multipart/form-data" accept-charset="UTF-8">
                                        {!! csrf_field() !!}


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="port_guide img_f">
                                                    <img src="/images/i_icon.png" style="margin-top:12px;">
                                                    <p><span class="title">[프로젝트 지원 안내]</span>
                                                    <div class="content">1. 프로젝트 지원시 <strong>회사소개서</strong>, <strong>기본제안서</strong>를 등록하시고,<br><strong>맞춤 제안서</strong>를 함께 제출 하시면 선택 확률이 더 높아 집니다..</div></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-heading">
                                            <h5 class="panel-title">{{ $project->title }} 프로젝트의 지원서 작성</h5>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"><span class="symbol required"></span> 지원내용 </label>
                                            <div class="col-sm-10">
                                                <textarea autofocus name="contents"
                                                          class="form-control"
                                                          rows=10 aria-required="true"
                                                          placeholder="업체명, URL, 이메일, 연락처 등을 게시하지 마세요. 지원서는 관리자 검수 후에 광고주에게 노출 됩니다."
                                                        ></textarea>
                                                <p class="text-small validation-error">
                                                    업체명, URL, 이메일, 연락처 등을 게시하는 경우 서비스 이용에 제재를 받을 수 있습니다.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group margin-top-20">
                                            <label class="col-sm-2 control-label"><span class="symbol"></span> 포트폴리오 </label>
                                            <div class="col-sm-10">
                                                <div class="radio">
                                                    <input type="radio" id="radio1"
                                                        name="has_portfolio" value="true"><label
                                                        for="radio1">관련 포트폴리오가 있습니다</label>

                                                    <input type="radio" id="radio2"
                                                       name="has_portfolio"
                                                       checked="checked" value="false"><label
                                                        for="radio2">관련 포트폴리오가 없습니다</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group margin-top-40">
                                            <label class="col-sm-2 control-label"><span class="symbol"></span> 서류</label>
                                            <div class="col-sm-10">
                                                <table class="table_04">
                                                    <col style="width:20%;"/>
                                                    <col style="width:30%;"/>
                                                    <col style="width:20%;"/>
                                                    <col style="width:30%;"/>
                                                    <tr>
                                                        <th>회사소개서</th>
                                                        <td>
                                                            @if($partnerFile['company'])
                                                                {{ $partnerFile['company_origin_name'] }}
                                                            @else
                                                                <a href="{{ url("profile/company") }}">등록하러 가기</a>
                                                            @endif
                                                        </td>

                                                        <th>상품소개서</th>
                                                        <td>
                                                            @if($partnerFile['proposal'])
                                                                {{ $partnerFile['proposal_origin_name'] }}
                                                            @else
                                                                <a href="{{ url("profile/proposal") }}">등록하러 가기</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="form-group margin-top-20">
                                            <label class="col-sm-2 control-label"><span class="symbol"></span> 맞춤제안서 </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file"
                                                       name="application_attach"
                                                       id="application_attach"/>
                                            </div>
                                        </div>

                                        <div class="form-group text-center margin-top-50">
                                                <button class="btn btn-sm btn-dark-azure" type="submit">
                                                    지원하기
                                                </button>
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