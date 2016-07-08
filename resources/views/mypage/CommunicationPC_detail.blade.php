@extends('layouts.master_layout')
@section('right_content')


    <!-- Job Content -->

    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span style="color:black" class="h3 text-bold">커뮤니케이션 게시판</span>
        <p class="padding-top-5">대화를 나눠 보세요.</p>
    </div>

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
                        <div class="job-tittle03">

                            <div class="media-body02">
                                <h3 class="margin-bottom-20">{{ $communi->title }}</h3>
                            </div>
                            <span class="media-body-sm">
                            <i class="fa fa-clock-o"></i> 날짜 <span>{{$communi->created_at}}</span></span>
                            <span class="media-body-sm"><i
                                        class="fa fa-calendar-minus-o"></i> 글쓴이 <span>{{ $communi->writer->name }}</span></span>
                            @if($communi->writer == Auth::user())
                                <span style="cursor:pointer" id="edit" class="media-body-sm"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>  <span>수정하기</span></span>
                                <script>
                                    $("#edit").click(function () {
                                        window.location.assign("{{ route('communication_update',['id' => $communi->id]) }}");
                                    });
                                </script>
                            @endif
                            @if($communi->writer == Auth::user())
                                <span style="cursor:pointer" id="del" class="media-body-sm la-line"><i
                                            class="fa fa-times" aria-hidden="true"></i>  <span>삭제하기</span></span>
                                <script>
                                    $("#del").click(function () {
                                        window.location.assign("");
                                    });
                                </script>
                            @endif


                            <div class="panel02 panel-default02 margin-top-20">


                            </div>
                        </div>


                        <div style="clear:both;"></div>
                        <div class="p_search02_txt margin-top-20">
                            <h5>내용</h5>

                            <br>
                            {{ $communi->content }}
                            <br>
                            <br><br><br><br><br>

                        </div>
                        <a href="{{ url('client/project/carryon/'. $communi->project_id ) }}" class="button004">목록</a>


                    </div>


                </div>
            </div>
        </div>

    </div>






@endsection

