@extends('layouts.master_layout')
@section('right_content')
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

