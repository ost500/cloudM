<!-- Pagination -->
{{--페이지네이션 관련 지우지 마세요--}}
<h5 hidden id="count">{{ $projects['count'] }}개의 광고캠페인</h5>
{{--지우지 마세요--}}
@foreach($projects as $project)
    @if($project['title'])
        <!-- Job Content -->
        <div id="accordion">

            <!-- Job Section -->
            <div class="job-content02 job-post-page margin-bottom-10">
                <!-- Job Tittle -->
                <div class="panel-group margin-bottom-0">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="job-tittle">
                                <div class="media-left">
                                    @if(($project['step'] == "게시" || $project['step'] == "미팅") && $project['deadline'] >= date('Y-m-d'))
                                        <div class="date_on"> 모집중</div>
                                    @else
                                        <div class="date_off"> 모집마감</div>
                                    @endif

                                </div>
                                <div class="media-body">

                                    <a href="{{ url('detail/'.$project['id']) }}">
                                        <h5>{{ $project['title']}}</h5></a>


                                </div>
                            </div>

                            <span class="media-body-sm-Plist">월 예산 <span>{{ number_format($project['budget']) }}</span>원</span>
                            <span class="media-body-sm-Plist">예상기간 <span>{{ $project['estimated_duration'] }}</span></span>
                            <span class="media-body-sm-Plist la-line">등록일자 <span>{{ substr($project['created_at'], 0, 10) }}</span></span>
                        </div>
                    </div>
                    <!-- Content -->
                    <div id="job1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p> {{ str_limit($project['detail_content'], 250, '...') }}</p>
                                    <div>

                                        <ul class="tags margin-top-10">
                                            <?php
                                            $i = 0;
                                            foreach ($project->projects_area as $areas) {
                                                if ($i++ == 7) {
                                                    if ($project->projects_area->count() > 7) {
                                                        $etc_areas_cnt = $project->projects_area->count() - 7;
                                                        echo "<li><a href=\"#.\">외 {$etc_areas_cnt}개</a></li>";
                                                    }
                                                    break;
                                                }
                                                echo "<li><a href=\"#.\">{$areas->area}</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <ul class="list-unstyled">
                                        <li class=""></li>


                                        <li class="partners-authentication ">
                                            @if(($project['step'] == "게시" || $project['step'] == "미팅") && $project['deadline'] >= date('Y-m-d'))
                                                <?php $today = new DateTime('-1 day'); $d_day = new DateTime($project->deadline);?>
                                                <span class="s_icon01">모집마감 {{ $today->diff($d_day)->days}}
                                                    일 남음</span>
                                            @else
                                                <span class="s_icon01">모집마감</span>
                                            @endif
                                        </li>

                                        <li class="partners-authentication ">
                                            <span class="s_icon02">총 {{ $project->application->count() }}명 지원</span>
                                        </li>

                                        <li class="partners-authentication ">
                                            @if($project->meeting_way == "온라인 미팅")
                                                <span>온라인 미팅</span>
                                            @else
                                                <span>오프라인 미팅 > {{ str_limit($project->address_sido, 4, '') }}</span>
                                            @endif
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
