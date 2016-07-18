@extends('include.admin')
@section('customer_centre')



    <div class="col-md-9 job-right">
        <!-- Job Content -->
        <div id="accordion">
            <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                <span style="color:black" class="h3 text-bold">이메일 인증</span>
                <p class="padding-top-5">이메일을 확인해 주세요.</p>
            </div>


            <div class="row">
                <!-- Revenues Sidebar -->

                <!-- Stories -->
                <div class="col-md-12">
                    <div class="job-content job-post-page margin-top-10">
                        <div class="heading">

                            <br>
                            <div class="ser01_group margin-bottom-50">
                                <div class="col-md-4" style="text-align:center; margin-bottom:30px; ">
                                    <img class="img-responsive" src="{{ asset("images/company_img01.png") }}"
                                         style="width:342px; text-align:center;">
                                </div>
                                <div class="col-md-8">
                                    <p style="font-size:21px; color:#000;">이메일 인증</p><br>
                                    <p>{{session('email')}}로 인증 메일을 보내 드렸습니다.<br><br>
                                        이메일 인증을 받으시길 바랍니다
                                        <br><br>

                                        감사합니다.</p>

                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="ser01_group margin-bottom-50 margin-top-32">
                                <div style="border:solid 1px #b3b3b3;">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1119.4120083533867!2d126.88150376168049!3d37.48018970613318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b61e25cd585f3%3A0xc194bd0b358c83ef!2z7Jqw66a8IOudvOydtOyYqOyKpCDrsqjrpqw!5e0!3m2!1sko!2skr!4v1467797346376"
                                            width="100%" height="250" frameborder="0" style="border:0"
                                            allowfullscreen></iframe>
                                </div>
                                <br>
                                <p>주식회사 플랫포머</p>
                                <p>서울시 금천구 가산동 우림라이온스밸리 C동 703호 <span style="float:right; color:#444;">T:1544-2329    M:help@fastm
                                        .io</span></p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection