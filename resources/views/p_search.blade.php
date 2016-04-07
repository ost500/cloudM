@extends('include.head')
@section('content')
  <!-- Content -->
  <div id="content"> 
    
    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
      <div class="container"> 


		<div class="heading text-left margin-bottom-20">
          <h4>프로젝트 검색</h4>
        </div>
		<div class="coupen">
          <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
        </div>


        <!-- Side Bar -->
<div class="row">
        <div class="col-md-3">
          <div class="job-sider-bar">
            <h5 class="side-tittle">프로젝트 정렬</h5>
			<ul class="p_align">
				<li><a href="#">- 금액 높은 순</a></li>
				<li><a href="#">- 금액 낮은 순</a></li>
				<li><a href="#">- 최신 등록 순</a></li>
				<li><a href="#">- 마감 임박 순</a></li>
			</ul>
		  </div>


		  <div class="job-sider-bar">
            <h5 class="side-tittle">프로젝트 카테고리</h5>
			<ul class="p_align02">
				<li class="parent dev-category-list">
					<div class="dev-skipper"></div>
					<input name="dev" id="dev" type="checkbox"> </input>
					<label for="dev" class="dev_txt">카테고리_01</label>
						<ul class="child-list">
							<li>
							<input name="dev" id="dev-2" type="checkbox"> </input>
							<label for="dev-2">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-3" type="checkbox"> </input>
							<label for="dev-3">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-4" type="checkbox"> </input>
							<label for="dev-4">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-5" type="checkbox"> </input>
							<label for="dev-5">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-6" type="checkbox"> </input>
							<label for="dev-6">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-7" type="checkbox"> </input>
							<label for="dev-7">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-8" type="checkbox"> </input>
							<label for="dev-8">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-9" type="checkbox"> </input>
							<label for="dev-9">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-10" type="checkbox"> </input>
							<label for="dev-10">메뉴_01</label>				
							</li>
						</ul>

				</li>
				


				<li class="parent dev-category-list">
					<div class="dev-skipper"></div>
					<input name="dev" id="dev" type="checkbox"> </input>
					<label for="dev" class="dev_txt">카테고리_01</label>
						<ul class="child-list">
							<li>
							<input name="dev" id="dev-2" type="checkbox"> </input>
							<label for="dev-2">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-3" type="checkbox"> </input>
							<label for="dev-3">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-4" type="checkbox"> </input>
							<label for="dev-4">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-5" type="checkbox"> </input>
							<label for="dev-5">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-6" type="checkbox"> </input>
							<label for="dev-6">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-7" type="checkbox"> </input>
							<label for="dev-7">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-8" type="checkbox"> </input>
							<label for="dev-8">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-9" type="checkbox"> </input>
							<label for="dev-9">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-10" type="checkbox"> </input>
							<label for="dev-10">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-11" type="checkbox"> </input>
							<label for="dev-11">메뉴_01</label>				
							</li>
							<li>
							<input name="dev" id="dev-12" type="checkbox"> </input>
							<label for="dev-12">메뉴_01</label>				
							</li>
						</ul>

				</li>






			</ul>
		  </div>


		</div>



        


<!--
<div class="col-md-3">
          <div class="job-sider-bar">
            <h5 class="side-tittle">프로젝트 정렬</h5>
				<ul class="p_align">
					<li><a href="#">금액 높은 순</a></li>
					<li><a href="#">금액 낮은 순</a></li>
					<li><a href="#">최신 등록 순</a></li>
					<li><a href="#">마감 임박 순</a></li>
				</ul>
            <form>
              <label>
                <input type="text" class="form-control" placeholder="Location">
              </label>
              <label>
                <input type="text" class="form-control" placeholder="Industry / Role">
              </label>
              <button type="submit" class="btn btn-1 btn-sm">Search <i class="fa fa-caret-right"></i></button>
            </form>

            <h5 class="side-tittle margin-top-30">Filter Results</h5>

            <h6>By Region:</h6>
            <ul class="cate result">
              <li> <a href="#."> Australia and New Zealand (1)</a></li>
              <li> <a href="#."> Eastern Africa (1)</a></li>
              <li> <a href="#."> Melanesia (1)</a></li>
              <li> <a href="#."> Northern America (1)</a></li>
              <li> <a href="#."> Southern Asia (1)</a></li>
              <li> <a href="#."> Southern Europe (1)</a> </li>
            </ul>

            <a href="#." class="btn btn-1 btn-sm margin-top-50">filter results <i class="fa fa-caret-right"></i></a> </div>
        </div>
-->


        <!-- Job  Content -->
        <div class="col-md-9 job-right">

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
              <div class="panel-group">
                <div class="panel panel-default"> 
                  <!-- Save -->
                  <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                  <!-- PANEL HEADING -->
                  <div class="panel-heading"> 
                    <div class="job-tittle">
                      <div class="media-left">
                        <div class="date_on"> 모집중 <!--<span>MAY</span>--> </div>
                      </div>
                      <div class="media-body">
                        <h5>반응형 회사 홈페이지 신규 구축</h5>
                      </div>
					  <span class="media-body-sm">예상금액 <span>5,000,000</span>원</span>
					  <span class="media-body-sm">예상기간 <span>30</span>일</span>
					  <span class="media-body-sm la-line">등록일자 <span>2016. 01. 21</span></span>
                    </div>
                  </div>
                  <!-- Content -->
                  <div id="job1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <p> [프로젝트 진행 방식] 시작시점에 미팅, 주 1회 미팅 등 [프로젝트의 현재 상황] 리뉴얼 기획 제안서만 있음 [상세한 업무 내용] 반응형 웹 제작 [참고자료 / 유의사항] http://www.skhynix.com/kor/index.jsp 와 같은 톤앤매너 구상</p>
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
							<span class="s_icon01">마감 1주 3일 전</span>
							<span class="s_icon02">총 31명 지원</span>
						</div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
            





@foreach($projects as $project)

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
                        <h5>{{ $project['title'] }}</h5>
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

@endforeach





          </div>
        </div>
      </div>
    </section>
  </div>

  
</div>

@include('include.footer')
@endsection