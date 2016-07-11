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
                                <h3 class="margin-bottom-0">{{ $partner['user']->nick }}</h3>
                            </div>

                            <div class="row">
                                <span class="media-body-sm"><i class="fa fa-at"></i> 전문분야</span>

                                <span class="media-body-sm la-line">
                                    <ul class="tags ">
                                    @foreach($partner->job()->get() as $jobs)
                                        <li><a href="#.">{{ $jobs->job }}</a></li>
                                    @endforeach
                                    </ul>
                                </span>
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
                                                            class="fa fa-file-image-o"></i> 포트폴리오 <span> 0개</span></span>
                                            </li>
                                        </div>


                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">자기소개</h6>
                            <a href="{{ url('partner/'.$partner->user_id.'/intro') }}" class="more_btn margin-top-20">더보기></a>


                            {{ $partner->intro }}

                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">포트폴리오</h6>
                            <a href="{{ url('/partner/'.$partner->user->id.'/portfolio') }}"
                               class="more_btn margin-top-20">더보기 ></a>
                            <div class="row padding-left-15">
                                @if($partner->portfolio->isEmpty())
                                    포트폴리오가 없습니다
                                @endif
                                @foreach($portfolios as $portfolio)
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <div class="thum_imgbox">
                                                <a href="{{ route('partner_portfolio_detail',['user_id' =>$loginUser->id, 'id' =>$portfolio->id]) }}"><img
                                                            src="{{ $portfolio->image1 }}" alt=""
                                                            class="img-responsive"></a>
                                            </div>
                                            <div class="caption">
                                                <a href="{{ route('partner_portfolio_detail',['user_id' =>$loginUser->id, 'id' =>$portfolio->id]) }}">
                                                    <h3 class="thum_title">{{ $portfolio->title }}</h3>
                                                </a>
                                                <p class="thum_category">{{ $portfolio->area }}
                                                    > {{ $portfolio->category }}</p>
                                                <p><a href="{{ route('partner_portfolio_detail',['user_id' =>$loginUser->id, 'id' =>$portfolio->id]) }}"
                                                      class="btn btn-primary margin-top-10"
                                                      role="button">자세히보기</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">전문분야</h6>
                            <a href="{{ url('partner/'.$partner->user_id.'/job') }}" class="more_btn margin-top-20">더보기 ></a>
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
                                    @if($partner->job()->get()->isEmpty())
                                        <tr>
                                            <td colspan="3">전문분야가 없습니다</td>
                                        </tr>
                                    @endif
                                    @foreach($partner->job()->get() as $job)
                                        <tr>
                                            <td>{{ $job->job }} {{ $job->number }}</td>
                                            <td>{{ $job->number }}</td>
                                            <td>{{ $job->experience }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
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
                            평가가 없습니다

                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection