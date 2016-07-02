@extends('include.head')
@section('content')
    <link rel="stylesheet" href="/css/js_tree.css">
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">


                <div class="coupen  padding-bottom-70">
                    <div class="col-md-4">
                        <p class="h4 text-bold"><span>프로젝트</span>를 검색해보세요.</p>
                        <p class="padding-top-15" id="title_count">총 {{ $projects->count() }}개의 프로젝트가 등록 되었습니다.</p>
                    </div>

                    <div class="col-md-8">
                        <div class="pull-right">
                        <input id="literal_text" type="text"
                               class="form-control01" placeholder="검색어를 입력하세요" value=""><a
                                id="literal_button" class="sea_button" href="#">검색</a>
                        </div>
                    </div>
                </div>
                <!-- Grid Layout -->


                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3 margin-top-10">
                        <div class="job-sider-bar">
                            <h5 class="side-tittle">프로젝트 정렬</h5>
                            <div class="col-md-12 padding-0 category-align">
                                <div class="col-md-6 padding-0 ">
                                    <a id="moneyhigh">- 금액 높은 순</a>
                                </div>
                                <div class="col-md-6 padding-0">
                                    <a id="moneylow">- 금액 낮은 순</a>
                                </div>
                                <div class="col-md-6 padding-0">
                                    <a id="latestcreate">- 최신 등록 순</a>
                                </div>
                                <div class="col-md-6 padding-0">
                                    <a id="deadline">- 마감 임박 순</a>
                                </div>
                            </div>
                        </div>


                        <div class="job-sider-bar">
                            <h5 class="side-tittle">프로젝트 카테고리</h5>


                            <div id="tree_2"></div>
                            <div id="tree_2_1"></div>
                        </div>


                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">

                        <div id="check" class=" margin-top-10"></div>

                        <div class="col-md-12">
                            <ul class="pagination">
                                <p></p>
                                <li><a id="prevPblock" style="cursor: pointer"><i class="fa fa-angle-left"></i></a></li>
                                <li id="pagination"></li>
                                <li><a id="nextPblock" style="cursor: pointer"><i class="fa fa-angle-right"></i></a>
                                </li>
                                <p></p>
                            </ul>

                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>


    </div>



    <script src="/js/js.cookie.js"></script>
    <script src="/js/jstree.min.js"></script>
    <script src="/js/form_wizard_main.js"></script>

    <script src="/js/ui-treeview.js"></script>

    <script>
        jQuery(document).ready(function () {
            Main.init();
            UITreeview.init();
        });
    </script>
    <script type="text/javascript" src="js/projectList.js"></script>


    @include('include.footer')
@endsection