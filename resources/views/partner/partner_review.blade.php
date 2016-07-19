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
                            <h6 class="partner_title">{{ $partner->user->nick }} 님의 클라이언트 평가 입니다.</h6>

                            <div class="text-center panel-body">
                                <p class="text-center padding-bottom-15"><i class="fa fa-comments fa-5x"></i></p>
                                평가가 없습니다
                            </div>

                            {{--<div class="panel02 panel-default02 margin-top-20">--}}
                                {{--<div class="panel-heading03">--}}
                                    {{--<div>--}}
                                        {{--<ul>--}}
                                            {{--<li class="panel-heading03_title">CPS 머천트 사이트 PC 및 모바일--}}
                                                {{--웹디자인,--}}
                                                {{--퍼블리싱--}}
                                            {{--</li>--}}
                                            {{--<li class="panel-heading03_title02">클라이언트 &nbsp;--}}
                                                {{--<strong>benbro</strong>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="panel-body04">--}}
                                    {{--<ul>--}}
                                        {{--<!--<li class="row">--}}
                                          {{--<span class="col-xs-4">계약일 2015년12월12일</span>--}}
                                          {{--<span class="col-xs-4">계약금액 5,000,000원</span>--}}
                                          {{--<span class="col-xs-4">계약기간 100일</span>--}}
                                        {{--</li>-->--}}

                                        {{--<li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i>--}}
                                            {{--계약일--}}
                                            {{--2015년12월12일--}}
                                        {{--</li>--}}
                                        {{--<li class="col-xs-4"><i class="fa fa-krw"></i> 계약금액--}}
                                            {{--5,000,000원--}}
                                        {{--</li>--}}
                                        {{--<li class="col-xs-4"><i class="fa fa-clock-o"></i> 계약기간 100일--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="panel-body05">--}}
                                    {{--<ul>--}}
                                        {{--<li>--}}
                                            {{--<div>광고주 별점</div>--}}
                                            {{--<div class="rating star-lg star-lg-4"></div>--}}
                                            {{--<div>4.8</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}

                                {{--<div class="panel-body06">--}}
                                {{--<span><img class="partner_profile03"--}}
                                           {{--src="/images/p_img02.png"></span>--}}
                                    {{--<div>--}}
                                        {{--<span class="rd_box02">광고주</span><span><strong>dkdlel123</strong></span><br>--}}
                                        {{--<span>중간에 시안이 여러번 바뀌었음에도 잘 지원 해주신 부분이나, 추가 수정 요청부분에 잘 지원해 주신 부분이 좋았습니다. 디자인 퀄리티도 만족 합니다!</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            {{--<div class="panel02 panel-default02 margin-top-10">--}}
                                {{--<div class="panel-heading03">--}}
                                    {{--<div>--}}
                                        {{--<ul>--}}
                                            {{--<li class="panel-heading03_title">CPS 머천트 사이트 PC 및 모바일--}}
                                                {{--웹디자인,--}}
                                                {{--퍼블리싱--}}
                                            {{--</li>--}}
                                            {{--<li class="panel-heading03_title02">클라이언트 &nbsp;--}}
                                                {{--<strong>benbro</strong>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="panel-body04">--}}
                                    {{--<ul>--}}
                                        {{--<li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i>--}}
                                            {{--계약일--}}
                                            {{--2015년12월12일--}}
                                        {{--</li>--}}
                                        {{--<li class="col-xs-4"><i class="fa fa-krw"></i> 계약금액--}}
                                            {{--5,000,000원--}}
                                        {{--</li>--}}
                                        {{--<li class="col-xs-4"><i class="fa fa-clock-o"></i> 계약기간 100일--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="panel-body05">--}}
                                    {{--<ul>--}}
                                        {{--<li>--}}
                                            {{--<div>광고주 별점</div>--}}
                                            {{--<div class="rating star-lg star-lg-4"></div>--}}
                                            {{--<div>4.8</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}

                                {{--<div class="panel-body06">--}}
                                {{--<span><img class="partner_profile03"--}}
                                           {{--src="/images/p_img02.png"></span>--}}
                                    {{--<div>--}}
                                        {{--<span class="rd_box02">광고주</span><span><strong>dkdlel123</strong></span><br>--}}
                                        {{--<span>중간에 시안이 여러번 바뀌었음에도 잘 지원 해주신 부분이나, 추가 수정 요청부분에 잘 지원해 주신 부분이 좋았습니다. 디자인 퀄리티도 만족 합니다!</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection