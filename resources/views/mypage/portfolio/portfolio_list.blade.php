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
                                <a href="{{ url("/setting") }}">
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
                                        <div class="panel-heading">


                                            <div class="job-tittle02 txt_color_g">
                                                <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>

                                                <a href="{{ url('portfolio/create') }}" style="cursor:pointer" id="intro_edit_button" class="button002 signup002 margin-top-12">
                                                    추가하기
                                                </a>
                                                <div class="row">

                                                    @foreach($portfolios as $portfolio)
                                                        {{--<div class="col-lg-4 port-img-d"><img--}}
                                                        {{--class="img-responsive port-img"--}}
                                                        {{--src="{{ $portfolio->image1 }}">--}}
                                                        {{--</div>--}}




                                                        <div class="col-md-4">
                                                            <div class="thumbnail">
                                                                <div class="thum_imgbox">
                                                                    <img src="{{ $portfolio->image1 }}" alt="" class="img-responsive">
                                                                </div>
                                                                <div class="caption">
                                                                    <h3 class="thum_title">{{ $portfolio->title }}</h3>
                                                                    <p class="thum_category">{{ $portfolio->area }} > {{ $portfolio->category }}</p>
                                                                    <p><a href="#" class="btn btn-primary margin-top-10" role="button">자세히보기</a></p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    @endforeach

                                                </div>
                                            </div>


                                        </div>
                                        <!-- Content -->
                                        <!--<div id="job1" class="panel-collapse collapse in">
                                          <div class="panel-body">
                                            <p> [프로젝트 진행 방식] 시작시점에 미팅, 주 1회 미팅 등 [프로젝트의 현재 상황] 리뉴얼 기획 제안서만 있음 [상세한 업무 내용] 반응형 웹 제작 [참고자료 / 유의사항] http://www.skhynix.com/kor/index.jsp 와 같은 톤앤매너 구상</p>


                                            </div>
                                          </div>-->


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

