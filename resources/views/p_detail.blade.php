@extends('include.head')
@section('content')

    @foreach($detailProject as $project)

        <!-- Content -->
        <div id="content" xmlns="http://www.w3.org/1999/html">

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

                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
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
                                                        class="fa fa-krw"></i> 예상금액 <span>{{ number_format($project['budget']) }}</span></span>
                                            <span class="media-body-sm"><i
                                                        class="fa fa-clock-o"></i> 예상기간 <span>{{ $project['estimated_duration'] }} </span></span>
                                                    <span class="media-body-sm la-line"><i
                                                                class="fa fa-calendar-minus-o"></i> 모집마감 <span>2016년 3월 31일 </span></span>
                                                    <div style="clear:both;"></div>

                                                    <div class="panel02 panel-default02 margin-top-20">

                                                        <div class="panel-heading03">
                                                            <div class="row">
                                                                <span class="col-xs-2"><strong>목적</strong></span>
                                                                <span class="col-xs-2"><strong>매니징경험</strong></span>
                                                                <span class="col-xs-2"><strong>등록일자</strong></span>
                                                                <span class="col-xs-2"><strong>예상시작일</strong></span>
                                                                <span class="col-xs-2"><strong>미팅방식</strong></span>
                                                                <span class="col-xs-2"><strong>진행지역</strong></span>

                                                            </div>
                                                        </div>
                                                        <div class="panel-body03">
                                                            <ul>
                                                                <li class="row">
                                                                    <span class="col-xs-2">{{ $project['purpose'] }}</span>
                                                                    <span class="col-xs-2">{{ $project['managing_experience'] }}</span>
                                                                    <span class="col-xs-2">{{ $project['created_at'] }}</span>
                                                                    <span class="col-xs-2">{{ $project['expected_start_date'] }}</span>
                                                                    <span class="col-xs-2">{{ $project['meeting_way'] }}</span>
                                                                    <span class="col-xs-2">{{ $project['address_sido'] }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(App\Project::find($project['id'])->step == "게시" || App\Project::find($project['id'])->step == "미팅")
                                                    <a style="cursor:pointer" id="pro_app_btn">
                                                        <div class="button006 margin-top-10 margin-bottom-20">프로젝트 지원하기
                                                        </div>
                                                    </a>
                                                @endif
                                                <?php

                                                echo '<script>';
                                                echo '$("#pro_app_btn").click(function(){';
                                                if (!Auth::check()) {
                                                    echo '$("#loginModal").modal("show");';
                                                } else if (Auth::user()->PorC == "C") {
                                                    echo 'alert("파트너가 아닙니다")';
                                                } else if (App\Application::where('u_id', '=', Auth::user()->id, 'and', 'p_id', '=', $project['id'])->get()->isEmpty() == false) {
                                                    echo 'alert("이미 지원하셨습니다")';
                                                } else {
                                                    echo 'window.location = "' . url("/apply/" . $project['id']) . '";';
                                                }
                                                echo '});';
                                                echo '</script>';

                                                ?>


                                                <div style="clear:both;"></div>
                                                <div class="p_search02_txt margin-top-20">
                                                    <h5>프로젝트 내용</h5>

                                                    <?php echo nl2br($project['detail_content']); ?><br><br>






                                                    <div class="margin-top-10">
                                                        <span class="media-body-sm margin-top-23">관련기술</span>
                                                        <ul class="tags dall margin-top-20 margin-bottom-10">
                                                            <li><a href="#.">{{ $project['area'] }}</a></li>
                                                            <li><a href="#.">{{ $project['category'] }}</a></li>
                                                        </ul>
                                                    </div>


                                                </div>

                                                @if(App\Project::find($project['id'])->step == "게시" || App\Project::find($project['id'])->step == "미팅")
                                                    <a style="cursor:pointer" id="pro_app_big_btn">
                                                        <div class="button006 margin-top-10 margin-bottom-20">프로젝트 지원하기
                                                        </div>
                                                    </a>
                                                @endif
                                                <?php

                                                echo '<script>';
                                                echo '$("#pro_app_big_btn").click(function(){';
                                                if (!Auth::check()) {
                                                    echo '$("#loginModal").modal("show");';
                                                } else if (Auth::user()->PorC == "C") {
                                                    echo 'alert("파트너가 아닙니다")';
                                                } else if (App\Application::where('u_id', '=', Auth::user()->id, 'and', 'p_id', '=', $project['id'])->get()->isEmpty() == false) {
                                                    echo 'alert("이미 지원하셨습니다")';
                                                } else {
                                                    echo 'window.location = "' . url("/apply/" . $project['id']) . '";';
                                                }
                                                echo '});';
                                                echo '</script>';

                                                ?>


                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="job-content job-post-page margin-top-20 padding-bottom-20">
                                <h5>프로젝트 문의</h5>

                                @foreach($comment as $comments)
                                    <div class="inquiry_01">
                                        <span><img class="partner_profile03" src="/images/p_img02.png"></span>
                                        <div>
                                            <span><strong>dkdlel123</strong></span><br>
                                            <span>{{ $comments['comment'] }}</span>
                                        </div>
                                    </div>
                                @endforeach

                                <form action="{{ url('commentadd') }}" method="POST" role="form">
                                    {!! csrf_field() !!}
                                    <div class="media inquiry_01">
                                        <img class="partner_profile03" src="/images/p_img02.png">
                                        <div class="media-body">
                                            <div class="col-md-9 ">
                                    <textarea name="comment" type="text" class="form-control06" id="id_body" required=""
                                              rows="10"
                                              cols="40" resize="none"></textarea>
                                            </div>
                                            <div class="col-md-3 ">
                                                <input name="comment_status" id="comment_status" type="checkbox">
                                                <label for="comment_status"><i class="fa fa-lock"
                                                                               style="margin-right: 4px;"></i>비공개
                                                    설정</label>
                                                <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                                                <button type="submit" class="button007" id="id_submit" type="button"
                                                        value="작성하기"/>

                                            </div>
                                            <br>
                                            <div style="clear:both;"></div>
                                            <small class="text-warning02">프로젝트 문의에 작성한 내용은 수정 및 삭제가 불가능합니다.</small>
                                        </div>
                                        <span class="rd"><span class="rd_box">주의</span> 이메일, 전화번호 등을 게시하여 직거래를 유도하는 경우, 서비스 이용에 제재를 받을 수 있습니다.</span>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </section>
        </div>


    @endforeach


    @include('include.footer')
@endsection