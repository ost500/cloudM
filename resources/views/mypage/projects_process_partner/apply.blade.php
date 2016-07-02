@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">

                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-sider-bar003">
                            @if($loginUser->PorC == "P")
                                <h5 class="side-tittle">파트너스</h5>
                            @else
                                <h5 class="side-tittle">클라이언트</h5>
                            @endif
                            <div>
                                <div class="col-md-3">
                                    @if($loginUser->profileImage != null)
                                        <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}">
                                    @else
                                        <img class="partner_profile02" src="/images/p_img02.png">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <p class="side-title-name">{{ $loginUser->name }}</p>
                                    <a href="/setting">
                                        <div id="tag02">
                                            <div class="button">기본정보수정</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <h5 class="side-tittle">세부 메뉴</h5>
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th><a href="{{ url('/my_apply') }}">지원한 프로젝트</a></th>
                                    <td>{{ count($app) }}건</td>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/my_apply_finished') }}">지원 종료 프로젝트</a></th>
                                    <td>{{ count($app_finished) }}건</td>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/my_interesting') }}">관심 프로젝트</a></th>
                                    <td>{{ count($interesting) }}건</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">

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
                    </div>
                </div>
            </div>
        </section>
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


    @include('include.footer')
@endsection


