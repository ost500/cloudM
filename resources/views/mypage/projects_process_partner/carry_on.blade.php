@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">

                <!--
                        <div class="heading text-left margin-bottom-20">
                          <h4>프로젝트 검색</h4>
                        </div>
                        <div class="coupen">
                          <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
                        </div>
                -->

                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-sider-bar003">
                            <h5 class="side-tittle">파트너스</h5>
                            <div>
                                @if($loginUser->profileImage != null)
                                    <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                                @else
                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                                @endif

                                <h6>{{ $loginUser->name }}</h6>
                                <a href="{{ url("/setting") }}">
                                    <div id="tag02">
                                        <div class="button">기본정보수정</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <h5 class="side-tittle">파트너스 히스토리</h5>
                            <table class="history_table">
                                <tbody>

                                <tr>
                                    <th>계약한 프로젝트</th>
                                    <td>{{ count($carryon) }}건</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">
                        <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                            <span class="h3 text-bold">진행 중</span>
                            <p class="padding-top-5">진행중인 프로젝트를 확인할 수 있습니다.</p>
                        </div>

                        <!-- Job Content -->
                        <div id="accordion">
                            <!-- Job Section -->
                            @if(sizeof($carryon) == 0)
                                <td colspan="7">지원한 프로젝트가 없습니다</td>
                            @endif
                            @foreach($carryon as $carryonItem)
                                <div class="job-content job-post-page margin-bottom-10">
                                    <div class="form-group">
                                        <div class="panel">
                                            <div class="margin-bottom-10">
                                                <a href="{{ url("detail/".$carryonItem->id) }}"><h6 class="my_h6 margin-bottom-10 margin-top-20">{{ $carryonItem->title }}</h6></a>

                                                <div>
                                                    <ul class="tags dall margin-top-10">
                                                        <li>지역 > {{ str_limit($carryonItem->address_sido, 4, '') }} | 마케팅 분야
                                                            @foreach($carryonItem->projects_area as $areas)
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
                                                            <td>{{ number_format($carryonItem->budget) }}</td>
                                                            <td>{{ $carryonItem->estimated_duration }}</td>
                                                            <td>{{ $carryonItem->deadline }}</td>
                                                            <td>{{ substr($carryonItem->created_at, 0, 10) }}</td>
                                                            <td>
                                                                @if($carryonItem->app->file_name != "")
                                                                    <a href='/apply/application_attach/{{$carryonItem->app->id}}'>저장</a>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-xs"
                                                                            data-toggle="modal" data-target="#fileModal"
                                                                            data-app_id="{{$carryonItem->app->id}}">등록
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            <td>{{ $carryonItem->step }}</td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <p class="padding-top-10 text-small"><?php echo nl2br($carryonItem->app->content) ?></p>

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

    @include('include.footer')
@endsection

