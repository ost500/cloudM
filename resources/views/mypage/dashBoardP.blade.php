@extends('layouts.master_layout')
@section('right_content')
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
                    </div>
                </div>
            </div>
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
@endsection

