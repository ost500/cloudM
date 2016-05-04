@extends('include.head')
@section('content')
        <!-- Content -->
<div id="content">

    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">

            <!--
                    <div class="heading text-left margin-bottom-20">
                      <h4>프로젝트 검색</h4>
                    </div>
                    <div class="coupen">
                      <p> 내가 찾는 <span>프로젝트</span>를 검색해보세요.</p>
                    </div>
            -->

            <!-- Side Bar -->
            <div class="row">
                <div class="col-md-3">
                    <div class="job-sider-bar003">
                        <h5 class="side-tittle">파트너스</h5>
                        <div>
                            <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}"><br>
                            <h6>{{ $loginUser->name }}</h6>
                            <a href="#.">
                                <div id="tag02">
                                    <div class="button">기본정보수정</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Job  Content -->
                <div class="col-md-9 job-right">


                    <!-- Job Content -->
                    <div id="accordion">

                        <!-- Job Section -->
                        <div class="job-content job-post-page">
                            <!-- Job Tittle -->
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <!-- Save -->
                                    <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                                    <!-- PANEL HEADING -->


                                    <!-- Revenues Sidebar -->

                                    <!-- Story -->

                                    <article>
                                        <div class="signup02">


                                            <div class="job-tittle04 margin-bottom-30">
                                                <h6 class="my_h6 margin-bottom-20">기본 정보 입력</h6>

                                                <form action="{{ url('/mypage/img') }}" method="POST" role="form"
                                                      enctype="multipart/form-data" accept-charset="UTF-8">
                                                    {!! csrf_field() !!}
                                                    <label>프로필사진<span class="set_st">*</span><br/>
                                                        <input class="form-control03 input_width01" type="file"
                                                               name="Image"
                                                               placeholder="등록된 이미지가 없습니다.">
                                                        <button class="input_width02" type="submit"><i
                                                                    class="fa fa-plus"></i> 이미지 추가
                                                        </button>
                                                    </label>
                                                </form>
                                                <br/>
                                                <label>파트너형태<span class="set_st">*</span>
                                                    <select name="form_of_business" class="form-control03 "
                                                            id="form_of_business" required="required">
                                                        <option value="individual" selected="">개인</option>
                                                        <option value="team">팀</option>
                                                        <option value="individual_business">개인 사업자</option>
                                                        <option value="corporate_business">법인 사업자</option>
                                                    </select>
                                                </label><br/>
                                                <label>이름<span class="set_st">*</span>
                                                    <input class="form-control03" type="text" name="" placeholder="">
                                                </label><br/>
                                                <label>성별<span class="set_st">*</span><br/>
                                                    <label for="ccc" class="label_n02"><input name="gender" id="ccc"
                                                                                              type="radio" value="ccc">남성</label>&nbsp;
                                                    <label for="ppp" class="label_n02"><input name="gender" id="ppp"
                                                                                              type="radio" value="ppp">여성</label>
                                                </label><br/><br/>
                                                <label for="birth001">생년월일<br/>
                                                    <select name="birth001" class="form-control03 form-width"
                                                            id="form_of_birth01">
                                                        <option>년</option>
                                                        <option>1945</option>
                                                        <option>1946</option>
                                                        <option>1947</option>
                                                        <option>1948</option>
                                                        <option>1949</option>
                                                        <option>1950</option>
                                                        <option>1951</option>
                                                        <option>1952</option>
                                                        <option>1953</option>
                                                        <option>1954</option>
                                                        <option>1955</option>
                                                        <option>1956</option>
                                                        <option>1957</option>
                                                        <option>1958</option>
                                                        <option>1959</option>
                                                        <option>1960</option>
                                                        <option>1961</option>
                                                        <option>1962</option>
                                                        <option>1963</option>
                                                        <option>1964</option>
                                                        <option>1965</option>
                                                        <option>1966</option>
                                                        <option>1967</option>
                                                        <option>1968</option>
                                                        <option>1969</option>
                                                        <option>1970</option>
                                                        <option>1971</option>
                                                        <option>1972</option>
                                                        <option>1973</option>
                                                        <option>1974</option>
                                                        <option>1975</option>
                                                        <option>1976</option>
                                                        <option>1977</option>
                                                        <option>1978</option>
                                                        <option>1979</option>
                                                        <option>1980</option>
                                                        <option>1981</option>
                                                        <option>1982</option>
                                                        <option>1983</option>
                                                        <option>1984</option>
                                                        <option>1985</option>
                                                        <option>1986</option>
                                                        <option>1987</option>
                                                        <option>1988</option>
                                                        <option>1989</option>
                                                        <option>1990</option>
                                                        <option>1991</option>
                                                        <option>1992</option>
                                                        <option>1993</option>
                                                        <option>1994</option>
                                                        <option>1995</option>
                                                        <option>1996</option>
                                                        <option>1997</option>
                                                        <option>1998</option>
                                                        <option>1999</option>
                                                        <option>2000</option>
                                                        <option>2001</option>
                                                        <option>2002</option>
                                                        <option>2003</option>
                                                        <option>2004</option>
                                                        <option>2005</option>
                                                        <option>2006</option>
                                                        <option>2007</option>
                                                        <option>2008</option>
                                                        <option>2009</option>
                                                        <option>2010</option>
                                                        <option>2011</option>
                                                        <option>2012</option>
                                                        <option>2013</option>
                                                        <option>2014</option>
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                    </select>
                                                    <select name="birth001" class="form-control03 form-width"
                                                            id="form_of_birth02">
                                                        <option>월</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                    </select>
                                                    <select name="birth001" class="form-control03 form-width"
                                                            id="form_of_birth03">
                                                        <option>일</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                        <option>13</option>
                                                        <option>14</option>
                                                        <option>15</option>
                                                        <option>16</option>
                                                        <option>17</option>
                                                        <option>18</option>
                                                        <option>19</option>
                                                        <option>20</option>
                                                        <option>21</option>
                                                        <option>22</option>
                                                        <option>23</option>
                                                        <option>24</option>
                                                        <option>25</option>
                                                        <option>26</option>
                                                        <option>27</option>
                                                        <option>28</option>
                                                        <option>29</option>
                                                        <option>30</option>
                                                        <option>31</option>
                                                    </select>
                                                </label><br/>
                                                <label>지역-시,도<span class="set_st">*</span>
                                                    <select name="address_sido" class="form-control03 ie-form-control"
                                                            id="address_sido">
                                                        <option value="">선택</option>
                                                        <option value="1">서울특별시</option>
                                                        <option value="2">부산광역시</option>
                                                        <option value="3">대구광역시</option>
                                                        <option value="4">인천광역시</option>
                                                        <option value="5">광주광역시</option>
                                                        <option value="6">대전광역시</option>
                                                        <option value="7">울산광역시</option>
                                                        <option value="8">세종특별자치시</option>
                                                        <option value="9">경기도</option>
                                                        <option value="10">강원도</option>
                                                        <option value="11">충청북도</option>
                                                        <option value="12">충청남도</option>
                                                        <option value="13">전라북도</option>
                                                        <option value="14">전라남도</option>
                                                        <option value="15">경상북도</option>
                                                        <option value="16">경상남도</option>
                                                        <option value="17">제주특별자치도</option>
                                                    </select>
                                                </label><br/>
                                                <!--<div class="checkbox">
                                                  <input type="checkbox" name="checkbox1" id="checkbox1" value="option1" checked="">
                                                  <label for="checkbox1"><a href="#">이용약관</a> 및 <a href="#">개인정보 보호방침</a>에 동의합니다.</label>
                                                </div>-->
                                                <a class="button003 signup003 margin-top-10" href="#.">등록하기</a>
                                            </div>


                                            <div class="job-tittle04 margin-bottom-30">
                                                <h6 class="my_h6 margin-bottom-20">연락처 정보 입력</h6>
                                                <label>핸드폰번호<span class="set_st">*</span><br/>
                                                    <select name="form_of_phone" class="form-control03 phone_width"
                                                            id="form_of_business" required="required">
                                                        <option>010</option>
                                                        <option>011</option>
                                                        <option>016</option>
                                                        <option>017</option>
                                                        <option>019</option>
                                                    </select>
                                                    <input class="form-control03 phone_width" type="text" name=""
                                                           placeholder="">
                                                    <input class="form-control03 phone_width" type="text" name=""
                                                           placeholder="">
                                                </label><br/>
                                                <label>팩스번호
                                                    <input class="form-control03" type="text" name="" placeholder="">
                                                </label><br/>
                                                <a class="button003 signup003 margin-top-10" href="#.">등록하기</a>
                                            </div>


                                            <div class="job-tittle04-la margin-bottom-30">
                                                <h6 class="my_h6 margin-bottom-20">이메일 구독 설정</h6>
                                                <label>이메일 <strong>u3uooo@gmlab.kr</strong>
                                                </label><br/>
                                                <div class="checkbox">
                                                    <input type="checkbox" name="checkbox1" id="checkbox1"
                                                           value="option1" checked="">
                                                    <label for="checkbox1">크라우드엠의 프로젝트 소식을 구독합니다.</label>
                                                </div>
                                                <a class="button003 signup003 margin-top-10" href="#.">등록하기</a>
                                            </div>


                                        </div>
                                    </article>


                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>
</div>


@include('include.footer')
@endsection
