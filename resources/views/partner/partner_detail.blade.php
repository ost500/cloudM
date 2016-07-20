@extends('layouts.partner_layout')
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
                            <div class="media-body02">
                                <h3 class="margin-bottom-10 nick">{{ $partner['user']->nick }}</h3>
                            </div>

                            <span class="media-body-sm"><i class="fa fa-user"></i> {{ $partner['user']->company_type }}</span>
                            <span class="media-body-sm">
                                @if($partner['user']->auth_check == "인증완료")
                                    <i class="fa fa-check-circle-o"></i> {{ $partner['user']->auth_check }}
                                @else
                                    <i class="fa fa-times "></i> 신원미인증
                                @endif
                            </span>

                            <span class="media-body-sm la-line">
                                @if(strlen($partner['user']->phone_num) > 8)
                                    <i class="fa fa-check-circle-o"></i> 연락처등록
                                @else
                                    <i class="fa fa-times "></i> 연락처미등록
                                @endif
                            </span>

                            <span class="media-body-sm la-line">
                                @if($partner['proposal_file_name'] && file_exists(public_path().$partner['proposal_file_name']))
                                    <i class="fa fa-check-circle-o"></i> 상품소개서 등록
                                @else
                                    <i class="fa fa-times "></i> 상품소개서 미등록
                                @endif
                            </span>

                            <span class="media-body-sm la-line">
                                @if($partner['company_file_name'] && file_exists(public_path().$partner['company_file_name']))
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
                                                            class="fa fa-file-image-o"></i> 포트폴리오 <span> {{ $partner->portfolio->count() }}개</span></span>
                                            </li>
                                        </div>


                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">자기소개</h6>
                            <a href="{{ url('partner/'.$partner->user_id.'/intro') }}" class="more_btn margin-top-20">더보기></a>

                            @if(!$partner->intro)
                                <div class="text-center panel-body">
                                    <p class="text-center padding-bottom-15"><i class="fa fa-user-secret fa-5x"></i></p>
                                    자기소개가 없습니다
                                </div>
                            @else
                            <?=nl2br(mb_strcut($partner->intro, 0, 300))?>
                            @endif

                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">포트폴리오</h6>
                            <a href="{{ url('/partner/'.$partner->user->id.'/portfolio') }}"
                               class="more_btn margin-top-20">더보기 ></a>
                            <div class="row padding-left-15">
                                @if($partner->portfolio->isEmpty())
                                    <div class="text-center panel-body">
                                        <p class="text-center padding-bottom-15"><i class="fa fa-file-image-o fa-5x"></i></p>
                                        포트폴리오가 없습니다.
                                    </div>

                                @endif
                                @foreach($portfolios as $portfolio)
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <div class="thum_imgbox">
                                                <a href="{{ route('partner_portfolio_detail',['user_id' =>$partner->user_id, 'id' =>$portfolio->id]) }}"><img
                                                            src="{{ $portfolio->image1 }}_228_200" alt=""
                                                            class="img-responsive"></a>
                                            </div>
                                            <div class="caption">
                                                <a href="{{ route('partner_portfolio_detail',['user_id' =>$partner->user_id, 'id' =>$portfolio->id]) }}">
                                                    <h3 class="thum_title"><?=($portfolio->top)?mb_strcut($portfolio->title, 0, 30) . "..":mb_strcut($portfolio->title, 0, 38)?> <?=($portfolio->top)?"<span class=\"port_title_box\">대표</span>":"" ?></h3>
                                                </a>

                                                <p class="thum_category">
                                                <ul class="tags">
                                                    <?php
                                                    $areas = explode(",", $portfolio->area);
                                                    if (sizeof($areas) > 1) echo "<li><a href=\"#.\">{$areas[0]}</a></li> <li><a href=\"#.\">외". (sizeof($areas)-1) . "개</a></li>";
                                                    else echo "<li><a href=\"#.\">$portfolio->area</a></li>";
                                                    ?>
                                                     <li><a href="#."> {{ $portfolio->category }} 분야</a></li>
                                                </ul>
                                                </p>
                                                <p><a href="{{ route('partner_portfolio_detail',['user_id' =>$partner->user_id, 'id' =>$portfolio->id]) }}"
                                                      class="btn btn-primary margin-top-5"
                                                      role="button">자세히보기</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">전문분야</h6>
                            @if($partner->job()->get()->isEmpty())
                                <div class="text-center panel-body">
                                    <p class="text-center padding-bottom-15"><i class="fa fa fa-wrench fa-5x"></i></p>
                                    전문분야가 없습니다
                                </div>
                            @else
                            <div class="panel02 panel-default02 margin-top-20">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>

                                    <tr>
                                        <th>종류</th>
                                        <th>숙련도</th>
                                        <th>경험</th>

                                    </tr>
                                    <tbody id="skill_list">
                                    @foreach($partner->job()->take(3)->get() as $job)
                                        <tr>
                                            <td>{{ $job->job }} {{ $job->number }}</td>
                                            <td>{{ $job->number }}</td>
                                            <td>{{ $job->experience }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>


                        {{--<div class="job-tittle02">--}}
                        {{--<h6 class="my_h6 margin-bottom-10 margin-top-20">학력</h6>--}}
                        {{--<div class="panel02 panel-default02 margin-top-20">--}}
                        {{--<div class="panel-heading03">--}}
                        {{--<div class="row">--}}
                        {{--<span class="col-xs-2"><strong>학교명</strong></span>--}}
                        {{--<span class="col-xs-2"><strong>분류</strong></span>--}}
                        {{--<span class="col-xs-2"><strong>전공</strong></span>--}}
                        {{--<span class="col-xs-2"><strong>상태</strong></span>--}}
                        {{--<span class="col-xs-2"><strong>입학일</strong></span>--}}
                        {{--<span class="col-xs-2"><strong>졸업일</strong></span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body03">--}}
                        {{--<ul>--}}
                        {{--<li class="row">--}}
                        {{--<span class="col-xs-2">학력 학교명</span>--}}
                        {{--<span class="col-xs-2">학사</span>--}}
                        {{--<span class="col-xs-2">학력 전공</span>--}}
                        {{--<span class="col-xs-2">졸업</span>--}}
                        {{--<span class="col-xs-2">2016년 12월 30일</span>--}}
                        {{--<span class="col-xs-2">2016년 12월 30일</span>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        <div class="job-tittle02 ">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">평가</h6>
                            <a href="{{ url('partner/'.$partner->user_id.'/review') }}" class="more_btn margin-top-20">더보기
                                ></a>
                            <div class="text-center panel-body">
                                <p class="text-center padding-bottom-15"><i class="fa fa-comments fa-5x"></i></p>
                                평가가 없습니다
                            </div>

                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection