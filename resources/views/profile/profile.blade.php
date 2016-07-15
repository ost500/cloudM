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
                                <h3 class="margin-bottom-0">{{ $loginUser->nick }}</h3>
                            </div>
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

                            <span class="media-body-sm la-line">
                                @if($loginUser->partners->proposal_file_name && file_exists(public_path().$loginUser->partners->proposal_file_name))
                                    <i class="fa fa-check-circle-o"></i> 상품소개서 등록
                                @else
                                    <i class="fa fa-times "></i> 상품소개서 미등록
                                @endif
                            </span>

                            <span class="media-body-sm la-line">
                                @if($loginUser->partners->company_file_name && file_exists(public_path().$loginUser->partners->company_file_name))
                                    <i class="fa fa-check-circle-o"></i> 회사소개서 등록
                                @else
                                    <i class="fa fa-times "></i> 회사소개서 미등록
                                @endif
                            </span>

                            <div class="tags_bg02 margin-top-20 padding-top-5">
                                <h6 class="my_h6 margin-bottom-10">활동요약정보</h6>


                                <div class="row">
                                    <ul>
                                        <div class="col-md-2">
                                            <li>
                                                <div class="rating star-lg star-lg-0"></div>
                                            </li>
                                        </div>
                                        <div class="col-md-3">
                                            <li><span class="rating-stats-body stats-body">
                                            <span class="average-rating-score">0.0</span>
                                            <span class="rating-append-unit append-unit">/ 평가 0개</span>
                                        </span></li>
                                        </div>

                                        <div class="col-md-4">
                                            <li><span class="partners-authorized"><i
                                                            class="fa fa-bars"></i> 계약한 프로젝트 <span> 0건</span></span>
                                            </li>
                                        </div>
                                        <div class="col-md-3">
                                            <li><span class="partners-authorized"><i
                                                            class="fa fa-file-image-o"></i> 포트폴리오 <span> {{ $portfolios->count() }}개</span></span>
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

                            <div id="textarea_location">
                            @if(!$loginUser->partners['intro'])
                                <div class="text-center panel-body">
                                    <p class="text-center padding-bottom-15"><i class="fa fa-user-secret fa-5x"></i></p>
                                    자기소개가 없습니다
                                </div>
                            @else
                                    <?php echo nl2br($loginUser->partners['intro']); ?>
                            @endif
                            </div>

                            <p class="validation-error">{{$errors->first('intro')}}</p>
                        </div>
                        <script>
                            $("#intro_edit_button").click(function () {
                                var display_result = $("#textarea_location");
                                $.ajax({
                                    url: "/profile/intro/edit",
                                    success: function (result) {
                                        display_result.html(result);
                                        $("#intro_edit_button").hide();
                                    }

                                });
                            });
                        </script>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>
                            <a href="{{ url('profile/portfolio/list/'.$loginUser->id) }}"
                               class="button002 signup002 margin-top-12">더 보기</a>

                            <div class="row">
                                @if($portfolios->isEmpty())
                                    <div class="text-center panel-body">
                                        <p class="text-center padding-bottom-15"><i class="fa fa-file-image-o fa-5x"></i></p>
                                        포트폴리오가 없습니다
                                    </div>
                                @else
                                    @foreach($portfolios as $portfolio)
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <div class="thum_imgbox">
                                                    <a href="{{ url('/profile/portfolio/'.$portfolio->id) }}"><img src="{{ $portfolio->image1 }}_228_200" alt="" class="img-responsive"></a>
                                                </div>
                                                <div class="caption">
                                                    <a href="{{ url('/profile/portfolio/'.$portfolio->id) }}"><h3 class="thum_title"><?php echo mb_strcut($portfolio->title, 0, 30) . ".."; ?> <?=($portfolio->top)?"<span class=\"port_title_box\">대표</span>":"" ?></h3></a>
                                                    <p class="thum_category">{{ $portfolio->area }} > {{ $portfolio->category }}</p>
                                                    <p><a href="{{ url('/profile/portfolio/'.$portfolio->id) }}" class="btn btn-primary margin-top-10" role="button">자세히보기</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">회사소개서</h6>
                            <a href="profile/company" class="button002 signup002 margin-top-12">수정하기</a>

                            <div id="textarea_location">
                                @if(!$loginUser->partners['company_file_name'])
                                    <div class="text-center panel-body">
                                        <p class="text-center padding-bottom-15"><i class="fa fa-file-powerpoint-o fa-5x"></i></p>
                                        회사소개서가 없습니다.
                                    </div>
                                @else
                                    @if($loginUser->partners['company_file_check'])
                                        <div class="text-center panel-body">
                                            <p class="text-center padding-bottom-15"><i class="fa fa-check-circle-o fa-5x"></i></p>
                                            성공적으로 등록되었습니다.
                                        </div>
                                    @else
                                        <div class="text-center panel-body">
                                            <p class="text-center padding-bottom-15"><i class="fa fa-exclamation-circle fa-5x"></i></p>
                                            패스트엠 검수중 입니다.
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="job-tittle02 txt_color_g ">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">상품소개서</h6>
                            <a href="profile/proposal" class="button002 signup002 margin-top-12">수정하기</a>

                            <div id="">
                                @if(!$loginUser->partners['proposal_file_name'])
                                    <div class="text-center panel-body">
                                        <p class="text-center padding-bottom-15"><i class="fa fa-file-powerpoint-o fa-5x"></i></p>
                                        상품소개서가 없습니다.
                                    </div>
                                @else
                                    @if($loginUser->partners['proposal_file_check'])
                                        <div class="text-center panel-body">
                                            <p class="text-center padding-bottom-15"><i class="fa fa-check-circle-o fa-5x"></i></p>
                                            성공적으로 등록되었습니다.
                                        </div>
                                    @else
                                        <div class="text-center panel-body">
                                            <p class="text-center padding-bottom-15"><i class="fa fa-exclamation-circle fa-5x"></i></p>
                                            패스트엠 검수중 입니다.
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">전문분야</h6>
                            <a style="cursor:pointer" id="edit_skill_button"
                               class="button002 signup002 margin-top-12">수정하기</a>

                            @if($loginUser->partners->job()->get()->isEmpty())
                                <div class="text-center panel-body">
                                    <p class="text-center padding-bottom-15"><i class="fa fa fa-wrench fa-5x"></i></p>
                                    전문분야가 없습니다
                                </div>
                            @else
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
                            @endif



                            <div id="skill_input_form" hidden
                                 class="panel02 panel-default02 margin-top-20">

                                <div class="panel02 panel-default02">
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
                                        </tbody>

                                    </table>
                                </div>


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



                                                </select>
                                                <br>
                                                <div id="title_error"></div>
                                            </td>
                                            <td><select id="job_option" name="number" class="form-control02">
                                                    <option selected="selected" value="">숙련도</option>
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
                                        url: '/profile/skill/list',
                                        success: function (data) {
                                            $("#skill_list").html(data);
                                        }
                                    });
                                    $("#skill_input_form").show();
                                });
                                $("#skill_input_button").click(function () {
                                    $.ajax({
                                        type: 'POST',
                                        url: '/profile/skill/edit',
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
                                                url: '/profile/skill/list',
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
                </div>
            </div>
        </div>
    </div>
@endsection

