<!-- Job Content -->
<div id="accordion">


    <!-- Job Section -->
    <div class="job-content job-post-page">
        <div class="panel-heading">
            <h5 class="panel-title">커뮤니케이션 게시판</h5>
        </div>
        <div class="panel-body padding-right-30">
            <form action="{{route('communication_create_post',['p_id' => $p_id])}}" method="post"
                  role="form" class="smart-wizard form-horizontal" id="form"
                  novalidate="novalidate" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label class="col-sm-2 control-label"><span class="symbol required"></span> 제목 </label>
                    <div class="col-sm-8">

                        <input autofocus type="text" class="form-control"
                               name="title"
                               aria-required="true"
                               aria-describedby="title-error">
                            <span id="title-error"
                                  class="help-block valid"
                                  style="display: none;"></span>


                    </div>
                </div>

                <div class="form-group margin-top-20">
                    <label class="col-sm-2 control-label"><span class="symbol required"></span> 내용 </label>
                    <div class="col-sm-8">
                            <textarea name="description" class="form-control"
                                      rows=20 aria-required="true"
                                      aria-describedby="description-error"
                                      aria-invalid="false"></textarea>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
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
                    <label class="col-sm-2 control-label"><span class="symbol required"></span>첨부 파일</label>
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
                        <button class="btn btn-dark-azure" type="submit">
                            등록
                        </button>

                        <button id="list" class="btn btn-danger" type="button">
                            취소
                        </button></a>
                    </div>
                </div>

                <script>
                    $("#list").click(function () {
                        var display_results = $("#communication_board");
                        display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

                        $.ajax({
                            url: '{{ route('communication',['p_id' => $p_id]) }}',
                            success: function (result) {
                                display_results.html(result);
                            }
                        });
                    });
                </script>


            </form>
        </div>
    </div>
</div>

<script>
    $(function () {


        $('#form').submit(function (event) {
            event.preventDefault();
            var formData = $('#form').serialize();

            var display_results = $("#communication_board");
            display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

            $.ajax({
                type: 'POST',
                url: '{{ route('communication_create_post',['p_id' => $p_id]) }}',

                data: formData,

                success: function (data2) {

                    display_results.html(data2);


                },
                error: function (data2) {


                }
            });

        });
    });


</script>

