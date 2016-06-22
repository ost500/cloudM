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
                            <h5 class="side-tittle">클라이언트</h5>
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
                            <h5 class="side-tittle">클라이언트 히스토리</h5>
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th>지원한 프로젝트</th>
                                    <td>{{ count($app) }}건</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">


                        <!-- Job Content -->
                        <div id="accordion">

                            <!-- Job Section -->
                            <div class="job-content job-post-page">
                                <!-- Job Tittle -->
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <!-- Save -->
                                        <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                                        <!-- PANEL HEADING -->
                                        <div class="panel-heading">

                                            <a class="mypage_link" href="{{url('/services')}}">처음 오셨나요? 이용방법을 확인하세요
                                                > </a>


                                            <div class="job-tittle03 margin-bottom-10">
                                                <h6 class="my_h6 margin-bottom-10 margin-top-20">지원한 프로젝트</h6>
                                                <div class="panel02 panel-default02">
                                                    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                                        <col style="width:25%;"/>
                                                        <col style="width:12.5%;"/>
                                                        <col style="width:12.5%;"/>
                                                        <col style="width:12.5%;"/>
                                                        <col style="width:7%;"/>
                                                        <col style="width:7%;"/>
                                                        <col style="width:7%;"/>
                                                        <tr>
                                                            <th>프로젝트 제목</th>
                                                            <th>월예산</th>
                                                            <th>기간</th>
                                                            <th>마감</th>
                                                            <th>서류</th>
                                                            <th>상태</th>
                                                            <th>취소</th>
                                                        </tr>
                                                        @if(sizeof($app) == 0)
                                                            <td colspan="7">지원한 프로젝트가 없습니다</td>
                                                        @endif
                                                        @foreach($app as $appItem)

                                                            <tr>
                                                                <td><a
                                                                            href="{{ url("detail/".$appItem->project->id) }}">{{ $appItem->project->title }}</a>
                                                                </td>
                                                                <td>{{ number_format($appItem->project->budget) }}</td>
                                                                <td>{{ $appItem->project->estimated_duration }}</td>
                                                                <td>{{ $appItem->project->deadline }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger btn-xs"
                                                                            data-toggle="modal" data-target="#fileModal"
                                                                            data-pid="{{$appItem->project->id}}">관리
                                                                    </button>
                                                                </td>
                                                                <td>{{ $appItem->choice }}</td>

                                                                <form id="{{$appItem->id}}form" method="POST"
                                                                      action="{{ url("/rm_app/") }}"
                                                                      onsubmit="return confirm('취소하시겠습니까?');">
                                                                    {!! csrf_field() !!}
                                                                    <input name="id" hidden
                                                                           value="{{$appItem->id}}">
                                                                    <td>
                                                                        <i style="cursor: pointer"
                                                                           id="{{ $appItem->id }}button"
                                                                           class="fa fa-times fa-lg"></i>
                                                                    </td>
                                                                </form>
                                                                <script>
                                                                    $("#{{$appItem->id}}button").click(function () {
                                                                        $("#{{$appItem->id}}form").submit();
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
                    </div>
                </div>
            </div>
        </section>
    </div>




    @include('include.footer')
@endsection


