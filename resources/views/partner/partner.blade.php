@extends('include.head')
@section('content')
        <!-- Content -->
<div id="content">

    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">


            <div class="heading text-left margin-bottom-20">
                <h4>파트너 목록</h4>
            </div>
            <div class="coupen">
                <p>Crowd m에서 직접 <span>파트너</span>를 찾아보세요.</p>
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
                                    <select name="job" class="form-control02" id="id_job">
                                        <option selected="selected" value="">분야</option>
                                        <option value="all">모두</option>
                                        <option value="바이럴">바이럴</option>
                                        <option value="SNS">SNS</option>
                                        <option value="디자인">디자인</option>
                                        <option value="콘텐츠제작">콘텐츠제작</option>
                                    </select>
                                    <input type="text" class="form-control02 form-control01" placeholder="검색어를 입력하세요"><a
                                            class="sea_button" href="#">검색</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="pagination">
                                <li><a id="prevPblock" style="cursor: pointer"><i class="fa fa-angle-left"></i></a></li>
                                <li id="pagination"></li>
                                <li><a id="nextPblock" style="cursor: pointer"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="list"></div>


                </div>
            </div>
        </div>
    </section>
</div>


</div>
<script type="text/javascript" src="js/partnerList.js"></script>


@include('include.footer')
@endsection