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
                            @if($loginUser->PorC == "P")
                                <h5 class="side-tittle">파트너스</h5>
                            @else
                                <h5 class="side-tittle">클라이언트</h5>
                            @endif
                            <div>
                                @if($loginUser->profileImage != null)
                                    <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                                @else
                                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                                @endif

                                <h6>{{ $loginUser->name }}</h6>
                                <a href="#.">
                                    <div id="tag02">
                                        <div class="button">기본정보수정</div>
                                    </div>
                                </a>
                            </div>
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




                                        <div id="wizard" class="swMain">

                                            <div class="stepContainer">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                    <form action="{{ url('/mypage/img') }}" method="POST" role="form"
                                                          enctype="multipart/form-data" accept-charset="UTF-8">
                                                        {!! csrf_field() !!}

                                                        <fieldset>
                                                            <legend>프로필 사진 관리</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="file"
                                                                               name="Image" id="image_input"
                                                                               value="{{ $loginUser->profileImage.".jpg" }}" />
                                                                        {{ $errors->first('Image') }}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-sm btn-primary btn-o next-step pull-right">
                                                                    저장하기
                                                                </button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="stepContainer" style="padding-top:30px;">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <form action="{{ url('/mypage/info') }}" method="POST" role="form">
                                                            {!! csrf_field() !!}

                                                            <fieldset>
                                                                <legend>
                                                                    기본 정보
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 이름 <span class="symbol required"></span>
                                                                            </label>
                                                                            <input class="form-control" required="required" type="text" name="name"
                                                                                   placeholder=""
                                                                                   value="{{$loginUser->name}}">

                                                                            {{ $errors->first('name') }}
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 파트너형태
                                                                            </label>
                                                                            <select name="company_type" class="form-control"
                                                                                    id="form_of_business" required="required"
                                                                                    value="abc">

                                                                                <option value="개인" <?php if ($loginUser->company_type == "개인") {
                                                                                    echo "selected";
                                                                                }?>>개인
                                                                                </option>
                                                                                <option value="팀"<?php if ($loginUser->company_type == "팀") {
                                                                                    echo "selected";
                                                                                }?>>팀
                                                                                </option>
                                                                                <option value="개인 사업자"<?php if ($loginUser->company_type == "개인 사업자") {
                                                                                    echo "selected";
                                                                                }?>>개인 사업자
                                                                                </option>
                                                                                <option value="법인 사업자"<?php if ($loginUser->company_type == "법인 사업자") {
                                                                                    echo "selected";
                                                                                }?>>법인 사업자
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 성별</label>
                                                                            <select name="sex" class="form-control"
                                                                                    id="form_of_sex" required="required">

                                                                                <option value="남성" <?php if ($loginUser->sex == "남성") {
                                                                                    echo "selected";
                                                                                }?>>남성
                                                                                </option>
                                                                                <option value="여성"<?php if ($loginUser->sex == "여성") {
                                                                                    echo "selected";
                                                                                }?>>여성
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 생년월일</label>
                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   name="BOD" id="bod" value="{{ $loginUser->BOD }}" maxlength="10">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 지역</label>
                                                                            <select name="address"
                                                                                    class="form-control ie-form-control"
                                                                                    id="address">
                                                                                <option value="">선택</option>
                                                                                <option value="서울" @if($loginUser->address == "서울"){{"selected"}}@endif>
                                                                                    서울특별시
                                                                                </option>
                                                                                <option value="부산" @if($loginUser->address == "부산"){{"selected"}}@endif>
                                                                                    부산
                                                                                </option>
                                                                                <option value="대구" @if($loginUser->address == "대구"){{"selected"}}@endif>
                                                                                    대구
                                                                                </option>
                                                                                <option value="인천" @if($loginUser->address == "인천"){{"selected"}}@endif>
                                                                                    인천
                                                                                </option>
                                                                                <option value="광주" @if($loginUser->address == "광주"){{"selected"}}@endif>
                                                                                    광주
                                                                                </option>
                                                                                <option value="대전" @if($loginUser->address == "대전"){{"selected"}}@endif>
                                                                                    대전
                                                                                </option>
                                                                                <option value="울산" @if($loginUser->address == "울산"){{"selected"}}@endif>
                                                                                    울산
                                                                                </option>
                                                                                <option value="세종" @if($loginUser->address == "세종"){{"selected"}}@endif>
                                                                                    세종특별자치시
                                                                                </option>
                                                                                <option value="경기" @if($loginUser->address == "경기"){{"selected"}}@endif>
                                                                                    경기도
                                                                                </option>
                                                                                <option value="강원" @if($loginUser->address == "강원"){{"selected"}}@endif>
                                                                                    강원도
                                                                                </option>
                                                                                <option value="충북" @if($loginUser->address == "충북"){{"selected"}}@endif>
                                                                                    충청북도
                                                                                </option>
                                                                                <option value="충남" @if($loginUser->address == "충남"){{"selected"}}@endif>
                                                                                    충청남도
                                                                                </option>
                                                                                <option value="전북" @if($loginUser->address == "전북"){{"selected"}}@endif>
                                                                                    전라북도
                                                                                </option>
                                                                                <option value="전남" @if($loginUser->address == "전남"){{"selected"}}@endif>
                                                                                    전라남도
                                                                                </option>
                                                                                <option value="경북" @if($loginUser->address == "경북"){{"selected"}}@endif>
                                                                                    경상북도
                                                                                </option>
                                                                                <option value="경남" @if($loginUser->address == "경남"){{"selected"}}@endif>
                                                                                    경상남도
                                                                                </option>
                                                                                <option value="제주" @if($loginUser->address == "제주"){{"selected"}}@endif>
                                                                                    제주특별자치도
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-sm btn-primary btn-o next-step pull-right">
                                                                        저장하기
                                                                    </button>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="stepContainer" style="padding-top:30px;">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <form action="{{ url('/mypage/numbers') }}" method="POST" role="form">
                                                            {!! csrf_field() !!}

                                                            <fieldset>
                                                                <legend>
                                                                    연락처 정보
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 연락처 <span class="symbol required"></span>
                                                                            </label><br>
                                                                            <select name="phone_num1" class="phone_width"
                                                                                    id="form_of_business" required="required">
                                                                                <option vlaue="010" @if($loginUser->phone_num_arr[0] == "010"){{"selected"}}@endif>010</option>
                                                                                <option value="011" @if($loginUser->phone_num_arr[0] == "011"){{"selected"}}@endif>011</option>
                                                                                <option value="016" @if($loginUser->phone_num_arr[0] == "016"){{"selected"}}@endif>016</option>
                                                                                <option value="017" @if($loginUser->phone_num_arr[0] == "017"){{"selected"}}@endif>017</option>
                                                                                <option value="019" @if($loginUser->phone_num_arr[0] == "019"){{"selected"}}@endif>019</option>
                                                                            </select>
                                                                            <input class="phone_width number" type="text"
                                                                                   name="phone_num2"
                                                                                   placeholder=""
                                                                                   value="{{ $loginUser->phone_num_arr[1] }}" required="required" minlength="3" maxlength="4">
                                                                            <input class="phone_width" type="text"
                                                                                   name="phone_num3"
                                                                                   placeholder=""
                                                                                   value="{{ $loginUser->phone_num_arr[2] }}" required="required" minlength="3" maxlength="4">
                                                                            {{ $errors->first('phone_num1') }}
                                                                            {{ $errors->first('phone_num2') }}
                                                                            {{ $errors->first('phone_num3') }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 팩스 <span
                                                                                        class="symbol ok"
                                                                                        aria-required="true"></span>
                                                                            </label>
                                                                            <input class="form-control" type="text" name="fax_num"
                                                                                   placeholder="" value="{{ $loginUser->fax_num }}">

                                                                            {{ $errors->first('fax_num') }}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-sm btn-primary btn-o next-step pull-right">
                                                                        저장하기
                                                                    </button>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


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


                                            <div class="stepContainer" style="padding-top:30px;">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <form action="{{ url('/mypage/email') }}" method="POST" role="form">
                                                            {!! csrf_field() !!}

                                                            <fieldset>
                                                                <legend>
                                                                    이메일 구독설정
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label"> 이메일
                                                                            </label>
                                                                            <strong>{{ $loginUser->email }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="checkbox">
                                                                                <input type="checkbox" name="checkbox1" id="checkbox1"
                                                                                       value="option1" checked="">
                                                                                <label for="checkbox1">패스트엠의 프로젝트 소식을 구독합니다.</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-sm btn-primary btn-o next-step pull-right">
                                                                        저장하기
                                                                    </button>
                                                                </div>
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
