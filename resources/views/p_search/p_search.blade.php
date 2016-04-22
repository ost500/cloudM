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
                            <li><a href="#">- 금액 높은 순</a></li>
                            <li><a href="#">- 금액 낮은 순</a></li>
                            <li><a href="#">- 최신 등록 순</a></li>
                            <li><a href="#">- 마감 임박 순</a></li>
                        </ul>
                    </div>


                    <div class="job-sider-bar">
                        <h5 class="side-tittle">프로젝트 카테고리</h5>
                        <ul class="p_align02">
                            <li class="parent dev-category-list">
                                <div class="dev-skipper"></div>
                                <input name="dev" id="dev" type="checkbox"> </input>
                                <label for="dev" class="dev_txt">카테고리_01</label>
                                <ul class="child-list">
                                    <li>
                                        <input name="dev" id="dev-2" type="checkbox"> </input>
                                        <label for="dev-2">바이럴</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-3" type="checkbox"> </input>
                                        <label for="dev-3">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-4" type="checkbox"> </input>
                                        <label for="dev-4">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-5" type="checkbox"> </input>
                                        <label for="dev-5">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-6" type="checkbox"> </input>
                                        <label for="dev-6">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-7" type="checkbox"> </input>
                                        <label for="dev-7">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-8" type="checkbox"> </input>
                                        <label for="dev-8">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-9" type="checkbox"> </input>
                                        <label for="dev-9">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-10" type="checkbox"> </input>
                                        <label for="dev-10">메뉴_01</label>
                                    </li>
                                </ul>

                            </li>


                            <li class="parent dev-category-list">
                                <div class="dev-skipper"></div>
                                <input name="dev" id="dev" type="checkbox"> </input>
                                <label for="dev" class="dev_txt">카테고리_01</label>
                                <ul class="child-list">
                                    <li>
                                        <input name="dev" id="dev-2" type="checkbox"> </input>
                                        <label for="dev-2">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-3" type="checkbox"> </input>
                                        <label for="dev-3">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-4" type="checkbox"> </input>
                                        <label for="dev-4">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-5" type="checkbox"> </input>
                                        <label for="dev-5">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-6" type="checkbox"> </input>
                                        <label for="dev-6">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-7" type="checkbox"> </input>
                                        <label for="dev-7">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-8" type="checkbox"> </input>
                                        <label for="dev-8">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-9" type="checkbox"> </input>
                                        <label for="dev-9">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-10" type="checkbox"> </input>
                                        <label for="dev-10">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-11" type="checkbox"> </input>
                                        <label for="dev-11">메뉴_01</label>
                                    </li>
                                    <li>
                                        <input name="dev" id="dev-12" type="checkbox"> </input>
                                        <label for="dev-12">메뉴_01</label>
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
                                    <input type="text" class="form-control02 form-control01" placeholder="검색어를 입력하세요"><a
                                            class="sea_button" href="#">검색</a>
                                </label>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="col-md-6">
                            <ul class="pagination">
                                <li><a href="#."><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#.">1</a></li>
                                <li><a class="current" href="#.">2</a></li>
                                <li><a href="#.">3</a></li>
                                <li><a href="#.">4</a></li>
                                <li><a href="#."><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div id="check"></div>


                </div>
            </div>
        </div>
    </section>
</div>


</div>
<script type="text/javascript">

    function viewLoad(option) {
        var display_results = $("#check");
        display_results.html("loading...");
        $.ajaxSetup({cache : false});

        $.ajax({
            url: "p_search/"+option,
            success: function (result, b) {
                display_results.html(result, b);
            }

        });
    }
    $(function () {
        viewLoad("all");

    });

    $('#dev-2').change(function(){
        if($('#dev-2').is(':checked')){
            viewLoad("바이럴");
        }
        else{
            viewLoad("all");
        }
    });


    //        var xhttp = new XMLHttpRequest();

    //        xhttp.onreadystatechange = function() {
    //            if (xhttp.readyState == 4 && xhttp.status == 200) {
    //                display_results.html(xhttp.response);
    //            }
    //        };


    //        xhttp.open("GET", "p_search/Hello", false);
    //        xhttp.send();


    //    var arr = new Array();
    //    arr[0] = $("#dev-2");
    //
    //    function sortexe() {
    //        var Plus = "ab";
    //        for (var i = 1; i < arr[0].length; i++) {
    //            Plus = Plus.add(arr[0][i].toString());
    //            Plus = Plus.add("hi");
    //        }
    //        $("#check").html(Plus);
    //    }
    //    //클릭된 것들 다 찾아서 실행
    //
    //    $(function () {
    //        //각각의 체크박스에 클릭메서드 입력
    //        $("#dev-2").click(function () {
    //
    //            arr[0][1] = 1;
    //
    //            sortexe();
    //
    //        })
    //    })
</script>




@include('include.footer')
@endsection