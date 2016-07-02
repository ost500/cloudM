@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">
                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-sider-bar003">
                            @if($loginUser->PorC == "P")
                                <h5 class="side-tittle">파트너스</h5>
                            @else
                                <h5 class="side-tittle">클라이언트</h5>
                            @endif
                            <div>
                                <div class="col-md-3">
                                    @if($loginUser->profileImage != null)
                                        <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}">
                                    @else
                                        <img class="partner_profile02" src="/images/p_img02.png">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <p class="side-title-name">{{ $loginUser->name }}</p>
                                    <a href="/setting">
                                        <div id="tag02">
                                            <div class="button">기본정보수정</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <h5 class="side-tittle">세부 메뉴</h5>
                            <table class="history_table">
                                <tbody>

                                <tr>
                                    <th>등록 프로젝트</th>
                                    <td>{{ count($registered) }}건</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">
                        <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                            <span class="h3 text-bold">등록 프로젝트</span>
                            <p class="padding-top-10">관리자 검수를 거쳐서 지원자를 모집중인 프로젝트 입니다.</p>
                        </div>

                        <!-- Job Content -->
                        <div id="accordion">

                            <!-- Job Section -->
                            <div class="job-content job-post-page">
                                <!-- Job Tittle -->
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <!-- PANEL HEADING -->
                                        <div class="panel-heading">
                                            <div class="job-tittle03">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">등록 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                        <col style="width:40%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:15%;"/>
                                                        <tr>
                                                            <th>프로젝트 제목</th>
                                                            <th>등록일자</th>
                                                            <th>마감일자</th>
                                                            <th>지원자수</th>
                                                            <th>상태</th>
                                                        </tr>
                                                        @if(count($registered) == 0)
                                                            <tr>
                                                                <td colspan="5">등록된 프로젝트가 없습니다.</td>
                                                            </tr>
                                                        @endif
                                                        @foreach($registered as $registeredItem)
                                                            <tr>
                                                                <td style="text-align:left;"><a
                                                                            href="{{url("/detail/".$registeredItem->id)}}">{{ $registeredItem->title }}</a>
                                                                </td>
                                                                <td>{{ substr($registeredItem->created_at, 0, 10) }}</td>
                                                                <td>{{ $registeredItem->deadline}}</td>
                                                                <td>
                                                                    <a href="{{ url('/applist/'.$registeredItem->id) }}">{{ $registeredItem->applications_cnt}}
                                                                        명</a></td>
                                                                <td>{{ $registeredItem->step }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
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


                    </div>
                </div>
            </div>
        </section>
    </div>




    @include('include.footer')
@endsection

