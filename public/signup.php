<?
	include_once("include/head.php");
?>  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Revenues -->
    <section class="check-out padding-top-15 padding-bottom-30">
      <div class="container">
		 <!-- Heading -->
        <div class="heading text-left margin-bottom-20">
          <h4>회원가입</h4>
        </div>
        
        <!-- coupen -->
        <div class="coupen">
          <p>회원가입 후 이용하시면 <span>더 많은 서비스</span>를 이용하실 수 있습니다.</p>
        </div>

		<!--div class="top_title">
			<h4>로그인</h4>
			<span>착한마케팅과 </span>
		</div-->

		<form>
        <div class="row"> 
          
          <!-- Revenues Sidebar -->
          <div class="col-md-8">
			<!-- Story -->
              <div class="story">
			  <article>
				<div class="signup">
				<label>이용목적 *<br/>				
						<label for="ccc" class="label_n"><input name="gender" id="ccc" type="radio" value="ccc">클라이언트</label>
						<label for="ppp" class="label_n"><input name="gender" id="ppp" type="radio" value="ppp">파트너스</label>
				</label>
				<label>아이디 *
					<input class="form-control" type="text" name="" placeholder="">
				</label>
				<label>비밀번호 *
					<input class="form-control" type="text" name="" placeholder="">
				</label>
				<label>비밀번호 재입력 *
					<input class="form-control" type="text" name="" placeholder="">
				</label>
				<label>이메일 *
					<input class="form-control" type="text" name="" placeholder="">
				</label>

				<div class="checkbox">
				  <input type="checkbox" name="checkbox1" id="checkbox1" value="option1" checked="">
				  <label for="checkbox1"><a href="#">이용약관</a> 및 <a href="#">개인정보 보호방침</a>에 동의합니다.</label>
				</div>

				<a href="#" class="btn login_button margin-top-20">회원가입<i class="fa fa-caret-right"></i></a>
				</div>

			  </div>
			  </article>
          </div>
          
          <!-- Stories -->
          <div class="col-md-4">
              <!-- Story -->
              <div class="story">
				<article>
					<div class="signup_right">

					<a class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 페이스북 아이디로 가입</a>
					<a class="btn-facebook btn-lg btn-block"><i class="fa fa-facebook"></i> 네이버 아이디로 가입</a>
					<a class="btn-facebook btn-lg btn-block"><i class="fa fa-google-plus"></i> 구글 아이디로 가입</a>

					<p class="redirect01">이미 회원이신가요? <a href="#"><strong>로그인하기</strong></a></p>
					<p class="redirect01">아이디,비밀번호를 잊으셨나요? <br/><a href="#"><strong>아이디,비밀번호 찾기</strong></a></p>


					</div>
				</article>
              </div>
              
              
          </div>
        </div>
      </div>
    </section>
  </div>
  
<?
	include_once("include/footer.php");
?>