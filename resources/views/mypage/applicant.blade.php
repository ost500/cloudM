@extends('include.head')
@section('content')
    <div id="content">
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">
                <div class="coupen">
                    <p class="h3 text-bold"><span>{{ $project[0]->title }}</span> 프로젝트의 지원자 목록</p>
                    <p class="padding-top-10">마음에 드는 지원자를 선정 후 미팅 요청을 하세요.</p>
                </div>

                <div class="row padding-top-15">
                    <div class="col-md-12">
                        <div id="accordion">
                            <div class="job-content job-post-page">

                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="port_guide img_f">
                                            <img src="/images/i_icon.png" style="margin-top:10px;">
                                            <div class="p_add_span padding-top-0 padding-left-60">
                                                <div class="content">1. 인증은 근무일 기준 24시간 이상 소요 되며</div>
                                                <div class="content">2. 인증은 근무일 기준 24시간 이상 소요 되며</div>
                                                <div class="content">3. 인증완료 후 서류 변경을 원하실 경우에는</div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="panel padding-top-20">
                                        <div class="tabbable">
                                            <ul id="myTab1" class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#myTab1_example1" data-toggle="tab" aria-expanded="true"> 전체 지원자 ({{ $applist->count() }})</a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example2" data-toggle="tab" aria-expanded="false"> 미팅요청 지원자 ({{ $count['app_meeting_count'] }})</a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example3" data-toggle="tab" aria-expanded="false"> 관심 지원자 ({{ $count['app_interest_count'] }}) </a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example4" data-toggle="tab" aria-expanded="false"> 탈락 지원자 ({{ $count['app_out_count'] }})</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content padding-top-20">
                                                <div class="tab-pane fade active in" id="myTab1_example1">

                                                    @if($count['app_count'] == 0)
                                                        <div class="col-md-12 padding-0">지원자가 없습니다</div>
                                                    @else
                                                    @foreach($applist as $app_list)
                                                        @if($app_list->choice == '광고주 검수중' || $app_list->choice == '미팅' || $app_list->choice == '관심')
                                                            @include('include.applicant_list')
                                                        @endif
                                                    @endforeach
                                                    @endif


                                                </div>
                                                <div class="tab-pane fade" id="myTab1_example2">

                                                        @if($count['app_meeting_count'] == 0)
                                                            <tr>
                                                                <td colspan="5">미팅신청자가 없습니다</td>
                                                            </tr>
                                                        @else
                                                        @foreach($applist as $app_list)
                                                            @if($app_list->choice == '미팅' )
                                                                @include('include.applicant_list')
                                                            @endif
                                                        @endforeach
                                                        @endif
                                                </div>
                                                <div class="tab-pane fade" id="myTab1_example3">
                                                    @if($count['app_interest_count'] == 0)
                                                        <tr>
                                                            <td colspan="5">관심 지원자가 없습니다</td>
                                                        </tr>
                                                    @else
                                                        @foreach($applist as $app_list)
                                                            @if($app_list->choice == '관심' )
                                                                @include('include.applicant_list')
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="tab-pane fade" id="myTab1_example4">
                                                    @if($count['app_interest_count'] == 0)
                                                        <tr>
                                                            <td colspan="5">탈락 지원자가 없습니다</td>
                                                        </tr>
                                                    @else
                                                        @foreach($applist as $app_list)
                                                            @if($app_list->choice == '탈락' )
                                                                @include('include.applicant_list')
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>

    @include('include.footer')
@endsection

