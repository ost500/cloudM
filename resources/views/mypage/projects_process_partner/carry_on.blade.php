@extends('layouts.master_layout')
@section('right_content')
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
                            <div class="panel02 panel-default02 margin-bottom-30">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:60%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:10%;"/>
                                    <tr>
                                        <th>프로젝트명</th>
                                        <th>지원일자</th>
                                        <th>지원서류</th>
                                        <th>상태</th>
                                    </tr>


                                    <tr>
                                        <td class="left"><a href="{{ url("detail/".$carryonItem->id) }}">{{ $carryonItem->title }}</a></td>
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





                            <h6 class="my_h6">클라이언트 정보</h6>
                            <div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>


                                    <tr>
                                        <th>업체명</th>
                                        <th>담당자</th>
                                        <th>연락처</th>
                                        <th>이메일</th>
                                        <th>작업가이드</th>
                                    </tr>


                                    <tr>
                                        <td>{{ $carryonItem->client->name }}</td>
                                        <td>{{ $carryonItem->charger_name }}</td>
                                        <td>{{ $carryonItem->charger_phone }}</td>
                                        <td>{{ $carryonItem->deadline }}</td>
                                        <td>
                                            @if($carryonItem->file_name != "")
                                                <a href='/apply/application_attach/{{$carryonItem->app->id}}'>저장</a>
                                            @else
                                                없음
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>



                            <h6 class="my_h6">계약 정보</h6>
                            <div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>

                                    <tr>
                                        <th>계약일</th>
                                        <th>계약금액</th>
                                        <th>결제여부</th>
                                        <th>결제일</th>
                                        <th>대금지급형태</th>
                                    </tr>


                                    <tr>
                                        <td>{{ $carryonItem->contract->contract_date }}</td>
                                        <td>{{ number_format($carryonItem->contract->contract_pay) }}원</td>
                                        <td>{{ ($carryonItem->contract->charge_check)?"결제완료":"결제전" }}</td>
                                        <td>{{ $carryonItem->contract->charge_date}}</td>
                                        <td>{{ $carryonItem->contract->charge_type}}</td>
                                    </tr>
                                </table>
                            </div>


                            <h6 class="my_h6">계약 매체</h6>
                            <div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:20%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:60%;"/>

                                    <tr>
                                        <th>매체명</th>
                                        <th>계약금액</th>
                                        <th>한줄설명</th>
                                    </tr>

                                    @foreach($carryonItem->projects_area as $areas)

                                        <tr>
                                            <td>{{ $areas->area }}</td>
                                            <td>{{ number_format($areas->price) }}원</td>
                                            <td class="left">{{ $areas->memo }}</td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>

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
            var pid = button.data('pid')

            var modal = $(this)
            modal.find(".modal-body input[name$='p_id']").val(pid)
        });
        //-->
    </script>
@endsection

