@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">


                <div class="coupen">
                    <p>직접 <span>파트너</span>를 찾아보세요.</p>
                </div>


                <!-- Side Bar -->
                <div class="row">


                    <!-- Job  Content -->
                    <div class="col-md-12 job-right">

                        <!-- About Admin -->
                        <!--<h4 class="font-normal margin-top-50 margin-bottom-20">available jobs</h4>-->
                        <div class="row">

                            <!-- Grid Layout -->
                            <div class="col-md-6">

                                <div class="short-by">
                                    <!--<label>
                                      <select class="selectpicker">
                                        <option>-Sort by-</option>
                                        <option>-Sort by-</option>
                                        <option>-Sort by-</option>
                                      </select>
                                    </label>-->

                                    <label>
                                        <select id="job_option" name="job" class="form-control02">
                                            <option selected="selected" value="">분야</option>
                                            <option value="all">모두</option>
                                            <optgroup label="매체 광고">
                                                <option value="네이버CPC">네이버CPC</option>
                                                <option value="구글광고">구글광고</option>
                                                <option value="페이스북광고">페이스북광고</option>
                                                <option value="매체 기타">매체 기타</option>
                                            </optgroup>
                                            <optgroup label="바이럴">
                                                <option value="네이버SEO">네이버SEO</option>
                                                <option value="언론보도">언론보도</option>
                                                <option value="컨텐츠 배포">컨텐츠 배포</option>
                                                <option value="체험단 모집">체험단 모집</option>
                                                <option value="바이럴 기타">바이럴 기타</option>
                                            </optgroup>
                                            <optgroup label="운영대행">
                                                <option value="블로그">블로그</option>
                                                <option value="페이스북페이지">페이스북페이지</option>
                                                <option value="기타SNS">기타SNS</option>
                                                <option value="홈페이지">홈페이지</option>
                                                <option value="운영대행 기타">운영대행 기타</option>
                                            </optgroup>
                                            <optgroup label="1회성 프로젝트">
                                                <option value="개발">개발</option>
                                                <option value="디자인">디자인</option>
                                                <option value="웹툰">웹툰</option>
                                                <option value="영상">영상</option>
                                                <option value="1회성 프로젝트 기타">1회성 프로젝트 기타</option>
                                            </optgroup>



                                        </select>
                                        <select id="job_option2" name="job" class="form-control02">
                                            <option selected="selected" value="">업종</option>
                                            <option value="all">모두</option>
                                            <option value="의료">의료</option>
                                            <option value="법률">법률</option>
                                            <option value="스타트업">스타트업</option>
                                            <option value="프랜차이즈">프랜차이즈</option>
                                            <option value="교육/대학교">교육/대학교</option>
                                            <option value="쇼핑몰">쇼핑몰</option>

                                        </select>
                                        <input id="literal_search_text" type="text"
                                               class="form-control02 form-control01" placeholder="검색어를 입력하세요"><a
                                                id="literal_search_button" class="sea_button" href="#">검색</a>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div id="list"></div>

                        <div style="padding: 40px;" class="col-md-7">
                            <ul class="pagination">
                                <li><a id="prevPblock" style="cursor: pointer"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li id="pagination"></li>
                                <li><a id="nextPblock" style="cursor: pointer"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>
    <script type="text/javascript" src="js/partnerList.js"></script>


    @include('include.footer')
@endsection