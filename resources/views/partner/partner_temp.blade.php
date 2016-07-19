@extends('include.head')
@section('content')
    <link rel="stylesheet" href="/css/js_tree.css">
    <!-- Content -->
    <div id="content">

        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-70">
            <div class="container">


                <div class="coupen  padding-bottom-70">
                    <div class="col-md-4 padding-top-15">
                        <p class="h4 text-bold"><span>광고대행사</span>를 검색해보세요.</p>
                        <p class="padding-top-15" id="title_count">총 {{ $partners->count() }}곳의 광고대행사가 등록 되었습니다.</p>
                    </div>

                    <div class="col-md-8 padding-top-25">
                        <div class="pull-right">
                        <input id="literal_search_text" type="text"
                               class="form-control01" placeholder="검색어를 입력하세요" value=""><a
                                id="literal_button" class="sea_button" href="#">검색</a>
                        </div>
                    </div>
                </div>
                <!-- Grid Layout -->


                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3 margin-top-10">


                        <div class="job-sider-bar padding-bottom-15">
                            <h5 class="side-tittle">전문업종 검색</h5>


                            <div id="tree_3"></div>
                        </div>

                        <div class="job-sider-bar padding-bottom-15">
                            <h5 class="side-tittle">전문분야 검색</h5>

                            <div id="tree_4"></div>
                        </div>


                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">

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
    <script type="text/javascript" src="js/partnerList.js"></script>


    @include('include.footer')
@endsection