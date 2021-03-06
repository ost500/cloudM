<!-- Job Content -->
<div id="accordion">

<div class="row">

    <div class="col-md-12">

        <script>

            $("#create_btn").click(function () {

                var display_results = $("#communication_board");
                display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

                $.ajax({
                    url: '{{ route('communication_create_post',['p_id' => $p_id]) }}',

                    success: function (result) {

                        display_results.html(result);

                    }
                });
            });

        </script>

        <!-- Job Tittle -->
        <table class="table">
            <col style="width:10%;"/>
            <col style="width:50%;"/>
            <col style="width:20%;"/>
            <col style="width:20%;"/>

            <tr>
                <th>
                    번호
                </th>
                <th>
                    제목
                </th>
                <th>
                    날짜
                </th>
                <th>
                    글쓴이
                </th>
            </tr>

            @if(count($communi) == 0)
                <tr><td colspan="4" align="center" height="30">등록된 글이 없습니다.</td></tr>
            @endif

            @for($i=count($communi)-1; $i>=0; $i--)
                <tr>
                    <td>
                        {{ $i+1 }}
                    </td>
                    <td>
                        <a style="cursor:pointer" id="item_{{ $communi[$i]->id }}"
                        >{{ $communi[$i]->title }}</a>
                    </td>

                    <td>
                        {{ $communi[$i]->created_at }}
                    </td>

                    <td>
                        {{ $communi[$i]->writer->name }}
                    </td>
                </tr>
                <script>

                    $("#item_{{$communi[$i]->id}}").click(function () {

                        var display_results = $("#communication_board");
                        display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

                        $.ajax({
                            url: '{{ route('communication_detail',['p_id' => $p_id ,'id' => $communi[$i]->id]) }}',

                            success: function (result) {

                                display_results.html(result);

                            }
                        });
                    });

                </script>
            @endfor


        </table>

        <a style="cursor:pointer" id="create_btn" class="button004 signup002 margin-top-12">작성</a>
    </div>
    <div class="col-md-1"></div>

</div>

    <!-- Job Section -->


</div>

