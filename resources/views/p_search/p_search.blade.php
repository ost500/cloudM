@extends('include.head')
@section('content')
        <!-- Content -->
<div id="content">

    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">


            <div class="heading text-left margin-bottom-20">
                <h4>프로젝트 검색</h4>
            </div>
            <div class="coupen">
                <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
            </div>


            <!-- Side Bar -->
            <div class="row">
                <div class="col-md-3">
                    <div class="job-sider-bar">
                        <h5 class="side-tittle">프로젝트 정렬</h5>
                        <ul class="p_align">
                            <li id="moneyhigh"><a style="cursor:pointer">- 금액 높은 순</a></li>
                            <li id="moneylow"><a style="cursor:pointer">- 금액 낮은 순</a></li>
                            <li id="latestcreate"><a style="cursor:pointer">- 최신 등록 순</a></li>
                            <li id="deadline"><a style="cursor:pointer">- 마감 임박 순</a></li>
                        </ul>
                    </div>


                    <div class="job-sider-bar">
                        <h5 class="side-tittle">프로젝트 카테고리</h5>
                        <ul class="p_align02">
                            <li class="parent dev-category-list">
                                <div class="dev-skipper"></div>
                                <input name="dev" id="dev" type="checkbox"> </input>
                                <label for="dev" class="dev_txt">분야</label>
                                <ul class="child-list">
                                    <li>
                                        <input name="dev" id="dev-11" type="checkbox"> </input>
                                        <label for="dev-11">광고 의뢰</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-12" type="checkbox"> </input>
                                        <label for="dev-12">운영 대행</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-13" type="checkbox"> </input>
                                        <label for="dev-13">Viral</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-14" type="checkbox"> </input>
                                        <label for="dev-14">1회성 프로젝트</label>
                                    </li>
                                </ul>

                            </li>


                            <li class="parent dev-category-list">
                                <div class="dev-skipper"></div>
                                <input name="dev" id="dev" type="checkbox"> </input>
                                <label for="dev" class="dev_txt">업종</label>
                                <ul class="child-list">
                                    <li>
                                        <input name="dev" id="dev-21" type="checkbox"> </input>
                                        <label for="dev-15">의료</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-22" type="checkbox"> </input>
                                        <label for="dev-16">법률</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-23" type="checkbox"> </input>
                                        <label for="dev-17">스타트업</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-24" type="checkbox"> </input>
                                        <label for="dev-18">프랜차이즈</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-25" type="checkbox"> </input>
                                        <label for="dev-19">교육/대학교</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-26" type="checkbox"> </input>
                                        <label for="dev-20">쇼핑몰</label>
                                    </li>
                                </ul>

                            </li>


                        </ul>
                    </div>


                </div>


                <!--
                <div class="col-md-3">
                          <div class="job-sider-bar">
                            <h5 class="side-tittle">프로젝트 정렬</h5>
                                <ul class="p_align">
                                    <li><a href="#">금액 높은 순</a></li>
                                    <li><a href="#">금액 낮은 순</a></li>
                                    <li><a href="#">최신 등록 순</a></li>
                                    <li><a href="#">마감 임박 순</a></li>
                                </ul>
                            <form>
                              <label>
                                <input type="text" class="form-control" placeholder="Location">
                              </label>
                              <label>
                                <input type="text" class="form-control" placeholder="Industry / Role">
                              </label>
                              <button type="submit" class="btn btn-1 btn-sm">Search <i class="fa fa-caret-right"></i></button>
                            </form>

                            <h5 class="side-tittle margin-top-30">Filter Results</h5>

                            <h6>By Region:</h6>
                            <ul class="cate result">
                              <li> <a href="#."> Australia and New Zealand (1)</a></li>
                              <li> <a href="#."> Eastern Africa (1)</a></li>
                              <li> <a href="#."> Melanesia (1)</a></li>
                              <li> <a href="#."> Northern America (1)</a></li>
                              <li> <a href="#."> Southern Asia (1)</a></li>
                              <li> <a href="#."> Southern Europe (1)</a> </li>
                            </ul>

                            <a href="#." class="btn btn-1 btn-sm margin-top-50">filter results <i class="fa fa-caret-right"></i></a> </div>
                        </div>
                -->


                <!-- Job  Content -->
                <div class="col-md-9 job-right">

                    <!-- About Admin -->
                    <!--<h4 class="font-normal margin-top-50 margin-bottom-20">available jobs</h4>-->


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
                                <input type="text" class="form-control02 form-control01" placeholder="검색어를 입력하세요"><a
                                        class="sea_button" href="#">검색</a>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <ul class="pagination">

                            <li><a id="prevPblock" style="cursor: pointer"><i class="fa fa-angle-left"></i></a></li>
                            <li id="pagination"></li>
                            <li><a id="nextPblock" style="cursor: pointer"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>

                    <div id="check"></div>


                </div>
            </div>
        </div>
    </section>
</div>


</div>
<script type="text/javascript" src="js/projectList.js"></script>


@include('include.footer')
@endsection