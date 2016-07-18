@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
            <span class="h3 text-bold">진행 캠페인</span>
        <p class="padding-top-10">미팅 후 계약하고, 업무 진행중인 캠페인 입니다. </p>
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
                            <div class="panel02 panel-default02">

                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:40%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:15%;"/>
                                    <tr>
                                        <th>캠페인 제목</th>
                                        <th>계약일자</th>
                                        <th>상태</th>
                                        <th>상세정보</th>
                                    </tr>
                                    @if(count($proceeding) == 0)
                                        <tr>
                                            <td colspan="4">진행중인 캠페인가 없습니다.</td>
                                        </tr>
                                    @endif
                                    @foreach($proceeding as $proceedingItem)
                                        <tr>
                                            <td class="left">
                                                <a href="{{ url("/detail/".$proceedingItem->id) }}">{{ $proceedingItem->title }}</a>
                                            </td>
                                            <td>{{ $proceedingItem->deadline }}</td>
                                            <td>{{ $proceedingItem->step }}</td>
                                            <td><a href="{{ url("client/project/carryon/".$proceedingItem->id) }}"><button class="btn btn-azure btn-sm">상세정보</button></a></td>
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

