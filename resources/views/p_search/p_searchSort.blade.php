<!-- Pagination -->
<h5 id="count">{{ $projects['count'] }}개의 프로젝트</h5>

@foreach($projects as $project)
    @if($project['title'])
        <!-- Job Content -->
        <div id="accordion">

            <!-- Job Section -->
            <div class="job-content job-post-page margin-top-20">
                <!-- Job Tittle -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <!-- Save -->
                        <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                        <!-- PANEL HEADING -->
                        <div class="panel-heading">
                            <div class="job-tittle">
                                <div class="media-left">
                                    @if($project['step'] == "게시" || $project['step'] == "미팅")
                                        <div class="date_on"> 모집중 <!--<span>MAY</span>--> </div>
                                    @else
                                        <div class="date_off"> 모집마감 <!--<span>MAY</span>--> </div>
                                    @endif

                                </div>
                                <div class="media-body">
                                    <a href="{{ url('detail/'.$project['id']) }}">
                                        <h5>{{ $project['title']."  ".$project['id'] }}</h5></a>

                                </div>

                                <span class="media-body-sm">예상금액 <span>{{ number_format($project['budget']) }}</span>원</span>
                                <span class="media-body-sm">예상기간 <span>{{ $project['estimated_duration'] }}</span>일</span>
                                <span class="media-body-sm la-line">등록일자 <span>{{ $project['updated_at'] }}</span></span>
                            </div>
                        </div>
                        <!-- Content -->
                        <div id="job1" class="panel-collapse collapse in">
                            <div class="panel-body">

                                <p> {{ $project['intro'] }}</p>
                                <!-- Additional Requirements -->
                                <div>

                                    <ul class="tags dall margin-top-20 margin-bottom-10">
                                        <li><a href="#.">{{ $project['area'] }}</a></li>
                                        <li><a href="#.">{{ $project['category'] }}</a></li>
                                    </ul>
                                </div>
                                <div class="tags_bg">
                                    <span class="s_icon01">{{ $project['step'] }} 중</span>
                                    <span class="s_icon02">총 {{ $project->application->count() }}명 지원</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @else
    @endif
@endforeach
