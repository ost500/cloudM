@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">진행 프로젝트</span>
        <p class="padding-top-10">미팅 후 계약하고, 업무 진행중인 프로젝트 입니다. </p>
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
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">진행중 프로젝트</h6>
                            <div class="panel02 panel-default02">

                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:25.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:20%;"/>
                                    <tr>
                                        <th>프로젝트 제목</th>
                                        <th>지원비용</th>
                                        <th>기간</th>
                                        <th>제출일자</th>
                                        <th>상태</th>
                                        <th>게시판</th>

                                    </tr>
                                    @if(count($proceeding) == 0)
                                        <tr>
                                            <td colspan="5">진행중인 프로젝트가 없습니다.</td>
                                        </tr>
                                    @endif
                                    @foreach($proceeding as $proceedingItem)
                                        <tr>
                                            <td>
                                                <a href="{{ url("/detail/".$proceedingItem->id) }}">{{ $proceedingItem->title }}</a>
                                            </td>
                                            <td>{{ number_format($proceedingItem->budget) }}</td>
                                            <td>{{ $proceedingItem->estimated_duration }}</td>
                                            <td>{{ $proceedingItem->deadline }}</td>
                                            <td>{{ $proceedingItem->step }}</td>
                                            <td>
                                                <a href="{{ url("/client/project/carryon/".$proceedingItem->id) }}">게시판</a>
                                            </td>
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
@endsection

