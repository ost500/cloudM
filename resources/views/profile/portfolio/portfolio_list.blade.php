@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">포트폴리오 관리</span>
        <p class="padding-top-5">체계적인 포트폴리오 관리를 통해 광고주의 선택을 받을 수 있습니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        <div class="job-content job-post-page">
            <!-- Job Tittle -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <!-- PANEL HEADING -->
                    <div class="panel-heading">


                        <div class="job-tittle02 txt_color_g">
                            <h6 class="my_h6 margin-bottom-20 margin-top-20">포트폴리오</h6>

                            <a href="{{ url('profile/portfolio/create') }}" style="cursor:pointer" id="intro_edit_button" class="button002 signup002 margin-top-12">
                                추가하기
                            </a>
                            <div class="row">

                                @if($portfolios->isEmpty())
                                    <div class="text-center panel-body">
                                        <p class="text-center padding-bottom-15"><i class="fa fa-file-image-o fa-5x"></i></p>
                                        포트폴리오가 없습니다
                                    </div>
                                @endif

                                @foreach($portfolios as $portfolio)
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <div class="thum_imgbox">
                                                <a href="{{ url('/profile/portfolio/'.$portfolio->id) }}"><img src="{{ $portfolio->image1 }}_228_200" alt="" class="img-responsive"></a>
                                            </div>
                                            <div class="caption">
                                                <a href="{{ url('/profile/portfolio/'.$portfolio->id) }}"><h3 class="thum_title"><?=($portfolio->top)?mb_strcut($portfolio->title, 0, 30) . "..":mb_strcut($portfolio->title, 0, 38)?> <?=($portfolio->top)?"<span class=\"port_title_box\">대표</span>":"" ?></h3></a>
                                                <p class="thum_category">
                                                <ul class="tags">
                                                    <?php
                                                    $areas = explode(",", $portfolio->area);
                                                    if (sizeof($areas) > 1) echo "<li><a href=\"#.\">{$areas[0]}</a></li> <li><a href=\"#.\">외". (sizeof($areas)-1) . "개</a></li>";
                                                    else echo "<li><a href=\"#.\">$portfolio->area</a></li>";
                                                    ?>
                                                    <li><a href="#."> {{ $portfolio->category }} 분야</a></li>
                                                </ul>
                                                </p>
                                                <p><a href="{{ url('/profile/portfolio/'.$portfolio->id) }}" class="btn btn-primary margin-top-5" role="button">자세히보기</a></p>
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

