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
                                        <!-- Save -->
                                        <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                                        <!-- PANEL HEADING -->


                                        <!-- Revenues Sidebar -->

                                        <!-- Story -->

                                        <article>
                                            <div class="signup02">


                                                <div class="job-tittle04 margin-bottom-30">
                                                    <h6 class="my_h6 margin-bottom-20">기본 정보 입력</h6>

                                                    <form action="{{ url('/mypage/img') }}" method="POST" role="form"
                                                          enctype="multipart/form-data" accept-charset="UTF-8">
                                                        {!! csrf_field() !!}
                                                        <label>프로필사진<span class="set_st">*</span><br/>
                                                            <input class="form-control03 input_width01" type="file"
                                                                   name="Image" id="image_input"
                                                                   value="{{ $loginUser->profileImage.".jpg" }}"/>
                                                            <button class="input_width02" type="submit"><i
                                                                        class="fa fa-plus"></i> 이미지 변경
                                                            </button>
                                                            {{ $errors->first('Image') }}
                                                        </label>
                                                    </form>

                                                    <br/>
                                                    <form action="{{ url('/mypage/info') }}" method="POST" role="form">
                                                        {!! csrf_field() !!}
                                                        <label>파트너형태<span class="set_st">*</span>
                                                            <select name="company_type" class="form-control03 "
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
                                                        </label><br/>
                                                        <label>이름<span class="set_st">*</span>
                                                            <input class="form-control03" type="text" name="name"
                                                                   placeholder=""
                                                                   value="{{$loginUser->name}}">
                                                        </label>
                                                        {{ $errors->first('name') }}
                                                        <br/>

                                                        <label>성별<span class="set_st">*</span><br/>
                                                            <label for="ccc" class="label_n02">
                                                                <input name="sex" id="ccc"
                                                                       type="radio"
                                                                       @if($loginUser->sex =="남성"){{"checked"}}@endif
                                                                       value="남성">남성</label>&nbsp;

                                                            <label for="ppp" class="label_n02">
                                                                <input name="gender" id="ppp"
                                                                       type="radio"
                                                                       @if($loginUser->sex =="여성"){{"checked"}}@endif
                                                                       value="여성">여성</label>
                                                        </label><br/><br/>
                                                        <label for="birth001">생년월일<br/>
                                                            <select name="BOD1" class="form-control03 form-width"
                                                                    id="form_of_birth01">
                                                                @for ($i = 1945; $i <= 2016; $i++)
                                                                    <option {{"value=".$i}} @if(substr($loginUser->BOD,0,4) == $i){{"selected"}}@endif >{{ $i }}</option>
                                                                @endfor

                                                            </select>
                                                            <select name="BOD2" class="form-control03 form-width"
                                                                    id="form_of_birth02">
                                                                @for ($i = 1; $i <= 12; $i++)
                                                                    <option {{"value=".$i}} @if(substr($loginUser->BOD,5,2) == $i){{"selected"}}@endif >{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                            <select name="BOD3" class="form-control03 form-width"
                                                                    id="form_of_birth03">
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    <option {{"value=".$i}} @if(substr($loginUser->BOD,8,2) == $i){{"selected"}}@endif >{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </label><br/>
                                                        <label>지역-시,도<span class="set_st">*</span>
                                                            <select name="address"
                                                                    class="form-control03 ie-form-control"
                                                                    id="address">
                                                                <option value="">선택</option>
                                                                <option value="서울특별시" @if($loginUser->address == "서울특별시"){{"selected"}}@endif>
                                                                    서울특별시
                                                                </option>
                                                                <option value="부산광역시" @if($loginUser->address == "부산광역시"){{"selected"}}@endif>
                                                                    부산광역시
                                                                </option>
                                                                <option value="대구광역시" @if($loginUser->address == "대구광역시"){{"selected"}}@endif>
                                                                    대구광역시
                                                                </option>
                                                                <option value="인천광역시" @if($loginUser->address == "인천광역시"){{"selected"}}@endif>
                                                                    인천광역시
                                                                </option>
                                                                <option value="광주광역시" @if($loginUser->address == "광주광역시"){{"selected"}}@endif>
                                                                    광주광역시
                                                                </option>
                                                                <option value="대전광역시" @if($loginUser->address == "대전광역시"){{"selected"}}@endif>
                                                                    대전광역시
                                                                </option>
                                                                <option value="울산광역시" @if($loginUser->address == "울산광역시"){{"selected"}}@endif>
                                                                    울산광역시
                                                                </option>
                                                                <option value="세종특별자치시" @if($loginUser->address == "세종특별자치시"){{"selected"}}@endif>
                                                                    세종특별자치시
                                                                </option>
                                                                <option value="경기도" @if($loginUser->address == "경기도"){{"selected"}}@endif>
                                                                    경기도
                                                                </option>
                                                                <option value="강원도" @if($loginUser->address == "강원도"){{"selected"}}@endif>
                                                                    강원도
                                                                </option>
                                                                <option value="충청북도" @if($loginUser->address == "충청북도"){{"selected"}}@endif>
                                                                    충청북도
                                                                </option>
                                                                <option value="충청남도" @if($loginUser->address == "충청남도"){{"selected"}}@endif>
                                                                    충청남도
                                                                </option>
                                                                <option value="전라북도" @if($loginUser->address == "전라북도"){{"selected"}}@endif>
                                                                    전라북도
                                                                </option>
                                                                <option value="전라남도" @if($loginUser->address == "전라남도"){{"selected"}}@endif>
                                                                    전라남도
                                                                </option>
                                                                <option value="경상북도" @if($loginUser->address == "경상북도"){{"selected"}}@endif>
                                                                    경상북도
                                                                </option>
                                                                <option value="경상남도" @if($loginUser->address == "경상남도"){{"selected"}}@endif>
                                                                    경상남도
                                                                </option>
                                                                <option value="제주특별자치도" @if($loginUser->address == "제주특별자치도"){{"selected"}}@endif>
                                                                    제주특별자치도
                                                                </option>
                                                            </select>
                                                        </label><br/>
                                                        <!--<div class="checkbox">
                                                          <input type="checkbox" name="checkbox1" id="checkbox1" value="option1" checked="">
                                                          <label for="checkbox1"><a href="#">이용약관</a> 및 <a href="#">개인정보 보호방침</a>에 동의합니다.</label>
                                                        </div>-->
                                                        <button class="button003 signup003 margin-top-10" type="submit">
                                                            등록하기
                                                        </button>
                                                    </form>
                                                </div>


                                                <div class="job-tittle04 margin-bottom-30">
                                                    <h6 class="my_h6 margin-bottom-20">연락처 정보 입력</h6>
                                                    <form action="{{ url('/mypage/numbers') }}" method="POST" role="form">
                                                        {!! csrf_field() !!}
                                                        <label>핸드폰번호<span class="set_st">*</span><br/>
                                                            <select name="phone_num1" class="form-control03 phone_width"
                                                                    id="form_of_business" required="required">
                                                                <option>010</option>
                                                                <option>011</option>
                                                                <option>016</option>
                                                                <option>017</option>
                                                                <option>019</option>
                                                            </select>
                                                            <input class="form-control03 phone_width" type="text"
                                                                   name="phone_num2"
                                                                   placeholder=""
                                                                   value="{{ substr($loginUser->phone_num,3,4) }}">
                                                            <input class="form-control03 phone_width" type="text"
                                                                   name="phone_num3"
                                                                   placeholder=""
                                                                   value="{{ substr($loginUser->phone_num,7,4) }}">
                                                        </label>
                                                        {{ $errors->first('phone_num1') }}
                                                        {{ $errors->first('phone_num2') }}
                                                        {{ $errors->first('phone_num3') }}
                                                        <br/>

                                                        <label>팩스번호
                                                            <input class="form-control03" type="text" name="fax_num"
                                                                   placeholder="" value="{{ $loginUser->fax_num }}">
                                                        </label>
                                                        {{ $errors->first('fax_num') }}
                                                        <br/>
                                                        <button class="button003 signup003 margin-top-10" >등록하기</button>
                                                    </form>
                                                </div>


                                                <div class="job-tittle04-la margin-bottom-30">
                                                    <h6 class="my_h6 margin-bottom-20">이메일 구독 설정</h6>
                                                    <label>이메일 <strong>{{ $loginUser->email }}</strong>
                                                    </label><br/>
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="checkbox1" id="checkbox1"
                                                               value="option1" checked="">
                                                        <label for="checkbox1">크라우드엠의 프로젝트 소식을 구독합니다.</label>
                                                    </div>
                                                    <button class="button003 signup003 margin-top-10" >등록하기</button>
                                                </div>


                                            </div>
                                        </article>


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
