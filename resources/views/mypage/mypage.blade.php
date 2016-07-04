@extends('layouts.master_layout')
@section('right_content')
    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        <div class="job-content job-post-page">
            <!-- Job Tittle -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <!-- PANEL HEADING -->
                    <div class="panel-heading">
                        <div class="job-tittle02">
                            <div class="media-body02 padding-bottom-10">
                                <h3 class="margin-bottom-0">{{ $loginUser->name }}</h3>
                            </div>
                            <span class="media-body-sm">
                                <ul class="tags dall">
                                    <i class="fa pull-left"></i>
                                    <li>전문분야</li>
                                    @foreach($loginUser->partners->job()->get() as $jobs)
                                        <li><a href="#.">{{ $jobs->job }}</a></li>
                                    @endforeach
                                </ul>
                            </span>
                            <span class="media-body-sm"><i class="fa fa-user"></i> {{ $loginUser->company_type }}</span>
                            <span class="media-body-sm">
                                 @if($loginUser->auth_check == "인증완료")
                                    <i class="fa fa-check-circle-o"></i> 신원인증
                                @else
                                    <i class="fa fa-times "></i> 신원미인증
                                @endif
                            </span>
                            <span class="media-body-sm la-line">
                                 @if(strlen($loginUser->phone_num) > 8)
                                    <i class="fa fa-check-circle-o"></i> 연락처등록
                                @else
                                    <i class="fa fa-times "></i> 연락처미등록
                                @endif
                            </span>

                            <div class="tags_bg02 margin-top-20 padding-top-5">
                                <h6 class="my_h6 margin-bottom-10">활동요약정보</h6>


                                <div class="row">
                                    <ul>
                                        <div class="col-md-2">
                                            <li>
                                                <div class="rating star-lg star-lg-4"></div>
                                            </li>
                                        </div>
                                        <div class="col-md-3">
                                            <li><span class="rating-stats-body stats-body">
                                            <span class="average-rating-score">4.2</span>
                                            <span class="rating-append-unit append-unit">/ 평가 20개</span>
                                        </span></li>
                                        </div>

                                        <div class="col-md-4">
                                            <li><span class="partners-authorized"><i
                                                            class="fa fa-bars"></i> 계약한 프로젝트 <span> 0건</span></span>
                                            </li>
                                        </div>
                                        <div class="col-md-3">
                                            <li><span class="partners-authorized"><i
                                                            class="fa fa-file-image-o"></i> 포트폴리오 <span> 0개</span></span>
                                            </li>
                                        </div>


                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">자기소개</h6>
                            <a style="cursor:pointer" id="intro_edit_button"
                               class="button002 signup002 margin-top-12">
                                수정하기
                            </a>
                            <div id="textarea_location"><?php echo nl2br($loginUser->partners['intro']); ?> </div>
                            {{$errors->first('intro')}}
                        </div>
                        <script>
                            $("#intro_edit_button").click(function () {
                                var display_result = $("#textarea_location");
                                $.ajax({
                                    url: "/mypage/intro_edit",
                                    success: function (result) {
                                        display_result.html(result);
                                        $("#intro_edit_button").hide();
                                    }

                                });
                            });
                        </script>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>
                            <a href="{{ url('portfolio_list/'.$loginUser->id) }}"
                               class="button002 signup002 margin-top-12">더 보기</a>

                            <div class="row">

                                @foreach($portfolios as $portfolio)
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <div class="thum_imgbox">
                                                <a href="{{ url('/portfolio/'.$portfolio->id) }}"><img src="{{ $portfolio->image1 }}" alt="" class="img-responsive"></a>
                                            </div>
                                            <div class="caption">
                                                <a href="{{ url('/portfolio/'.$portfolio->id) }}"><h3 class="thum_title">{{ $portfolio->title }}</h3></a>
                                                <p class="thum_category">{{ $portfolio->area }} > {{ $portfolio->category }}</p>
                                                <p><a href="{{ url('/portfolio/'.$portfolio->id) }}" class="btn btn-primary margin-top-10" role="button">자세히보기</a></p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>


                        <div class="job-tittle02">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">전문분야</h6>
                            <a style="cursor:pointer" id="edit_skill_button"
                               class="button002 signup002 margin-top-12">수정하기</a>

                            <div class="panel02 panel-default02 margin-top-20">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:33.3%;"/>
                                    <col style="width:33.3%;"/>
                                    <col style="width:33.3%;"/>

                                    <tr>
                                        <th>종류</th>
                                        <th>숙련도</th>
                                        <th>경험</th>

                                    </tr>
                                    <tbody id="skill_list">
                                    @if($loginUser->partners->job()->get()->isEmpty())
                                        <tr>
                                            <td colspan="3">전문기술이 없습니다</td>
                                        </tr>
                                    @endif
                                    @foreach($loginUser->partners->job()->get() as $job)
                                        <tr>
                                            <td>{{ $job->job }}</td>
                                            <td>{{ $job->number }}</td>
                                            <td>{{ $job->experience }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div id="skill_input_form" hidden
                                 class="panel02 panel-default02 margin-top-20">
                                <form id="skill_form">
                                    {!! csrf_field() !!}
                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                        <col style="width:33.3%;"/>
                                        <col style="width:33.3%;"/>
                                        <col style="width:33.3%;"/>

                                        <tr>

                                            <td><select id="title" name="title" class="form-control02">
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



                                                </select>
                                                <br>
                                                <div id="title_error"></div>
                                            </td>
                                            <td><select id="job_option" name="number" class="form-control02">
                                                    <option selected="selected" value="">급</option>


                                                    <option value="초급">초급</option>
                                                    <option value="중급">중급</option>
                                                    <option value="고급">고급</option>
                                                    <option value="특급">특급</option>





                                                </select><br>
                                                <div id="number_error"></div>
                                            </td>
                                            <td><select id="job_option" name="experience" class="form-control02">
                                                    <option selected="selected" value="">경험</option>

                                                    <option value="1년 이하">1년 이하</option>
                                                    <option value="1년 이상 ~ 3년 이하">1년 이상 ~ 3년 이하</option>
                                                    <option value="3년 이상 ~ 5년 이하">3년 이상 ~ 5년 이하</option>
                                                    <option value="5년 이상 ~ 10년 이하">5년 이상 ~ 10년 이하</option>
                                                    <option value="10년 이상">10년 이상</option>

                                                </select><br>
                                                <div id="experience_error"></div>
                                            </td>
                                        </tr>
                                    </table>

                                </form>
                                <button id="skill_input_button" class="button004">입력</button>
                            </div>

                            <script>
                                $("#edit_skill_button").click(function () {
                                    $.ajax({
                                        type: 'GET',
                                        url: '/mypage/skill_list',
                                        success: function (data) {
                                            $("#skill_list").html(data);
                                        }
                                    });
                                    $("#skill_input_form").show();
                                });
                                $("#skill_input_button").click(function () {
                                    $.ajax({
                                        type: 'POST',
                                        url: '/mypage/skill_edit',
                                        data: $("#skill_form").serialize(),
                                        success: function (data) {
                                            $("#skill_list").html(data);
                                            $("#title").val("");
                                            $("#experience").val("");
                                            $("#number").val("");
                                            $("#title_error").html("");
                                            $("#number_error").html("");
                                            $("#experience_error").html("");
                                            $.ajax({
                                                type: 'GET',
                                                url: '/mypage/skill_list',
                                                success: function (data) {
                                                    $("#skill_list").html(data);
                                                }
                                            });
                                        },
                                        error: function (data) {

                                            try {
                                                $("#title_error").html(data.responseJSON.title[0]);

                                            } catch (ex) {
                                                $("#title_error").html("");
                                            }
                                            try {
                                                $("#number_error").html(data.responseJSON.number[0]);

                                            } catch (ex) {
                                                $("#number_error").html("");
                                            }
                                            try {
                                                $("#experience_error").html(data.responseJSON.experience[0]);

                                            } catch (ex) {
                                                $("#experience_error").html("");
                                            }
                                        }
                                    });
                                });


                            </script>


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
@endsection

