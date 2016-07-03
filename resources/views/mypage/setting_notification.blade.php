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
            <div class="panel-body padding-right-30">
                <form action="{{ url('/mypage/eamil') }}" method="POST" role="form" class="form-horizontal"
                      accept-charset="UTF-8">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">이메일 </label>
                        <div class="col-sm-8">
                            <p class="margin-top-8">{{ Auth::user()->email }}</p>
                            <p class="validation-error"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">이메일 구독 </label>
                        <div class="col-sm-8">
                            <p class="margin-top-8"><input type="checkbox" name="checkbox1" id="checkbox1"
                                   value="option1" checked=""> 신규 프로젝트나 프로젝트에 지원자가 있으면 메일로 안내합니다.</p>

                            <p class="validation-error"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">문자 안내</label>
                        <div class="col-sm-8">
                            <p class="margin-top-8"><input type="checkbox" name="checkbox1" id="checkbox1"
                                                           value="option1" checked="">신규 프로젝트나 프로젝트에 지원자가 있으면 문자로 안내합니다.</p>

                            <p class="validation-error"></p>
                        </div>
                    </div>
                    <div class="form-group margin-top-20 padding-right-35">
                        <div class="col-sm-offset-10 col-sm-10">
                            <button class="btn btn-o btn-primary" type="submit">
                                저장
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
