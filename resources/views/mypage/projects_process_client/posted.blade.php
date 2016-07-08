@extends('layouts.master_layout')
@section('right_content')
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
                                                <a href="{{ url("client/project/applist/".$registeredItem->id) }}"><button class="btn btn-azure btn-sm">{{ $registeredItem->applications_cnt}}명</button></a>
                                            </td>
                                            <td>{{ $registeredItem->step }}</td>
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