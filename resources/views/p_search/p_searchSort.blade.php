<!-- Pagination -->
@foreach($projects as $project)
    @if($project['title'])
        <!-- Job Content -->
        <div id="accordion">

            <!-- Job Section -->
            <div class="job-content02 job-post-page margin-bottom-10">
                <!-- Job Tittle -->
                <div class="panel-group margin-bottom-0">
                    <div class="panel panel-default">
                        <!-- Save -->
                        <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                        <!-- PANEL HEADING -->
                        <div class="panel-heading">
                            <div class="job-tittle">
                                <div class="media-left">
                                    @if(($project['step'] == "게시" || $project['step'] == "미팅") && $project['deadline'] >= date('Y-m-d'))
                                        <div class="date_on"> 모집중 <!--<span>MAY</span>--> </div>
                                    @else
                                        <div class="date_off"> 모집마감 <!--<span>MAY</span>--> </div>
                                    @endif

                                </div>
                                <div class="media-body">
                                    <a href="{{ url('detail/'.$project['id']) }}">
                                        <h5>{{ $project['title']."  ".$project['id'] }}</h5></a>

                                </div>

                                <span class="media-body-sm-Plist">월 예산 <span>{{ number_format($project['budget']) }}</span>원</span>
                                <span class="media-body-sm-Plist">예상기간 <span>{{ $project['estimated_duration'] }}</span></span>
                                <span class="media-body-sm-Plist la-line">등록일자 <span>{{ substr($project['created_at'], 0, 10) }}</span></span>
                                <!--span class="media-body-sm-Plist la-line">마감 <span>{{ $project['deadline'] }}</span></span-->
                            </div>
                        </div>
                        <!-- Content -->
                        <div id="job1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <p> {{ str_limit($project['detail_content'], 250, '...') }}</p>
                                        <!-- Additional Requirements -->
                                        <div>

                                            <ul class="tags dall margin-top-20">
                                                <li>미팅 >
                                                    @if($project->meeting_way == "온라인 미팅")
                                                        온라인
                                                    @else
                                                        {{ str_limit($project->address_sido, 4, '') }}
                                                    @endif
                                                    | 마케팅 분야
                                                    @foreach($project->projects_area as $areas)
                                                        <a href="#.">{{ $areas->area }}</a>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-3">

                                        <ul class="list-unstyled">
                                            <li class="padding-top-5"></li>

                                            <li class="partners-authentication ">
                                                @if(($project['step'] == "게시" || $project['step'] == "미팅") && $project['deadline'] >= date('Y-m-d'))
                                                    <?php $today = new DateTime('-1 day'); $d_day = new DateTime($project->deadline);?>
                                                    <span class="s_icon01">모집마감 {{ $today->diff($d_day)->days}}일 남음</span>
                                                @else
                                                    <span class="s_icon01">모집마감</span>
                                                @endif
                                            </li>

                                            <li class="partners-authentication ">
                                                <span class="s_icon02">총 {{ $project->application->count() }}명 지원</span>
                                            </li>
                                        </ul>
                                        </p>
                                    </div>
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
