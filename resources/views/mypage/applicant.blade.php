@extends('include.head')
@section('content')
    <div id="content">
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">
                <div class="coupen">
                    <p class="h3 text-bold"><span>{{ $project[0]->title }}</span> 캠페인의 지원자 목록</p>
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
                                                <div class="content">1. 지원자들의 회사소개서, 상품소개서, 맞춤제안서, 지원내용을 꼼꼼히 살펴보세요.</div>
                                                <div class="content">2. 미팅은 최대2명까지 신청 가능합니다. 취소는 불가하니 신중히 선택해 주세요.</div>
                                                <div class="content">3. 계약을 원하는 업체를 선정하면 계약부터 대금보관, 대금지급까지 대행해 드립니다.</div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="panel padding-top-20">
                                        <div class="tabbable">
                                            <ul id="myTab1" class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#myTab1_example1" data-toggle="tab" aria-expanded="true"> 전체 지원자 <span class="badge">{{ $count['app_count'] }}</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example2" data-toggle="tab" aria-expanded="false"> 미팅요청 지원자 <span class="badge">{{ $count['app_meeting_count'] }}</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example3" data-toggle="tab" aria-expanded="false"> 관심 지원자 <span class="badge">{{ $count['app_interest_count'] }}</span> </a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example4" data-toggle="tab" aria-expanded="false"> 탈락 지원자 <span class="badge">{{ $count['app_out_count'] }}</span></a>
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
                                                    @if($count['app_out_count'] == 0)
                                                        <tr>
                                                            <td colspan="5">탈락 지원자가 없습니다</td>
                                                        </tr>
                                                    @else
                                                        @foreach($applist as $app_list)
                                                            @if($app_list->choice == '숨김' )
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

