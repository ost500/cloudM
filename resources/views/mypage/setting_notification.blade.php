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
                            <h5 class="side-tittle">개인정보관리</h5>
                            <table class="sub_menu">
                                <tbody>
                                <tr>
                                    <td><a href="{{ url('/setting/profile') }}">개인정보수정</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/setting/auth') }}">신원인증</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/setting/bank') }}">계좌관리</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/setting/password') }}">비밀번호 변경</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ url('/setting/notification') }}">알림설정</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">
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


                    </div>
                </div>
            </div>
        </section>
    </div>


    @include('include.footer')
@endsection
