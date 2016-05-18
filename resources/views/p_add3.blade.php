@extends('include.head')
@section('content')


        <!-- Content -->
<div id="content">

    <!-- Job -->
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">


            <div class="heading text-left margin-bottom-20">
                <h4>프로젝트 등록</h4>
            </div>
            <div class="coupen">
                <p>등록이 완료되었습니다. <span>검수에는 최대 24시간</span>이 소요됩니다.</p>
            </div>


            <!-- Side Bar -->
            <div class="row">


                <!-- Job  Content -->
                <div class="col-md-12 job-right">


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
                                    <div class="col-lg-4 job-right margin-bottom-40">
                                        <img class="step01 img-responsive" src="/images/step3.jpg">
                                    </div>
                                    <!-- Story -->
                                    <div class="col-lg-8 job-right">
                                        <article>
                                            <div class="signup02">


                                                <div class="margin-bottom-40 padding-bottom-40">

                                                    <h4 class="p_add_h4">프로젝트를 등록해주셔서 감사합니다.</h4>
					<span class="p_add_span">크라우드엠 내부 검수 후에 지원자 모집이 시작됩니다.<br>
					검수에는 <strong>최대 24시간</strong>이 소요되며, 크라우드엠 매니저가 정확한 검수를 위해 유선 또는 이메일 연락을 할 수 있습니다.</span>

                                                    <div class="margin-top-30 padding-top-30 img_f">
                                                        <img src="/images/i_icon.png">
					<span class="p_add_span">
					검수 결과는 <strong>이메일과 SMS</strong>를 통해 발송해드립니다.<br>
					검수에 대한 문의는 <strong>고객센터(1661-8863)</strong>를 이용해주세요.
					</span>
                                                    </div>


                                                    <a class="button005 margin-top-10" href="{{url('/')}}">메인화면으로 이동</a>
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