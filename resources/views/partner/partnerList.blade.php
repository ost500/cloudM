<h6 hidden id="count">{{ $partners['count'] }}개의 파트너</h6>
@foreach($partners as $partner)
    @if($partner['id'])
        <!-- Job Content -->
        <div id="accordion">

            <!-- Job Section -->
            <div class="partner-content job-post-page margin-top-10">
                <!-- Job Tittle -->
                <div class="col-md-9 padding-top-5">
                    <div class="panel-group">
                        <div class="col-md-2 padding-left-0">
                                @if($partner->profileImage != null)
                                    <img id="profileImage{{$partner['id']}}" class="partner_profile_100" src="{{ URL::asset($partner->profileImage) }}" style="cursor: pointer;">
                                @else
                                    <img id="profileImage{{$partner['id']}}" class="partner_profile_100" src="/images/p_img02.png"><br>
                                @endif

                                <script>
                                    $("#profileImage"+"{{$partner['id']}}").click(function () {
                                        window.location.assign("{{url('partner/'.$partner->id)}}")
                                    })
                                </script>
                        </div>
                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                        <div style="cursor:pointer" id="partner_detail_click{{$partner['id']}}" class="media-body">
                                            <span class="media-body-sm nick">{{ $partner['nick'] }}</span>

                                            <span class="media-body-sm">{{ $partner['company_type'] }}</span>

                                            <span class="media-body-sm">
                                                 @if($partner['auth_check'] == "인증완료")
                                                    <i class="fa fa-check-circle-o"></i> {{ $partner['auth_check'] }}
                                                @else
                                                    <i class="fa fa-times "></i> 신원미인증
                                                @endif
                                            </span>

                                            <span class="media-body-sm partners-authorized  la-line">
                                                @if(strlen($partner['phone_num']) > 8)
                                                    <i class="fa fa-check-circle-o"></i> 연락처등록
                                                @else
                                                    <i class="fa fa-times "></i> 연락처미등록
                                                @endif
                                            </span>
                                        </div>
                                    <script>
                                        $("#partner_detail_click"+"{{$partner['id']}}").click(function () {
                                            window.location.assign("{{url('partner/'.$partner->id)}}")
                                        })
                                    </script>

                                </div>
                                <!-- Content -->
                                <div id="job1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p style="cursor:pointer" id="partner_intro_click{{$partner['id']}}"> {{ str_limit($partner->partners->intro, 130, '...') }}</p>
                                        <script>
                                            $("#partner_intro_click"+"{{$partner['id']}}").click(function () {
                                                window.location.assign("{{url('partner/'.$partner->id)}}")
                                            })
                                        </script>
                                        <!-- Additional Requirements -->
                                        <div>
                                            <ul class="tags ">
                                                <?php
                                                    $i = 0;
                                                    foreach($partner->partners->job()->get() as $job) {
                                                        if ($i++ == 6) {
                                                            if ($partner->partners->job()->count() > 6) {
                                                                $etc_job_cnt = $partner->partners->job()->count() - 6;
                                                                echo "<li><a href=\"#.\">외 {$etc_job_cnt}개</a></li>";
                                                            }
                                                            break;
                                                        }
                                                        echo "<li><a href=\"#.\">{$job['job']}</a></li>";
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 padding-top-10 padding-left-0">
                    <ul class="list-unstyled">
                        <li class="padding-top-5">
                            <div class="rating star-lg star-lg-0"></div>

                            <span class="">0</span>
                            <span class="">/ 평가 0개</span>
                        </li>

                        <li class="partners-authentication ">
                            <span class="s_icon01">계약한 캠페인</span> <span class="pull-right">{{ $partner->contract->count() }}건</span>
                        </li>

                        <li class="partners-authentication ">
                            <span class="s_icon02">포트폴리오</span> <span class="pull-right">{{ $partner->partners->portfolio()->count() }}개</span>
                        </li>

                        <li class="partners-authentication la_line02">

                        </li>
                    </ul>
                </div>


            </div>
        </div>
    @else
    @endif
@endforeach
