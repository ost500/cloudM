<h6 id = "count">{{ $partners['count'] }}개의 파트너</h6>
@foreach($partners as $partner)
@if($partner['id'])
<!-- Job Content -->
<div id="accordion">

    <!-- Job Section -->
    <div class="job-content job-post-page margin-top-20">
        <!-- Job Tittle -->
        <div class="col-lg-2">
            <img class="partner_profile" src="/images/p_img02.png">
        </div>
        <div class="col-lg-8">

            <div class="panel-group">
                <div class="panel panel-default">
                    <!-- Save -->
                    <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                    <!-- PANEL HEADING -->
                    <div class="panel-heading">
                        <div class="job-tittle">
                            <div class="media-left">
                                <div class="partner_icon"> 활동가능 <!--<span>MAY</span>--> </div>
                            </div>
                            <div class="media-body">
                                <a href="{{ url('partner/'.$partner['id']) }}"><h5>{{ $partner['name'] }}</h5></a>
                            </div>
                            <span class="media-body-sm">디자이너</span>
                            <span class="media-body-sm la-line">개인</span>

                        </div>
                    </div>
                    <!-- Content -->
                    <div id="job1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p> [프로젝트 진행 방식] 시작시점에 미팅, 주 1회 미팅 등 [프로젝트의 현재 상황] 리뉴얼 기획 제안서만 있음 [상세한
                                업무 내용] 반응형 웹 제작 [참고자료 / 유의사항] http://www.skhynix.com/kor/index.jsp 와
                                같은 톤앤매너 구상</p>
                            <!-- Additional Requirements -->
                            <div>
                                <span class="media-body-sm margin-top-23">기술</span>
                                <ul class="tags dall margin-top-20 margin-bottom-10">
                                    <li><a href="#.">photoshop</a></li>
                                    <li><a href="#.">html</a></li>
                                    <li><a href="#.">css</a></li>
                                    <li><a href="#.">script</a></li>
                                    <li><a href="#.">php</a></li>
                                </ul>
                            </div>
                            <div class="tags_bg">
                                <span class="s_icon01">계약한 프로젝트 <span>30</span>건</span>
                                <span class="s_icon02">포트폴리오 <span>14</span>개</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <ul class="list-unstyled">
                <li>
                    <div class="rating star-lg star-lg-4"></div>
			<span class="rating-stats-body stats-body"><br>
				<span class="average-rating-score">4.2</span>
				<span class="rating-append-unit append-unit">/ 평가 20개</span>
			</span>
                </li>
                <li class="partners-authentication la_line02">
                                        <span class="partners-authorized"><i
                                                    class="fa fa-check-circle-o"></i>신원인증</span><br>
                                        <span class="partners-authorized"><i
                                                    class="fa fa-check-circle-o"></i>연락처 등록</span>
                </li>
            </ul>
        </div>


    </div>
</div>
@else
@endif
@endforeach
