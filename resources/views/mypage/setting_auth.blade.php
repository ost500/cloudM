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
                                    <a href="#.">
                                        <div id="tag02">
                                            <div class="button">기본정보수정</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="job-sider-bar02">
                            <table class="history_table">
                                <tbody>
                                <tr>
                                    <th><a href="{{ url('/setting/profile') }}">개인정보수정</a></th>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/setting/auth') }}">신원인증</a></th>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/setting/bank') }}">계좌관리</a></th>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/setting/password') }}">비밀번호 변경</a></th>
                                </tr>
                                <tr>
                                    <th><a href="{{ url('/setting/notification') }}">알림설정</a></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">
                        <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                            <span class="h3 text-bold">신원 인증</span>
                            <p class="padding-top-5">안전한 프로젝트 진행과 계약을 위해서, 사업자등록증 또는 신분증을 통한 확인을 거칩니다.</p>
                        </div>

                        <!-- Job Content -->
                        <div id="accordion">

                            <!-- Job Section -->
                            <div class="job-content job-post-page">
                                <!-- Job Tittle -->
                                <div class="panel-group">
                                    <div class="panel panel-default">

                                        <div class="stepContainer" style="padding-top:30px;">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <form action="{{ url('/mypage/auth_img') }}" method="POST" role="form"
                                                          enctype="multipart/form-data" accept-charset="UTF-8">
                                                        {!! csrf_field() !!}

                                                        <fieldset>
                                                            <legend>인증 관리</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label"> 사업자  : 사업자등록증 / 개인 : 신분증사본 업로드 해 주세요.
                                                                        </label></br></br>


                                                                        @if ($loginUser->auth_check == "인증완료")
                                                                            인증완료
                                                                        @elseif ($loginUser->auth_image && $loginUser->auth_check == "인증요청")
                                                                            자료 제출 후 인증 대기중
                                                                        @else
                                                                            <input class="form-control" type="file"
                                                                                   name="auth_image" id="auth_file_input"
                                                                                   value="{{ $loginUser->auth_image.".jpg" }}" />
                                                                            {{ $errors->first('auth_image') }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @if ($loginUser->auth_check == "인증전")
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-sm btn-primary btn-o next-step pull-right">
                                                                    제출하기
                                                                </button>
                                                            </div>
                                                            @endif
                                                        </fieldset>
                                                    </form>
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
            </div>
        </section>
    </div>


    @include('include.footer')
@endsection
