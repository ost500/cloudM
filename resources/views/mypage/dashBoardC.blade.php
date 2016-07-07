@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">프로젝트 관리</span>
        <p class="padding-top-5">프로젝트 목록을 한눈에 살펴 볼 수 있습니다.</p>
    </div>

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

                        <a class="mypage_link" href="{{url('/services')}}">처음 오셨나요? 이용방법을 확인하세요 > </a>

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
                                        <tr><td colspan="8">검수중 프로젝트가 없습니다.</td></tr>
                                    @endif
                                    @foreach($checking as $checkItem)
                                        @if($count++ == 5) @break @endif
                                        <tr>
                                            <td class="left">
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
                                        <tr><td colspan="5">등록된 프로젝트가 없습니다.</td></tr>
                                    @endif
                                    @foreach($registered as $registeredItem)
                                        <tr>
                                            <td class="left"><a href="{{url("/detail/".$registeredItem->id)}}">{{ $registeredItem->title }}</a></td>
                                            <td>{{ substr($registeredItem->created_at, 0, 10) }}</td>
                                            <td>{{ $registeredItem->deadline}}</td>
                                            <td><a href="{{ url('/applist/'.$registeredItem->id) }}">{{ $registeredItem->cnt }}명</a></td>
                                            <td>{{ $registeredItem->step }}</td>
                                        </tr>
                                        @if($count++ % 5 == 0) @break @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>


                        <div class="job-tittle03">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">진행중 프로젝트</h6>
                            <div class="panel02 panel-default02">

                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:25.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <tr>
                                        <th>프로젝트 제목</th>
                                        <th>지원비용</th>
                                        <th>기간</th>
                                        <th>제출일자</th>
                                        <th>상태</th>

                                    </tr>
                                    @if(count($proceeding) == 0)
                                        <tr><td colspan="5">진행중인 프로젝트가 없습니다.</td></tr>
                                    @endif
                                    @foreach($proceeding as $proceedingItem)
                                        <tr>
                                            <td class="left">
                                                <a href="{{ url("/detail/".$proceedingItem->id) }}">{{ $proceedingItem->title }}</a>
                                            </td>
                                            <td>{{ number_format($proceedingItem->budget) }}</td>
                                            <td>{{ $proceedingItem->estimated_duration }}</td>
                                            <td>{{ $proceedingItem->deadline }}</td>
                                            <td>{{ $proceedingItem->step }}</td>
                                        </tr>
                                        @if($count++ % 5 == 0) @break @endif
                                    @endforeach
                                </table>


                            </div>
                        </div>


                        <div class="job-tittle03 margin-bottom-10">
                            <h6 class="my_h6 margin-bottom-10 margin-top-20">완료된 프로젝트</h6>
                            <div class="panel02 panel-default02">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:25.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <col style="width:16.6%;"/>
                                    <tr>
                                        <th>프로젝트 제목</th>
                                        <th>비용</th>
                                        <th>기간</th>
                                        <th>마감일자</th>
                                        <th>상태</th>

                                    </tr>
                                    @if(count($done) == 0)
                                        <tr><td colspan="5">완료된 프로젝트가 없습니다.</td></tr>
                                    @endif
                                    @foreach($done as $doneItem)
                                        <tr>
                                            <td class="left">
                                                <a href="{{ url("/detail/".$doneItem->id) }}">{{ $doneItem->title }}</a>
                                            </td>
                                            <td>{{ number_format($doneItem->budget) }}</td>
                                            <td>{{ $doneItem->estimated_duration }}</td>
                                            <td>{{ $doneItem->deadline }}</td>
                                            <td>{{ $doneItem->step }}</td>
                                        </tr>
                                        @if($count++ % 5 == 0) @break @endif
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

