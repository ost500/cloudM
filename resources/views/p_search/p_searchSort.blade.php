<!-- Pagination -->
<h4 id = "count">{{ $projects['count'] }}개의 프로젝트</h4>

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
                            <div class="date_off"> 모집마감 <!--<span>MAY</span>--> </div>
                        </div>
                        <div class="media-body">
                            <a href="{{ url('detail/'.$project['id']) }}">
                                <h5>{{ $project['title']."  ".$project['id'] }}</h5></a>

                        </div>
                        <span class="media-body-sm">예상금액 <span>5,000,000</span>원</span>
                        <span class="media-body-sm">예상기간 <span>30</span>일</span>
                        <span class="media-body-sm la-line">등록일자 <span>2016. 01. 21</span></span>
                    </div>
                </div>
                <!-- Content -->
                <div id="job1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p> {{ $project['category'] }}</p>
                        <!-- Additional Requirements -->
                        <div>
                            <span class="media-body-sm margin-top-23">요구기술</span>
                            <ul class="tags dall margin-top-20 margin-bottom-10">
                                <li><a href="#.">photoshop</a></li>
                                <li><a href="#.">html</a></li>
                                <li><a href="#.">css</a></li>
                                <li><a href="#.">script</a></li>
                                <li><a href="#.">php</a></li>
                            </ul>
                        </div>
                        <div class="tags_bg">
                            <span class="s_icon01">모집마감</span>
                            <span class="s_icon02">총 31명 지원</span>
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
