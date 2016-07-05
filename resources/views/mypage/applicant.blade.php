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
                                                    <a href="#myTab1_example3" data-toggle="tab" aria-expanded="false"> 관심 지원자 </a>
                                                </li>
                                                <li class="">
                                                    <a href="#myTab1_example3" data-toggle="tab" aria-expanded="false"> 탈락 지원자 </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content padding-top-20">
                                                <div class="tab-pane fade active in" id="myTab1_example1">

                                                    @if($count['app_count'] == 0)
                                                        <div class="col-md-12 padding-0">지원자가 없습니다</div>
                                                    @else

                                                    @foreach($applist as $app_list)
                                                        @if($app_list->choice == '광고주 검수중')
                                                            <div class="col-md-10 padding-0">
                                                                <div class="row">
                                                                    <div class="col-md-2 text-center">
                                                                        @if($app_list->user['profileImage'] != null)
                                                                            <img class="partner_profile02"
                                                                                 src="{{ URL::asset($app_list->user['profileImage']) }}"><br>
                                                                        @else
                                                                            <img class="partner_profile02" src="/images/p_img02.png"><br>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        {{ $app_list->user['name'] }}

                                                                        <div class="rating star-lg star-lg-0"></div>
                                                                        <span class="rating-stats-body stats-body">
                                                                            <span class="average-rating-score padding-left-10">{{ 0.0 }}</span>
                                                                            <span class="rating-append-unit append-unit pull-right">/ 평가 0개</span>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row padding-top-30">
                                                                    <div class="col-md-2 text-center">지원내용</div>
                                                                    <div class="col-md-10">{{ $app_list->content }}</div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <form action="{{ url('/applist/meeting') }}"
                                                                      method="POST" role="form">
                                                                    {!! csrf_field() !!}
                                                                    <input name="id" type="hidden"
                                                                           value="{{ $app_list['id']}}">
                                                                    <td>
                                                                        <button class="button004"
                                                                                type="submit">미팅신청
                                                                        </button>
                                                                    </td>

                                                                </form>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    @endif


                                                </div>
                                                <div class="tab-pane fade" id="myTab1_example2">
                                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                        <col style="width:40%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <tr>
                                                            <th>프로젝트 제목</th>
                                                            <th>등록일자</th>
                                                            <th>마감일자</th>
                                                            <th>지원자수</th>
                                                            <th>취소</th>
                                                            <th>계약</th>
                                                        </tr>

                                                        @if($count['app_meeting_count'] == 0)
                                                            <tr>
                                                                <td colspan="5">미팅신청자가 없습니다</td>
                                                            </tr>
                                                        @else

                                                            @foreach($applist as $app_list)

                                                                @if($app_list->choice == '미팅')

                                                                    <tr>
                                                                        <td>{{ $app_list->user->name }}</td>
                                                                        <td>{{ $app_list->project->title }}</td>
                                                                        <td>30일</td>
                                                                        <td>2016.01.21</td>
                                                                        <form action="{{ url('/applist/meetingCancel') }}"
                                                                              method="POST" role="form">
                                                                            {!! csrf_field() !!}
                                                                            <input name="id" type="hidden"
                                                                                   value="{{ $app_list['id'] }}">
                                                                            <td>
                                                                                <button class="button004"
                                                                                        type="submit">취소
                                                                                </button>
                                                                            </td>
                                                                        </form>
                                                                        <form action="{{ url('/applist/contract') }}"
                                                                              method="POST" role="form">
                                                                            {!! csrf_field() !!}
                                                                            <input name="id" type="hidden"
                                                                                   value="{{ $app_list['id'] }}">
                                                                            <td>
                                                                                <button class="button004"
                                                                                        type="submit">계약
                                                                                </button>
                                                                            </td>
                                                                        </form>
                                                                    </tr>

                                                                @endif

                                                            @endforeach
                                                        @endif
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="myTab1_example3">
                                                    <p>
                                                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
                                                    </p>
                                                    <p>
                                                        Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                                                    </p>
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

