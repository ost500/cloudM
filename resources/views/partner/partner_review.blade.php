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
                            @if($eval->isEmpty())
                                <div class="text-center panel-body">
                                    <p class="text-center padding-bottom-15"><i class="fa fa-comments fa-5x"></i></p>
                                    평가가 없습니다
                                </div>
                            @endif
                            @foreach($eval as $each_eval)
                                <div class="panel02 panel-default02 margin-top-20">
                                    <div class="panel-heading03">
                                        <div>
                                            <ul>
                                                <li class="panel-heading03_title">{{$each_eval->project->title}}</li>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body04">
                                        <ul>
                                            <li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i>
                                                계약일 {{$each_eval->project->contract->contract_date}}
                                            </li>
                                            <li class="col-xs-4"><i class="fa fa-krw"></i>
                                                계약금액 {{$each_eval->project->contract->contract_pay}}원
                                            </li>
                                            <li class="col-xs-4"><i class="fa fa-clock-o"></i>
                                                계약기간 {{$each_eval->project->estimated_duration}}</li>
                                        </ul>
                                    </div>
                                    <div class="panel-body05">
                                        <ul>
                                            <li>
                                                <div>광고주 별점</div>
                                                <div class="rating star-lg star-lg-{{round($each_eval->star,0)}}"></div>
                                                <div>{{round($each_eval->star,1)}}</div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="panel-body06">
                                        <span><img class="partner_profile03" src="/images/p_img02.png"></span>
                                        <div>
                                            <span class="rd_box02">광고주</span><span><strong>{{$each_eval->project->client->nick}}</strong></span><br>
                                            <span>{{$each_eval->evaluation}}</span>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection