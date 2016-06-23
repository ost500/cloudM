<h6 hidden id="count">{{ $partners['count'] }}개의 파트너</h6>
@foreach($partners as $partner)
    @if($partner['id'])
        <!-- Job Content -->
        <div id="accordion">

            <!-- Job Section -->
            <div class="job-content job-post-page margin-top-20">
                <!-- Job Tittle -->
                <div class="col-lg-2">
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
                <div class="col-lg-7">

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <!-- Save -->
                            <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                            <!-- PANEL HEADING -->
                            <div class="panel-heading">

                                    <div class="media-left">
                                        <div class="partner_icon"> 활동가능 <!--<span>MAY</span>--> </div>
                                    </div>
                                    <div style="cursor:pointer" id="partner_detail_click{{$partner['id']}}" class="media-body">
                                        <span class="media-body-sm">{{ $partner['name'] }}</span>

                                        <span class="media-body-sm la-line">개인 </span>

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
                                    <p style="cursor:pointer" id="partner_intro_click{{$partner['id']}}"> {{ $partner->partners->intro }}</p>
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

                <div class="col-lg-3">
                    <ul class="list-unstyled">
                        <li>
                            <div class="rating star-lg star-lg-4"></div>

                            <span class="rating-stats-body stats-body">
                                <span class="average-rating-score padding-left-10">4.2</span>
                                <span class="rating-append-unit append-unit">/ 평가 20개</span>
                            </span>
                        </li>

                        <li class="partners-authentication">
                            <span class="s_icon01">계약한 프로젝트 <span>{{ $partner->contract->count() }}</span>건</span>

                        </li>

                        <li class="partners-authentication">
                            <span class="s_icon02">포트폴리오 <span>14</span>개</span>
                        </li>

                        <li class="partners-authentication la_line02">
                            <span class="partners-authorized"><i
                                        class="fa fa-check-circle-o"></i>신원인증</span>
                            <span class="partners-authorized padding-left-20"><i
                                        class="fa fa-check-circle-o"></i>연락처 등록</span>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    @else
    @endif
@endforeach
