@extends('layouts.master_layout')
@section('right_content')

    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">커뮤니케이션 게시판</span>
        <p class="padding-top-10">대화를 나눠 보세요. </p>
    </div>


    <!-- Job Content -->
    <div id="accordion">


        <!-- Job Section -->
        <div class="job-content job-post-page">
            <div class="panel-heading">
                <h5 class="panel-title">커뮤니케이션 게시판</h5>
            </div>
            <div class="panel-body padding-right-30">
                <form action="{{route('communication_update_put', ['id'=>$communi->id])}}" method="post"
                      role="form" class="smart-wizard form-horizontal" id="form"
                      novalidate="novalidate" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span> 제목 </label>
                        <div class="col-sm-8">

                            <input autofocus type="text" class="form-control"
                                   name="title"
                                   aria-required="true"
                                   aria-describedby="title-error" value="{{$communi->title}}">
                            <span id="title-error"
                                  class="help-block valid"
                                  style="display: none;"></span>


                        </div>
                    </div>

                    <div class="form-group margin-top-20">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span> 내용 </label>
                        <div class="col-sm-8">
                            <textarea name="description" class="form-control"
                                      rows=20 aria-required="true"
                                      aria-describedby="description-error"
                                      aria-invalid="false">{{$communi->content}}</textarea>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <div class="port_guide img_f">
                                <img src="/images/i_icon.png"
                                     style="margin-top:2px;">
                                <div class="p_add_span"
                                     style="">
                                    <strong>[커뮤니케이션 게시판 추가 가이드]</strong><br>

                                    .zip, .hwp, .doc, .docx, .pdf, .jpg, .jpeg, .png, .gif 의 확장자로 업로드할 수 있습니다


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span class="symbol required"></span>첨부 파일</label>
                        <div class="col-sm-8">
                            <div class="filebox">
                                <input
                                        id="image1"
                                        class="upload-name"
                                        value="파일을 등록해주세요"
                                        disabled="disabled"
                                        aria-required="true"
                                        aria-describedby="image1-error">
                                <label class="upload_button"
                                       for="ex_filename">파일 업로드</label>
                                <input name="image1" type="file"
                                       id="ex_filename"
                                       accept="jpg,jpeg,png,gif">
                            <span id="image1-error"
                                  class="help-block valid"
                                  style="display: none;"></span>
                                <script>
                                    $("#ex_filename").change(function (ev) {

                                        $("#image1").val(this.value);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>


                    <div class="form-group margin-top-50 margin-bottom-20">
                        <div class="col-sm-offset-5 col-sm-10">
                            <button class="btn btn-o btn-primary" type="submit">
                                등록하기
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>



@endsection

