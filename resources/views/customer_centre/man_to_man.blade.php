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