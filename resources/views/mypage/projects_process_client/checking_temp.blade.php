@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">임시저장 캠페인</span>
        <p class="padding-top-10">캠페인 등록 중 임시저장한 캠페인입니다. 언제든 등록이 가능합니다.</p>
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
                                    <col style="width:28%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:14%;"/>
                                    <col style="width:8%;"/>
                                    <col style="width:8%;"/>
                                    <tr>
                                        <th>캠페인 제목</th>
                                        <th>예상금액</th>
                                        <th>예상기간</th>
                                        <th>등록일자</th>
                                        <th>마감일자</th>
                                        <th>상태</th>
                                        <th>취소</th>
                                    </tr>
                                    @if(count($temp) == 0)
                                        <tr>
                                            <td colspan="8">임시저장 캠페인가 없습니다.</td>
                                        </tr>
                                    @endif
                                    @foreach($temp as $checkItem)
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
                                                  onsubmit="return confirm('캠페인를 취소 하시겠습니까?');">
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

