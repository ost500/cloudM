@extends('include.head')
@section('content')


        <!-- Content -->
<div id="content">

    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">


            <div class="heading text-left margin-bottom-20">
                <h4>프로젝트 등록</h4>
            </div>
            <div class="coupen">
                <p>프로젝트 등록 전에 <span>광고주 정보</span>를 입력해주세요.</p>
            </div>


            <!-- Side Bar -->
            <div class="row">


                <!-- Job  Content -->
                <div class="col-md-12 job-right">


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
                                    <div class="col-lg-4 job-right margin-bottom-40">
                                        <img class="step01 img-responsive" src="/images/step1.jpg">
                                    </div>
                                    <!-- Story -->
                                    <div class="col-lg-8 job-right">
                                        <article>
                                            <div class="signup02">


                                                <form action="{{ url('p_add/2') }}" method="POST" role="form">
                                                    {!! csrf_field() !!}
                                                    <div class="margin-bottom-69 ">

                                                        <!--<h6 class="my_h6 margin-bottom-20">기본 정보 입력</h6>-->
                                                        <label>이름<span class="set_st">*</span>
                                                            <input class="form-control03" type="text" name="title"
                                                                   placeholder="">
                                                        </label><br/>
                                                        {{--<label>핸드폰번호<span class="set_st">*</span><br/>--}}
                                                            {{--<select name="form_of_phone"--}}
                                                                    {{--class="form-control03 phone_width"--}}
                                                                    {{--id="form_of_business" required="required">--}}
                                                                {{--<option>010</option>--}}
                                                                {{--<option>011</option>--}}
                                                                {{--<option>016</option>--}}
                                                                {{--<option>017</option>--}}
                                                                {{--<option>019</option>--}}
                                                            {{--</select>--}}
                                                            {{--<input class="form-control03 phone_width" type="text"--}}
                                                                   {{--name="phone_num"--}}
                                                                   {{--placeholder="">--}}
                                                            {{--<input class="form-control03 phone_width" type="text"--}}
                                                                   {{--name=""--}}
                                                                   {{--placeholder="">--}}
                                                        {{--</label><br/>--}}
                                                        {{--<label>회사형태<span class="set_st">*</span>--}}
                                                            {{--<select name="address_sido"--}}
                                                                    {{--class="form-control03 ie-form-control"--}}
                                                                    {{--id="address_sido">--}}
                                                                {{--<option value="">개인</option>--}}
                                                                {{--<option value="">팀</option>--}}
                                                                {{--<option value="">개인 사업자</option>--}}
                                                                {{--<option value="">법인 사업자</option>--}}
                                                            {{--</select>--}}
                                                        {{--</label><br/>--}}
                                                        {{--<label>광고주소개<span class="set_st">*</span>--}}
                                                        {{--<textarea name="advertiser_intro" class="form-control04"--}}
                                                                  {{--id="company_intro" rows="4" cols="40"--}}
                                                                  {{--autocomplete="off"></textarea></label><br/>--}}
                                                        {{--<span class="gry">회사(개인)에 대해 간략하게 설명해주세요. (150자 이내)</span>--}}
                                                        <!--<div class="checkbox">
                                                          <input type="checkbox" name="checkbox1" id="checkbox1" value="option1" checked="">
                                                          <label for="checkbox1"><a href="#">이용약관</a> 및 <a href="#">개인정보 보호방침</a>에 동의합니다.</label>
                                                        </div>-->
                                                        <button class="button004 signup003 margin-top-10" type="submit">등록하기</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </article>
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