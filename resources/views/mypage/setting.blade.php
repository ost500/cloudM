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
                            <span class="h3 text-bold">기본 정보 수정</span>
                            <p class="padding-top-5">기본적인 개인 정보를 수정 할 수 있습니다.</p>
                        </div>


                        <!-- Job Content -->
                        <div id="accordion ">

                            <!-- Job Section -->
                            <div class="job-content job-post-page ">

                                <div class="panel-heading">
                                    <h5 class="panel-title">프로필 사진</h5>
                                </div>
                                <div class="panel-body padding-right-30">
                                    <form action="{{ url('/mypage/img') }}" method="POST" role="form"
                                          class="form-horizontal"
                                          enctype="multipart/form-data" accept-charset="UTF-8">
                                        {!! csrf_field() !!}

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputEmail3"> 사진 </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file"
                                                       name="Image" id="image_input"
                                                       value="{{ $loginUser->profileImage.".jpg" }}"/>
                                                {{ $errors->first('Image') }}
                                            </div>
                                        </div>
                                        <div class="form-group margin-top-20 padding-right-50">
                                            <div class="col-sm-offset-10 col-sm-10">
                                                <button class="btn btn-o btn-primary" type="submit">
                                                    저장하기
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="panel-heading">
                                    <h5 class="panel-title">기본정보</h5>
                                </div>
                                <div class="panel-body padding-right-30">
                                    <form action="{{ url('/mypage/info') }}" method="POST" role="form"
                                          class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                        class="symbol required"></span> 이름</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" required="required" type="text" name="name"
                                                       placeholder=""
                                                       value="{{$loginUser->name}}">

                                                <p class="validation-error">{{ $errors->first('name') }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputEmail3"><span
                                                        class="symbol required"></span> 연락처</label>
                                            <div class="col-sm-8">
                                                <select name="phone_num1" class="phone_width"
                                                        id="form_of_business" required="required">
                                                    <option vlaue="010" @if($loginUser->phone_num_arr[0] == "010"){{"selected"}}@endif>
                                                        010
                                                    </option>
                                                    <option value="011" @if($loginUser->phone_num_arr[0] == "011"){{"selected"}}@endif>
                                                        011
                                                    </option>
                                                    <option value="016" @if($loginUser->phone_num_arr[0] == "016"){{"selected"}}@endif>
                                                        016
                                                    </option>
                                                    <option value="017" @if($loginUser->phone_num_arr[0] == "017"){{"selected"}}@endif>
                                                        017
                                                    </option>
                                                    <option value="019" @if($loginUser->phone_num_arr[0] == "019"){{"selected"}}@endif>
                                                        019
                                                    </option>
                                                </select>
                                                <input class="phone_width number" type="text"
                                                       name="phone_num2"
                                                       placeholder=""
                                                       value="{{ $loginUser->phone_num_arr[1] }}" required="required"
                                                       minlength="3" maxlength="4">
                                                <input class="phone_width" type="text"
                                                       name="phone_num3"
                                                       placeholder=""
                                                       value="{{ $loginUser->phone_num_arr[2] }}" required="required"
                                                       minlength="3" maxlength="4">
                                                <p class="validation-error">{{ $errors->first('phone_num1') }}
                                                    {{ $errors->first('phone_num2') }}
                                                    {{ $errors->first('phone_num3') }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputEmail3"> 팩스</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="fax_num"
                                                       placeholder="" value="{{ $loginUser->fax_num }}">

                                                <p class="validation-error">{{ $errors->first('fax_num') }}</p>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputPassword3"> 파트너형태 </label>
                                            <div class="col-sm-8">
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
                                                <p class="validation-error"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputPassword3"> 생년월일 </label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                       class="form-control"
                                                       name="BOD" id="bod" value="{{ $loginUser->BOD }}" maxlength="10">

                                                <p class="validation-error"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputPassword3"> 성별 </label>
                                            <div class="col-sm-8">
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
                                                <p class="validation-error"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="inputPassword3"> 지역 </label>
                                            <div class="col-sm-8">
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
                                                <p class="validation-error"></p>
                                            </div>
                                        </div>

                                        <div class="form-group margin-top-20 padding-right-50">
                                            <div class="col-sm-offset-10 col-sm-10">
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
        </section>

    </div>


    @include('include.footer')
@endsection
