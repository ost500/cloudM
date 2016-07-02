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
                                    <th><a href="{{ url('/my_apply') }}">지원한 프로젝트</a></th>
                                    <td>{{ count($app) }}건</td>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/my_apply_finished') }}">지원 종료 프로젝트</a></th>
                                    <td>{{ count($app_finished) }}건</td>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/my_interesting') }}">관심 프로젝트</a></th>
                                    <td>{{ count($interesting) }}건</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">
                        <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                            <span class="h3 text-bold">관심 프로젝트</span>
                            <p class="padding-top-5">관심 프로젝트를 확인할 수 있습니다.</p>
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
                                            <div class="job-tittle03 margin-bottom-10">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">관심 프로젝트</h6>
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
                                                        @if(sizeof($interesting) == 0)
                                                            <td colspan="5">관심 프로젝트가 없습니다</td>
                                                        @endif
                                                        @foreach($interesting as $interestingItem)

                                                            <tr>
                                                                <td><a
                                                                            href="{{url("/detail/".$interestingItem->id)}}">{{ $interestingItem->title }}</a>
                                                                </td>
                                                                <td>{{ $interestingItem->client->name }}</td>
                                                                <td>{{ number_format($interestingItem->budget) }}</td>
                                                                <td>{{ $interestingItem->deadline }}</td>
                                                                <td>{{ $interestingItem->step }}</td>
                                                            </tr>

                                                        @endforeach
                                                    </table>


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

