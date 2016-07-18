@extends('layouts.customer_layout')
@section('customer_centre')

    <div class="col-md-9 job-right">
        <!-- Job Content -->
        <div id="accordion">
            <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                <span style="color:black" class="h3 text-bold">일대일 문의</span>
                <p class="padding-top-5">패스트엠 관리자 문의를 남기세요.</p>
            </div>

            <!-- Job Section -->
            <div class="job-content02 job-post-page ">
                <!-- Job Tittle -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <!-- Save -->

                        <!-- PANEL HEADING -->
                        <div class="panel-heading">
                            <div id="map" style="width:100%;height:250px; margin-bottom: 50px">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1119.4120083533867!2d126.88150376168049!3d37.48018970613318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b61e25cd585f3%3A0xc194bd0b358c83ef!2z7Jqw66a8IOudvOydtOyYqOyKpCDrsqjrpqw!5e0!3m2!1sko!2skr!4v1467797346376" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>

                            <div class="job-tittle03 margin-top-20 margin-bottom-40">
                                <div class="row">
                                    <form class="form-horizontal" role="form" method="post" action="{{ url('/customer/man_to_man') }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="email" value="">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="title"><span class="symbol required"></span> 제목 </label>
                                            <div class="col-sm-9">
                                                <input autofocus class="form-control" name="title" class="title" placeholder=""
                                                       required="required">

                                            </div>
                                        </div>

                                        <div class="form-group padding-top-15">
                                            <label class="col-sm-2 control-label" for="content_query"><span class="symbol required"></span> 내용 </label>
                                            <div class="col-sm-9">
                                        <textarea rows="10" class="form-control" name="content_query" id="content_query"
                                                  placeholder="" required="required"></textarea>
                                                </label>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="inputEmail3"></label>
                                            <div class="col-sm-9">

                                                <button class="btn btn-app" type="submit">
                                                    문의하기
                                                </button>

                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection