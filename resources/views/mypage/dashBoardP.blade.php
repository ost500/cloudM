@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">

                <!--
                        <div class="heading text-left margin-bottom-20">
                          <h4>프로젝트 검색</h4>
                        </div>
                        <div class="coupen">
                          <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
                        </div>
                -->

                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-sider-bar003">
                            <h5 class="side-tittle">파트너스</h5>
                            <div>
                                @if($loginUser->profileImage != null)
                                    <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                                @else
                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                                @endif

                                <h6>{{ $loginUser->name }}</h6>
                                <a href="{{ url("/setting") }}">
                                    <div id="tag02">
                                        <div class="button">기본정보수정</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <h5 class="side-tittle">파트너스 히스토리</h5>
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th>지원한 프로젝트</th>
                                    <td>{{ count($app) }}건</td>
                                </tr>
                                <tr>
                                    <th>계약한 프로젝트</th>
                                    <td>{{ count($carryon) }}건</td>
                                </tr>
                                <tr>
                                    <th>완료한 프로젝트</th>
                                    <td>{{ count($compeleted) }}건</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">

                        <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                            <span class="h3 text-bold">마이 패스트엠</span>
                            <a class="mypage_link" href="{{ url('/services') }}">처음 오셨나요? 이용방법을 확인하세요 > </a>
                        </div>

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
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">지원한 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                        <col style="width:45%;"/>
                                                        <col style="width:15%;"/>
                                                        <col style="width:12.5%;"/>
                                                        <col style="width:12.5%;"/>
                                                        <col style="width:15%;"/>
                                                        <tr>
                                                            <th>프로젝트 제목</th>
                                                            <th>월예산</th>
                                                            <th>기간</th>
                                                            <th>마감</th>
                                                            <th>상태</th>
                                                        </tr>
                                                        @if(sizeof($app) == 0)
                                                            <td colspan="7">지원한 프로젝트가 없습니다</td>
                                                        @endif
                                                        @foreach($app as $appItem)

                                                            <tr>
                                                                <td><a
                                                                            href="{{ url("detail/".$appItem->project->id) }}"  class="text-left">{{ $appItem->project->title }}</a>
                                                                </td>
                                                                <td>{{ number_format($appItem->project->budget) }}원</td>
                                                                <td>{{ $appItem->project->estimated_duration }}</td>
                                                                <td>{{ $appItem->project->deadline }}</td>
                                                                <td>{{ $appItem->choice }}</td>
                                                            </tr>

                                                        @endforeach
                                                    </table>

                                                </div>
                                            </div>


                                            <div class="job-tittle03 margin-bottom-10">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">진행 중인 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                        <col style="width:16.6%;"/>
                                                        <col style="width:16.6%;"/>
                                                        <col style="width:16.6%;"/>
                                                        <col style="width:16.6%;"/>
                                                        <col style="width:16.6%;"/>
                                                        <col style="width:16.6%;"/>
                                                        <tr>
                                                            <th>프로젝트 제목</th>
                                                            <th>클라이언트</th>
                                                            <th>비용</th>
                                                            <th>마감일자</th>
                                                            <th>상태</th>

                                                        </tr>
                                                        @if(sizeof($carryon) == 0)
                                                            <td colspan="5">진행 중인 프로젝트가 없습니다</td>
                                                        @endif
                                                        @foreach($carryon as $carryonItem)

                                                            <tr>
                                                                <td><a
                                                                            href="{{url("/detail/".$carryonItem->id)}}">{{ $carryonItem->title }}</a>
                                                                </td>
                                                                <td>{{ $carryonItem->client->name }}</td>
                                                                <td>{{ number_format($carryonItem->budget) }}</td>
                                                                <td>{{ $carryonItem->deadline }}</td>
                                                                <td>{{ $carryonItem->step }}</td>
                                                            </tr>

                                                        @endforeach
                                                    </table>


                                                </div>

                                                <div class="job-tittle03 margin-bottom-10">
                                                    <h6 class="my_h6 margin-bottom-10 margin-top-20">완료 프로젝트</h6>
                                                    <div class="panel02 panel-default02">
                                                        <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <col style="width:16.6%;"/>
                                                            <tr>
                                                                <th>프로젝트 제목</th>
                                                                <th>클라이언트</th>
                                                                <th>비용</th>
                                                                <th>마감일자</th>
                                                                <th>상태</th>

                                                            </tr>
                                                            @if(sizeof($compeleted) == 0)
                                                                <tr>
                                                                    <td colspan="5">완료 프로젝트가 없습니다</td>
                                                                </tr>
                                                            @endif
                                                            @foreach($compeleted as $done)

                                                                <tr>

                                                                    <td><a
                                                                                href="{{ url("/detail/".$done->id) }}">{{ $done->title }}</a>
                                                                    </td>
                                                                    <td>{{ $done->client->name }}</td>
                                                                    <td>{{ number_format($done->budget) }}</td>
                                                                    <td>{{ $done->deadline }}</td>
                                                                    <td>{{ $done->step }}</td>

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
            </div>
        </section>
    </div>


    </div>

    <script type="text/javascript">
        <!--
        $('#fileModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pid = button.data('pid')

            var modal = $(this)
            modal.find(".modal-body input[name$='p_id']").val(pid)
        });
        //-->
    </script>

    @include('include.footer')
@endsection

