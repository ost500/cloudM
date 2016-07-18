@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">지원 종료 캠페인</span>
        <p class="padding-top-5">계약이 성사되지 않은 캠페인을 확인할 수 있습니다.</p>
    </div>



    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        @if(sizeof($app_finished) == 0)
            <td colspan="7">지원 종료된 캠페인이 없습니다</td>
        @endif
        @foreach($app_finished as $appItem)
            <div class="job-content job-post-page margin-bottom-10">
                <div class="panel-group">
                    <div class="panel">
                        <div class="margin-bottom-10">
                            <a href="{{ url("detail/".$appItem->project->id) }}"><h6
                                        class="my_h6 margin-bottom-10 margin-top-20">{{ $appItem->project->title }}</h6>
                            </a>

                            <div>
                                <ul class="tags dall margin-top-10">
                                    <li>지역 > {{ str_limit($appItem->project->address_sido, 4, '') }}
                                        | 마케팅 분야
                                        @foreach($appItem->project->projects_area as $areas)
                                            <a href="#.">{{ $areas->area }}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div class="panel02 panel-default02">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:12.5%;"/>
                                    <col style="width:12.5%;"/>
                                    <col style="width:12.5%;"/>
                                    <col style="width:7%;"/>
                                    <col style="width:7%;"/>
                                    <tr>
                                        <th>월예산</th>
                                        <th>기간</th>
                                        <th>마감</th>
                                        <th>서류</th>
                                        <th>상태</th>
                                    </tr>


                                    <tr>
                                        </td>
                                        <td>{{ number_format($appItem->project->budget) }}원</td>
                                        <td>{{ $appItem->project->estimated_duration }}</td>
                                        <td>{{ $appItem->project->deadline }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                    data-toggle="modal" data-target="#fileModal"
                                                    data-pid="{{$appItem->project->id}}">등록
                                            </button>
                                        </td>
                                        <td>{{ $appItem->project->step }}</td>
                                    </tr>
                                </table>
                            </div>

                            <p class="padding-top-10">{{ $appItem->content }}</p>

                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection


