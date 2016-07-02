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
                            <span class="h3 text-bold">비밀번호 변경</span>
                            <p class="padding-top-5">개인정보를 주기적으로 변경하여 개인정보를 보호해 주세요.</p>
                        </div>


                        <!-- Job Content -->
                        <div id="accordion">
                            <div class="job-content job-post-page ">

                                <div class="panel-heading">
                                    <h5 class="panel-title">비밀번호 변경</h5>
                                </div>
                                <div class="panel-body padding-right-30">
                                    <form action="{{ url('/setting/passwordUpdate') }}" method="POST" role="form"
                                          class="form-horizontal"
                                          accept-charset="UTF-8">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                        class="symbol required"></span>비밀번호 </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password"
                                                       name="password" id="auth_file_input" required="required"/>
                                                {{ $errors->first('password') }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                        class="symbol required"></span> 비밀번호 확인</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password"
                                                       name="password_re" id="auth_file_input" required="required"/>
                                                {{ $errors->first('password_re') }}
                                            </div>
                                        </div>
                                        <div class="form-group margin-top-20 padding-right-50">
                                            <div class="col-sm-offset-10 col-sm-10">
                                                <button class="btn btn-o btn-primary" type="submit">
                                                    변경하기
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
