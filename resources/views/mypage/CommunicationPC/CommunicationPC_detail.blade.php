<div id="accordion">
    <!-- Job Section -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="panel-group">
                <div class="panel panel-default">
                    <!-- Save -->
                    <!--<div class="star-save"><a href="#."> <i class="fa fa-plus"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-link"></i></a> </div>-->
                    <!-- PANEL HEADING -->
                    <div class="panel-heading">
                        <div class="job-tittle03">

                            <div class="media-body02">
                                <h3 class="margin-bottom-20">{{ $communi->title }}</h3>
                            </div>
                            <span class="media-body-sm">
                            <i class="fa fa-clock-o"></i> 날짜 <span>{{$communi->created_at}}</span></span>
                            <span class="media-body-sm"><i
                                        class="fa fa-calendar-minus-o"></i> 글쓴이 <span>{{ $communi->writer->name }}</span></span>
                            @if($communi->writer == Auth::user())
                                <span style="cursor:pointer" id="edit" class="media-body-sm"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>  <span>수정하기</span></span>
                                {{--수정하기 AJAX--}}
                                <script>
                                    $("#edit").click(function () {

                                        var display_results = $("#communication_board");
                                        display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

                                        $.ajax({
                                            url: '{{ route('communication_update',['id' => $id]) }}',

                                            success: function (result) {

                                                display_results.html(result);

                                            }
                                        });
                                    });

                                </script>
                                {{--수정하기 AJAX 끝--}}

                            @endif
                            @if($communi->writer == Auth::user())
                                <form action="{{route('communication_delete',['id' => $communi->id])}}" method="post"
                                      role="form" class="smart-wizard form-horizontal" id="form">
                                    {!! csrf_field() !!}

                                    <span style="cursor:pointer" id="del" class="media-body-sm la-line"><i
                                                class="fa fa-times" aria-hidden="true"></i>  <span>삭제하기</span></span>
                                </form>
                                <script>
                                    $("#del").click(function () {

                                        if (confirm('게시글을 삭제 하시겠습니까?')) {
                                            event.preventDefault();
                                            var formData = $('#form').serialize();

                                            var display_results = $("#communication_board");
                                            display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

                                            $.ajax({
                                                type: 'POST',
                                                url: '{{ route('communication_delete',['id' => $communi->id]) }}',

                                                data: formData,

                                                success: function (data2) {

                                                    display_results.html(data2);


                                                },
                                                error: function (data2) {


                                                }
                                            });
                                        }

                                    });

                                </script>
                            @endif


                            <div class="panel02 panel-default02 margin-top-20">


                            </div>
                        </div>


                        <div style="clear:both;"></div>
                        <div class="p_search02_txt margin-top-20">
                            <h5>내용</h5>

                            <br>
                            {{ $communi->content }}
                            <br>
                            <br><br><br><br><br>

                        </div>
                        <a id="list" style="cursor:pointer" class="button004">목록</a>
                        <script>

                            $("#list").click(function () {

                                var display_results = $("#communication_board");
                                display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

                                $.ajax({
                                    url: '{{ route('communication',['p_id' => $communi->project_id]) }}',

                                    success: function (result) {

                                        display_results.html(result);

                                    }
                                });
                            });

                        </script>


                    </div>


                </div>
            </div>

        </div>
        <div class="col-sm-1"></div>

    </div>
    <!-- Job Tittle -->


</div>
