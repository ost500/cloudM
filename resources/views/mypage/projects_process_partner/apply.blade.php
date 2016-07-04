@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">지원 중</span>
        <p class="padding-top-5">지원한 프로젝트를 확인할 수 있습니다.</p>
    </div>


    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        @if(sizeof($app) == 0)
            <td colspan="7">지원한 프로젝트가 없습니다</td>
        @endif
        @foreach($app as $appItem)
            <div class="job-content job-post-page margin-bottom-10">
                <div class="form-group">
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
                                    <col style="width:12.5%;"/>
                                    <col style="width:7%;"/>
                                    <col style="width:10%;"/>
                                    <tr>
                                        <th>월예산</th>
                                        <th>기간</th>
                                        <th>마감일자</th>
                                        <th>지원일자</th>
                                        <th>서류</th>
                                        <th>지원 상태</th>
                                    </tr>


                                    <tr>
                                        </td>
                                        <td>{{ number_format($appItem->project->budget) }}</td>
                                        <td>{{ $appItem->project->estimated_duration }}</td>
                                        <td>{{ $appItem->project->deadline }}</td>
                                        <td>{{ substr($appItem->project->created_at, 0, 10) }}</td>
                                        <td>
                                            @if($appItem->file_name != "")
                                                <a href='/apply/application_attach/{{$appItem->id}}'>저장</a>
                                            @else
                                                <button type="button" class="btn btn-danger btn-xs"
                                                        data-toggle="modal" data-target="#fileModal"
                                                        data-app_id="{{$appItem->id}}">등록
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ $appItem->choice }}</td>
                                    </tr>
                                </table>
                            </div>

                            <p class="padding-top-10 text-small"><?php echo nl2br($appItem->content) ?></p>

                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        <!--
        $('#fileModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var app_id = button.data('app_id')

            var modal = $(this)
            modal.find(".modal-body input[name$='app_id']").val(app_id)
        });
        //-->
    </script>
    @if($errors->first('file'))
        <script>
            $(function(){
                alert("{{ $errors->first('file') }}")
            });
        </script>
    @endif

@endsection


