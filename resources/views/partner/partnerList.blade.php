<h6 hidden id="count">{{ $partners['count'] }}개의 파트너</h6>
@foreach($partners as $partner)
    @if($partner['id'])
        <!-- Job Content -->
        <div id="accordion">

            <!-- Job Section -->
            <div class="job-content job-post-page margin-top-10">
                <!-- Job Tittle -->
                <div class="col-lg-2 padding-top-5">
                    @if($partner->profileImage != null)
                        <img id="profileImage{{$partner['id']}}" class="partner_profile" src="{{ URL::asset($partner->profileImage) }}" style="cursor: pointer;">
                    @else
                        <img id="profileImage{{$partner['id']}}" class="partner_profile" src="/images/p_img02.png"><br>
                    @endif

                        <script>
                            $("#profileImage"+"{{$partner['id']}}").click(function () {
                                window.location.assign("{{url('partner/'.$partner->id)}}")
                            })
                        </script>

                </div>
                <div class="col-lg-7 padding-top-5">

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <!-- PANEL HEADING -->
                            <div class="panel-heading">
                                    <div class="media-left">
                                        <div class="partner_icon"> 활동가능 <!--<span>MAY</span>--> </div>
                                    </div>
                                    <div style="cursor:pointer" id="partner_detail_click{{$partner['id']}}" class="media-body">
                                        <span class="media-body-sm">{{ $partner['name'] }}</span>

                                        <span class="media-body-sm la-line">{{ $partner['company_type'] }}</span>

                                        {{--<span class="media-body-sm la-line">{{ $partner['created_at'] }}</span>--}}
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
                                    <p style="cursor:pointer" id="partner_intro_click{{$partner['id']}}"> {{ str_limit($partner->partners->intro, 250, '...') }}</p>
                                    <script>
                                        $("#partner_intro_click"+"{{$partner['id']}}").click(function () {
                                            window.location.assign("{{url('partner/'.$partner->id)}}")
                                        })
                                    </script>
                                    <!-- Additional Requirements -->
                                    <div>
                                        <ul class="tags dall margin-top-20 margin-bottom-10">
                                            @foreach($partner->partners->job()->get() as $job)
                                                <li><a href="#.">{{ $job['job'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-3 padding-top-5">
                    <ul class="list-unstyled">
                        <li class="padding-top-5">
                            <div class="rating star-lg star-lg-0"></div>

                            <span class="rating-stats-body stats-body">
                                <span class="average-rating-score padding-left-10">0</span>
                                <span class="rating-append-unit append-unit pull-right">/ 평가 0개</span>
                            </span>
                        </li>

                        <li class="partners-authentication ">
                            <span class="s_icon01">계약한 프로젝트</span> <span class="pull-right">{{ $partner->contract->count() }}건</span>
                        </li>

                        <li class="partners-authentication ">
                            <span class="s_icon02">포트폴리오</span> <span class="pull-right">{{ $partner->partners->portfolio()->count() }}개</span>
                        </li>

                        <li class="partners-authentication la_line02">
                            <span class="partners-authorized">
                                 @if($partner['auth_check'] == "인증완료")
                                    <i class="fa fa-check-circle-o"></i> {{ $partner['auth_check'] }}
                                @else
                                    <i class="fa fa-times "></i> 신원미인증
                                @endif
                            </span>

                            <span class="partners-authorized padding-left-30">
                                @if(strlen($partner['phone_num']) > 8)
                                    <i class="fa fa-check-circle-o"></i> 연락처등록
                                @else
                                    <i class="fa fa-times "></i> 연락처미등록
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    @else
    @endif
@endforeach
