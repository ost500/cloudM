@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">검수중 프로젝트</span>
        <p class="padding-top-10">프로젝트 등록 후 관리자가 적절한 프로젝트인지 검수를 진행하며, 근무일 기준 최대 24시간이 소요 됩니다.</p>
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
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">검수중 프로젝트</h6>
                            <div class="panel02 panel-default02">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:28%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:8%;"/>
                                    <col style="width:8%;"/>
                                    <tr>
                                        <th>프로젝트 제목</th>
                                        <th>예상금액</th>
                                        <th>예상기간</th>
                                        <th>등록일자</th>
                                        <th>마감일자</th>
                                        <th>상태</th>
                                        <th>취소</th>
                                    </tr>
                                    @if(count($checking) == 0)
                                        <tr>
                                            <td colspan="8">검수중 프로젝트가 없습니다.</td>
                                        </tr>
                                    @endif
                                    @foreach($checking as $checkItem)
                                        <tr>
                                            <td style="text-align:left;">
                                                <a href="{{ url("/detail/".$checkItem->id) }}">{{ $checkItem->title }}</a>
                                            </td>
                                            <td>{{ number_format($checkItem->budget) }}</td>
                                            <td>{{ $checkItem->estimated_duration }}</td>
                                            <td>{{ substr($checkItem->created_at, 0, 10) }}</td>
                                            <td>{{ $checkItem->deadline }}</td>
                                            <td>{{ $checkItem->step }}</td>
                                            <form id="del_form{{ $checkItem->id }}"
                                                  method="POST"
                                                  action="{{ url("/rm_project/") }}"
                                                  onsubmit="return confirm('프로젝트를 취소 하시겠습니까?');">
                                                {!! csrf_field() !!}
                                                <input name="id" hidden
                                                       value="{{$checkItem->id}}">
                                                <td>
                                                    <i style="cursor: pointer"
                                                       id="{{$checkItem->id}}button"
                                                       class="fa fa-times fa-lg"></i>
                                                </td>
                                            </form>
                                            <script>
                                                $("#{{$checkItem->id}}button").click(function () {
                                                    $("#del_form{{ $checkItem->id }}").submit();
                                                });
                                            </script>

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