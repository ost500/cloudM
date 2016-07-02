@extends('layouts.master_layout')
@section('right_content')
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
                                                <a href="{{ url('/portfolio/'.$portfolio->id) }}"><img src="{{ $portfolio->image1 }}" alt="" class="img-responsive"></a>
                                            </div>
                                            <div class="caption">
                                                <a href="{{ url('/portfolio/'.$portfolio->id) }}"><h3 class="thum_title">{{ $portfolio->title }}</h3></a>
                                                <p class="thum_category">{{ $portfolio->area }} > {{ $portfolio->category }}</p>
                                                <p><a href="{{ url('/portfolio/'.$portfolio->id) }}" class="btn btn-primary margin-top-10" role="button">자세히보기</a></p>
                                            </div>
                                        </div>
                                    </div>



                                @endforeach

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

