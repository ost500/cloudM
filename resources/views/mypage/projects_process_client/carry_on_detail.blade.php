@extends('include.head')
@section('content')
    <div id="content">
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">
                <div class="coupen">
                    <p class="h3 text-bold"><span>{{ $project['title'] }}</span> 프로젝트의 업무/계약 가이드</p>
                    <p class="padding-top-10">프로젝트의 계약 사항과 업무 내용을 한눈에 살펴 볼 수 있도록, 정리해 두었습니다.</p>
                </div>

                <div class="row padding-top-15">
                    <div class="col-md-12">
                        <div id="accordion">
                            <div class="job-content job-post-page">

                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="port_guide img_f">
                                            <img src="/images/i_icon.png" style="margin-top:10px;">
                                            <div class="p_add_span padding-top-0 padding-left-60">
                                                <div class="content">1. 인증은 근무일 기준 24시간 이상 소요 되며</div>
                                                <div class="content">2. 인증은 근무일 기준 24시간 이상 소요 되며</div>
                                                <div class="content">3. 인증완료 후 서류 변경을 원하실 경우에는</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel padding-top-20">
                                        <div class="tabbable">
                                            <ul id="myTab1" class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#project_tab1" data-toggle="tab" aria-expanded="true">
                                                        계약사항/업무가이드 </a>
                                                </li>
                                                <li class="">
                                                    <a href="#project_tab2" data-toggle="tab" aria-expanded="false">
                                                        체크리스트 </a>
                                                </li>
                                                <li class="">
                                                    <a href="#project_tab3" data-toggle="tab" aria-expanded="false">
                                                        프로젝트 게시판 </a>
                                                </li>
                                                <li class="">
                                                    <a href="#project_tab4" data-toggle="tab" aria-expanded="false"> 탈락
                                                        지원자 </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content padding-top-20">
                                                <div class="tab-pane fade active in" id="project_tab1">
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
                                                                <th>프로젝트 비용 결제 방식</th>
                                                                <th>결제여부</th>
                                                                <th>결제일</th>
                                                            </tr>


                                                            <tr>
                                                                <td>{{ $contract->contract_date }}</td>
                                                                <td>{{ number_format($contract->contract_pay) }}원</td>
                                                                <td>{{ $contract->charge_type}}</td>
                                                                <td>{{ ($contract->charge_check)?"결제완료":"결제전" }}</td>
                                                                <td>{{ $contract->charge_date}}</td>
                                                            </tr>

                                                            <tr>
                                                                <th>프로젝트 기간</th>
                                                                <th>대금 지급 방식</th>
                                                                <th>계약금(%) / 지급일</th>
                                                                <th>중도금(%) / 지급일</th>
                                                                <th>잔금(%) / 지급일</th>
                                                            </tr>


                                                            <tr>
                                                                <td>{{ $contract->start_work_date }}
                                                                    ~ {{ $contract->finish_work_date }}</td>
                                                                <td>{{ $contract->type_pay }}</td>
                                                                <td>{{ $pay['start'] }}원
                                                                    ({{ $contract->start_pay_ratio }}%)
                                                                    / {{ $contract->start_pay_date }} </td>
                                                                <td>{{ $pay['middle'] }}원
                                                                    ({{ $contract->middle_pay_ratio }}%)
                                                                    / {{ $contract->middle_pay_date }} </td>
                                                                <td>{{ $pay['finish'] }}원
                                                                    ({{ $contract->finish_pay_ratio }}%)
                                                                    / {{ $contract->finish_pay_date }} </td>
                                                            </tr>
                                                        </table>
                                                    </div>


                                                    <h6 class="my_h6">계약 파트너 정보</h6>
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
                                                                <th>팩스</th>
                                                            </tr>


                                                            <tr>
                                                                <td><a href="{{ url('partner/'.$contract->user->id) }}">
                                                                        <button class="btn btn-azure btn-sm">{{ $contract->user->name }}</button>
                                                                    </a></td>
                                                                <td>{{ $project->charger_name }}</td>
                                                                <td>{{ $contract->user->phone_num }}</td>
                                                                <td>{{ $contract->user->email }}</td>
                                                                <td>{{ $contract->user->fax_num }}</td>
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

                                                            @foreach($project->projects_area as $areas)

                                                                <tr>
                                                                    <td>{{ $areas->area }}</td>
                                                                    <td>{{ number_format($areas->price) }}원</td>
                                                                    <td class="left">{{ $areas->memo }}</td>
                                                                </tr>
                                                            @endforeach

                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="project_tab2">
                                                    <div class="panel transparent">
                                                        <div class="panel-body">

                                                            <div class="todo-list">
                                                                <span class="todo-header">체크사항</span>
                                                                <ul class="connectedSortable ui-sortable"
                                                                    id="sortable-todo">

                                                                    <li class="">
                                                                    <span class="drag-todo">
                                                                        <span class="checkbox pt">
                                                                            <input type="checkbox" class="tectonic"
                                                                                   id="checked2" value="1" name="ham">
                                                                            <label for="checked2"></label>
                                                                        </span>
                                                                    </span>
                                                                        <p class="todo-description">
                                                                            Sketch wireframes for new project and send
                                                                            it to client as soon as possible
                                                                        </p>

                                                                    </li>
                                                                    <li class="">
                                                                        <span class="drag-todo">
                                                                            <span class="checkbox pt">
                                                                                <input type="checkbox" class="tectonic"
                                                                                       id="checked3" value="1"
                                                                                       name="ham">
                                                                                <label for="checked3"></label>
                                                                            </span>
                                                                        </span>
                                                                        <p class="todo-description">
                                                                            Buy some milk
                                                                        </p>

                                                                    </li>
                                                                    <li class="">
                                                                        <span class="drag-todo">
                                                                            <span class="checkbox pt">
                                                                                <input type="checkbox" class="tectonic"
                                                                                       id="checked4" value="1"
                                                                                       name="ham">
                                                                                <label for="checked4"></label>
                                                                            </span>
                                                                        </span>
                                                                        <p class="todo-description">
                                                                            Prepare documentation for completed project
                                                                        </p>

                                                                    </li>
                                                                    <li class="">
                                                                            <span class="drag-todo">
                                                                                <span class="checkbox pt">
                                                                                    <input type="checkbox"
                                                                                           class="tectonic"
                                                                                           id="checked5" value="1"
                                                                                           name="ham">
                                                                                    <label for="checked5"></label>
                                                                                </span>
                                                                            </span>
                                                                        <p class="todo-description">
                                                                            Meeting with the development team
                                                                        </p>
                                                                    </li>
                                                                    <li class="">
                                                                        <span class="drag-todo">
                                                                            <span class="checkbox pt">
                                                                                <input type="checkbox" class="tectonic"
                                                                                       id="checked6" value="1"
                                                                                       name="ham" checked="">
                                                                                <label for="checked6"></label>
                                                                            </span>
                                                                            <span class="drag-image"></span>
                                                                        </span>
                                                                        <p class="todo-description">
                                                                            Assign todo to designers
                                                                        </p>

                                                                    </li>
                                                                </ul>
                                                                <span class="todo-header margin-top-50">처리완료</span>
                                                                <ul class="todo-completed connectedSortable ui-sortable"
                                                                    id="completed-todo">

                                                                    <li class="">
                                                                        <span class="drag-todo">
                                                                            <span class="checkbox pt">
                                                                                <input type="checkbox" class="tectonic"
                                                                                       id="checked7" value="1"
                                                                                       name="ham" checked="">
                                                                                <label for="checked7"></label>
                                                                            </span>
                                                                            <span class="drag-image"></span>
                                                                        </span>
                                                                        <p class="todo-description">
                                                                            Set up a meeting with new client
                                                                        </p>
                                                                    </li>
                                                                    <li class="">
                                                                        <span class="drag-todo">
                                                                            <span class="checkbox pt">
                                                                                <input type="checkbox" class="tectonic"
                                                                                       id="checked1" value="1"
                                                                                       name="ham">
                                                                                <label for="checked1"></label>
                                                                            </span>
                                                                        </span>
                                                                        <p class="todo-description">
                                                                            Send project demo files to client
                                                                        </p>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="project_tab3">
                                                    <div id="communication_board"></div>
                                                </div>
                                                <div class="tab-pane fade" id="project_tab4">

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
    <script>

        function viewLoad() {
            var display_results = $("#communication_board");
            display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

            $.ajax({
                url: '{{ route('communication',['p_id' => $project->id]) }}',

                success: function (result) {

                    display_results.html(result);

                }
            });
        }

        $(function(){
            viewLoad();
        });

    </script>

    <script type="text/javascript" src="http://tectonic.kaijuthemes.com/assets/demo/demo-app-todo.js"></script>
    @include('include.footer')
@endsection