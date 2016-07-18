@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">완료된 캠페인</span>
        <p class="padding-top-10">업무 진행 후 대급지급까지 완료한 캠페인 입니다. </p>
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

                        <div class="job-tittle03 margin-bottom-10">
                            <div class="panel02 panel-default02">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:25.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <tr>
                                        <th>캠페인 제목</th>
                                        <th>비용</th>
                                        <th>기간</th>
                                        <th>마감일자</th>
                                        <th>상태</th>

                                    </tr>
                                    @if(count($done) == 0)
                                        <tr>
                                            <td colspan="5">완료된 캠페인가 없습니다.</td>
                                        </tr>
                                    @endif
                                    @foreach($done as $doneItem)
                                        <tr>
                                            <td>
                                                <a href="{{ url("/detail/".$doneItem->id) }}">{{ $doneItem->title }}</a>
                                            </td>
                                            <td>{{ number_format($doneItem->budget) }}</td>
                                            <td>{{ $doneItem->estimated_duration }}</td>
                                            <td>{{ $doneItem->deadline }}</td>
                                            <td>{{ $doneItem->step }}</td>


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

