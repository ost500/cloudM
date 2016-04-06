@extends('include.head')
@section('content')
  <!-- Content -->
  <div id="content"> 
    
    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
      <div class="container"> 


		<div class="heading text-left margin-bottom-20">
          <h4>파트너 목록</h4>
        </div>
		<div class="coupen">
          <p>Crowd m에서 직접 <span>파트너</span>를 찾아보세요.</p>
        </div>


        <!-- Side Bar -->
<div class="row">


        <!-- Job  Content -->
        <div class="col-md-12 job-right">

          <!-- About Admin -->
          <!--<h4 class="font-normal margin-top-50 margin-bottom-20">available jobs</h4>-->
          <div class="row"> 
            
            <!-- Grid Layout -->
            <div class="col-md-6">
              
              <div class="short-by">
                <!--<label>
                  <select class="selectpicker">
                    <option>-Sort by-</option>
                    <option>-Sort by-</option>
                    <option>-Sort by-</option>
                  </select>
                </label>-->

				<label>
				<select name="job" class="form-control02" id="id_job"><option selected="selected" value="">분야</option><option value="all">모두</option><option value="바이럴">바이럴</option><option value="SNS">SNS</option><option value="디자인">디자인</option><option value="콘텐츠제작">콘텐츠제작</option></select>
                <input type="text" class="form-control02 form-control01" placeholder="검색어를 입력하세요"><a class="sea_button" href="#">검색</a>
              </label>
              </div>
            </div>
            
            <!-- Pagination -->
            <div class="col-md-6">
              <ul class="pagination">
                <li><a href="#."><i class="fa fa-angle-left"></i></a></li>
                <li><a href="#.">1</a></li>
                <li><a class="current" href="#.">2</a></li>
                <li><a href="#.">3</a></li>
                <li><a href="#.">4</a></li>
                <li><a href="#."><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
          
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
                        <h5>jjinz84</h5>
                      </div>
					  <span class="media-body-sm">디자이너</span>
					  <span class="media-body-sm la-line">개인</span>
					  
                    </div>
                  </div>
                  <!-- Content -->
                  <div id="job1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <p> [프로젝트 진행 방식] 시작시점에 미팅, 주 1회 미팅 등 [프로젝트의 현재 상황] 리뉴얼 기획 제안서만 있음 [상세한 업무 내용] 반응형 웹 제작 [참고자료 / 유의사항] http://www.skhynix.com/kor/index.jsp 와 같은 톤앤매너 구상</p>
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
			<span class="partners-authorized"><i class="fa fa-check-circle-o"></i>신원인증</span><br>
			<span class="partners-authorized"><i class="fa fa-check-circle-o"></i>연락처 등록</span>
		</li>
	</ul>
</div>

			
			
			</div>
            </div>
            


            
           
          
		



          </div>
        </div>
      </div>
    </section>
  </div>

  
</div>


@include('include.footer')
@endsection