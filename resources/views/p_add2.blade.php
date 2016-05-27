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
                    <p>상세하게 작성해주실수록 <span>더 적합한 파트너</span>를 만날 수 있습니다.</p>
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
                                            <img class="step01 img-responsive" src="/images/step2.jpg">
                                        </div>
                                        <!-- Story -->
                                        <div class="col-lg-8 job-right">
                                            <article>
                                                <div class="signup02">


                                                    <div class="margin-bottom-40 job-tittle04 padding-bottom-40">
                                                        <form action="{{ url('p_add/2') }}" method="post" role="form">
                                                            {!! csrf_field() !!}
                                                            <label for="ca001">카테고리<span class="set_st">*</span><br/>

                                                                <select name="category" class="form-control03">
                                                                    <option name="카테고리">카테고리</option>
                                                                    <option name="키워드">광고 의뢰</option>
                                                                    {{--<option>바이럴</option>--}}
                                                                    {{--<option>SNS</option>--}}
                                                                    {{--<option>언론</option>--}}
                                                                    {{--<option>영상</option>--}}
                                                                    {{--<option>디자인</option>--}}
                                                                    {{--<option>콘텐츠 제작</option>--}}
                                                                    {{--<option>기타</option>--}}
                                                                </select>


                                                            </label>
                                                            <br/>
                                                            <label>프로젝트 제목<span class="set_st">*</span>
                                                                <input class="form-control03" type="text" name=""
                                                                       placeholder="">
                                                            </label><br/>
                                                            <label>예상 기간 (일)<span class="set_st">*</span>
                                                                <input class="form-control03 " type="text" name=""
                                                                       placeholder="">
                                                            </label><br/><span class="gry">프로젝트를 진행할 기간을 일 단위로 입력해 주세요. (최대 3자리, 예 : 10일)</span><br/><br/>
                                                            <label>지출 가능 예산 (원)<span class="set_st">*</span>
                                                                <input class="form-control03" type="text" name=""
                                                                       placeholder="">
                                                            </label><br/><span class="gry">지출 가능한 예산을 입력해 주세요. ( VAT 별도, 예 : 100,000,000)</span><br/><br/>
                                                            <label>기획상태<span class="set_st">*</span><br/>
                                                                <label for="e01" class="label_n02"><input name="eee"
                                                                                                          id="e01"
                                                                                                          type="radio"
                                                                                                          value="e01">아이디어만
                                                                    있습니다.</label><br/>
                                                                <label for="e02" class="label_n02"><input name="eee"
                                                                                                          id="e02"
                                                                                                          type="radio"
                                                                                                          value="e02">필요한
                                                                    내용들을
                                                                    간단히 정리했습니다.</label><br/>
                                                                <label for="e03" class="label_n02"><input name="eee"
                                                                                                          id="e03"
                                                                                                          type="radio"
                                                                                                          value="e03">상세한
                                                                    기획 문서가
                                                                    존재합니다.</label>
                                                            </label><br/><br/>
                                                            <label>프로젝트 내용<span class="set_st">*</span>
                                                        <textarea name="p_intro" class="form-control05" id="p_intro"
                                                                  rows="4" cols="40" autocomplete="off">
                                                        <프로젝트 진행 방식>
                                                        예시) 시작시점에 미팅, 주 1회 미팅 등

                                                        <프로젝트의 현재 상황>
                                                        예시) 기획 여부, 컨텐츠 준비 여부, 타겟 고객, 진행 계획 등

                                                        <상세한 업무 내용>
                                                        예시) 사이트의 용도, 페이지 수, 레이아웃(비슷한 페이지) 수 등

                                                        <참고자료 / 유의사항>
                                                        예시) 참고사이트, 기타 유의사항 등
                                                        </textarea></label><br/>
                                                            <span class="rd"><span class="rd_box">주의</span> 이메일, 전화번호 등을 게시하는 경우 서비스 이용에 제재를 받을 수 있습니다.</span><br/><br/>
                                                            <label>관련기술<span class="set_st">*</span>
                                                                <input class="form-control03" type="text" name=""
                                                                       placeholder="">
                                                            </label><br/><span class="gry">다수의 관련 기술을 입력 할때에는 쉼표(,)로 구분해 주세요. (최대 5개)<br/>
                                                        예) Photoshop, Android, HTML5, Python, Django</span>
                                                    </div>


                                                    <div class="margin-bottom-59 padding-bottom-30">
                                                        <label for="ca002">모집 마감일자<span class="set_st">*</span><br/>
                                                            <select name="ca002" class="form-control03"
                                                                    id="form_of_birth01">
                                                                <option>2016년 2월 29일</option>
                                                                <option>등록 후 2일 날짜</option>
                                                                <option>등록 후 3일 날짜</option>
                                                                <option>등록 후 4일 날짜</option>
                                                                <option>등록 후 5일 날짜</option>
                                                                <option>등록 후 6일 날짜</option>
                                                                <option>등록 후 7일 날짜</option>
                                                            </select>
                                                        </label><br/><span class="gry">지원자를 모집하는 기간입니다. 최소 1일에서 최대 14일까지 가능합니다.</span><br/><br/>
                                                        <label for="ca003">사전미팅<span class="set_st">*</span><br/>
                                                            <select name="ca003" class="form-control03"
                                                                    id="form_of_birth01">
                                                                <option>오프라인 미팅</option>
                                                                <option>온라인 미팅 (카카오톡, skype, 행아웃 등)</option>
                                                            </select>
                                                        </label><br/><span class="gry">사전 미팅 방식을 선택해주세요.<br/>
                                                        마음에 드는 지원자와의 미팅을 크라우드엠에서 주선해드립니다.</span><br/><br/>
                                                        <label for="ca004">사전 미팅 지역<span class="set_st">*</span><br/>
                                                            <select name="ca004" class="form-control03"
                                                                    id="form_of_birth01">
                                                                <option value="">선택</option>
                                                                <option value="1">서울특별시</option>
                                                                <option value="2">부산광역시</option>
                                                                <option value="3">대구광역시</option>
                                                                <option value="4">인천광역시</option>
                                                                <option value="5">광주광역시</option>
                                                                <option value="6">대전광역시</option>
                                                                <option value="7">울산광역시</option>
                                                                <option value="8">세종특별자치시</option>
                                                                <option value="9">경기도</option>
                                                                <option value="10">강원도</option>
                                                                <option value="11">충청북도</option>
                                                                <option value="12">충청남도</option>
                                                                <option value="13">전라북도</option>
                                                                <option value="14">전라남도</option>
                                                                <option value="15">경상북도</option>
                                                                <option value="16">경상남도</option>
                                                                <option value="17">제주특별자치도</option>
                                                            </select>
                                                        </label><br/>
                                                        <label for="ca002">프로젝트 예상 시작일<span class="set_st">*</span><br/>
                                                            <select name="ca002" class="form-control03"
                                                                    id="form_of_birth01">
                                                                <option>2016년 2월 29일</option>
                                                                <option>등록 후 2일 날짜</option>
                                                                <option>등록 후 3일 날짜</option>
                                                                <option>등록 후 4일 날짜</option>
                                                                <option>등록 후 5일 날짜</option>
                                                                <option>등록 후 6일 날짜</option>
                                                                <option>등록 후 7일 날짜</option>
                                                            </select>
                                                        </label><br/><br/>
                                                        <label>프로젝트 매니징 경험<span class="set_st">*</span><br/>
                                                            <label for="m01" class="label_n02"><input name="mmm"
                                                                                                      id="m01"
                                                                                                      type="radio"
                                                                                                      value="m01">있습니다.</label>
                                                            &nbsp;
                                                            <label for="m02" class="label_n02"><input name="mmm"
                                                                                                      id="m02"
                                                                                                      type="radio"
                                                                                                      value="m02">없습니다.</label>
                                                        </label>
                                                        <button class="button005 margin-top-10" type="submit">프로젝트등록하기
                                                        </button>
                                                        </form>
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
            </div>
        </section>
    </div>


    @include('include.footer')
@endsection