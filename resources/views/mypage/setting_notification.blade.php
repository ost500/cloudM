@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">알림설정</span>
        <p class="padding-top-5">프로젝트 등록, 지원등의 소식을 빠르게 받아 보세요.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page ">

            <div class="panel-heading">
                <h5 class="panel-title">알림설정</h5>
            </div>


            <div class="panel">
                <div class="panel-body">

                    <div class="panel-group accordion" id="accordion">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"> <i class="fa fa-arrow-down"></i> 이메일 알림 설정 </a></h6>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body padding-top-30">


                                    <form action="{{ url('/setting/notification/email/save') }}" method="POST" role="form" class="form-horizontal"
                                          enctype="multipart/form-data" accept-charset="UTF-8">
                                        {!! csrf_field() !!}

                                        <table class="table_03" width=100% cellpadding=0 cellspacing=0>
                                            <col style="width:20%;"/>
                                            <col style="width:80%;"/>

                                            <tr>
                                                <td colspan="2">{{ $loginUser->email }} 으로 이메일 알람이 발송 됩니다.</td>
                                            </tr>

                                            <tr>
                                                <th rowspan="2">프로젝트 알람</th>
                                                <td>
                                                    <input type="radio"
                                                           name="project_email" id="project_all"
                                                           value="전체" {{ ($loginUser->project_email=="전체")?"checked":"" }} />
                                                    <label for="project_all"> 전체 알람 받기</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="radio"
                                                           name="project_email" id="project_important"
                                                           value="중요" {{ ($loginUser->project_email=="중요")?"checked":"" }} />
                                                    <label for="project_important">중요한 알람만 받기 | 프로젝트 지원자 발생, 댓글 문의, 미팅 요청, 제안서 등록 등</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th rowspan="2">계약 알람</th>
                                                <td>
                                                    <input type="radio"
                                                           name="contract_email" id="contract_all"
                                                           value="전체" {{ ($loginUser->contract_email=="전체")?"checked":"" }} />
                                                    <label for="contract_all">전체 알람 받기</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="radio"
                                                           name="contract_email" id="contract_important"
                                                           value="중요" {{ ($loginUser->contract_email=="중요")?"checked":"" }} />
                                                    <label for="contract_important">중요한 알람만 받기 | 진행 상태 변경, 대금 중간 정산 등</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th rowspan="3">기타 알람</th>
                                                <td>
                                                    <input type="checkbox"
                                                           name="fastm_email" id="fastm_email" value="1" {{ ($loginUser->fastm_email)?"checked":"" }} />
                                                    <label for="fastm_email">fastm.io 뉴스 및 공지</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox"
                                                           name="marketing_email" id="marketing_email" value="1" {{ ($loginUser->marketing_email)?"checked":"" }} />
                                                    <label for="marketing_email">마케팅 정보</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox"
                                                           name="news_email"  id="news_email" value="1" {{ ($loginUser->news_email)?"checked":"" }} />
                                                    <label for="news_email">월간 뉴스 레터</label>
                                                </td>
                                            </tr>
                                        </table>


                                        <div class="form-group margin-top-20">
                                            <div class="pull-right padding-right-15">
                                                <button class="btn btn-o btn-primary" type="submit">
                                                    저장하기
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white margin-top-30">
                            <div class="panel-heading">
                                <h6 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"> <i class="fa fa-arrow-down"></i> 문자메세지 알림 설정 </a></h6>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                                <div class="panel-body">
                                    <form action="{{ url('/setting/notification/sms/save') }}" method="POST" role="form" class="form-horizontal"
                                          enctype="multipart/form-data" accept-charset="UTF-8">
                                        {!! csrf_field() !!}

                                        <table class="table_03" width=100% cellpadding=0 cellspacing=0>
                                            <col style="width:20%;"/>
                                            <col style="width:80%;"/>

                                            <tr>
                                                <td colspan="2">{{ $loginUser->phone }} 으로 알람이 발송 됩니다.</td>
                                            </tr>

                                            <tr>
                                                <th rowspan="2">프로젝트 알람</th>
                                                <td>
                                                    <input type="radio"
                                                           name="project_sms" id="project_sms_all"
                                                           value="전체" value="1" {{ ($loginUser->project_sms=="전체")?"checked":"" }} />
                                                    <label for="project_sms_all"> 전체 알람 받기</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="radio"
                                                           name="project_sms" id="project_sms_important"
                                                           value="중요" {{ ($loginUser->project_sms=="중요")?"checked":"" }} />
                                                    <label for="project_sms_important">중요한 알람만 받기 | 프로젝트 지원자 발생, 댓글 문의, 미팅 요청, 제안서 등록 등</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th rowspan="2">계약 알람</th>
                                                <td>
                                                    <input type="radio"
                                                           name="contract_sms" id="contract_sms_all"
                                                           value="전체" {{ ($loginUser->contract_sms=="전체")?"checked":"" }} />
                                                    <label for="contract_sms_all">전체 알람 받기</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="radio"
                                                           name="contract_sms" id="contract_sms_important"
                                                           value="중요" {{ ($loginUser->contract_sms=="중요")?"checked":"" }} />
                                                    <label for="contract_sms_important">중요한 알람만 받기 | 진행 상태 변경, 대금 중간 정산 등</label>
                                                </td>
                                            </tr>
                                        </table>


                                        <div class="form-group margin-top-20">
                                            <div class="pull-right padding-right-15">
                                                <button class="btn btn-o btn-primary" type="submit">
                                                    저장하기
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
