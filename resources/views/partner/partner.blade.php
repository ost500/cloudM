@extends('include.head')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-30">
            <div class="container">

                <div class="coupen  padding-bottom-70">
                    <div class="col-md-4 padding-top-15">
                        <p class="h4 text-bold"><span>파트너</span>를 검색해보세요.</p>
                        <p class="padding-top-15" id="title_count">총 {{ $partners->count() }}명의 파트너가 등록 되었습니다.</p>
                    </div>

                    <div class="col-md-8 padding-top-25">
                        <div class="pull-right">
                            <div class="short-by">
                                <label>
                                    <select id="job_option" name="job" class="form-control02">
                                        <option selected="selected" value="">분야</option>
                                        <option value="all">모두</option>
                                        <optgroup label="매체 광고">
                                            <option value="네이버CPC">네이버CPC</option>
                                            <option value="언론보도">언론보도</option>
                                            <option value="구글광고">구글광고</option>
                                            <option value="페이스북광고">페이스북광고</option>
                                            <option value="매체 기타">매체 기타</option>
                                        </optgroup>
                                        <optgroup label="바이럴">
                                            <option value="네이버SEO">네이버SEO</option>
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
                                        <optgroup label="오프라인 광고">
                                            <option value="TV광고">TV광고</option>
                                            <option value="신문광고">신문광고</option>
                                            <option value="라디오광고">라디오광고</option>
                                            <option value="지하철광고">지하철광고</option>
                                            <option value="버스광고">버스광고</option>
                                            <option value="잡지광고">잡지광고</option>
                                            <option value="외부광고">외부광고</option>
                                            <option value="오프라인 기타">오프라인 기타</option>
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
                                        <option value="기타">기타</option>

                                    </select>
                                    <input id="literal_search_text" type="text"
                                           class="form-control02 form-control01" placeholder="검색어를 입력하세요"><a
                                            id="literal_search_button" class="sea_button" href="#">검색</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Side Bar -->
                <div class="row">
                    <!-- Job  Content -->
                    <div class="col-md-12 job-right">

                        <div id="list"></div>

                        <div class="col-md-7 pull-right padding-top-30">
                            <ul class="pagination" >
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