@extends('layouts.evaluation_layout')
@section('right_content')


    <div class="panel02 panel-default02 margin-top-20">
        <div class="panel-heading03">
            <div>
                <ul>
                    <li class="panel-heading03_title">{{$project->title}}</li>

                </ul>
            </div>
        </div>
        <div class="panel-body04">
            <ul>
                <li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i> 계약일 {{ $contract->contract_date }}</li>
                <li class="col-xs-4"><i class="fa fa-krw"></i> 계약금액 {{ $contract->contract_pay }}</li>
                <li class="col-xs-4"><i class="fa fa-clock-o"></i> 계약기간 {{ $project->estimated_duration }}</li>
            </ul>
        </div>

        <form action="{{route('eval_post',['id'=>$project->id])}}" method="post" id="eval_form" role="form">
            {!! csrf_field() !!}
            <div class="panel-body04">
                <ul>
                    <li class="col-xs-1"></li>
                    <li class="col-xs-2">
                        <div>캠페인만족도</div>
                        <select name="star1" autofocus id="example">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </li>
                    <li class="col-xs-2">
                        <div>커뮤니케이션</div>
                        <select name="star2" id="example2">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select></li>
                    <li class="col-xs-2">
                        <div>전문성</div>
                        <select name="star3" id="example3">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select></li>
                    <li class="col-xs-2">
                        <div>책임감</div>
                        <select name="star4" id="example4">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select></li>
                    <li class="col-xs-2">
                        <div>일정준수</div>
                        <select name="star5" id="example5">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select></li>

                </ul>
            </div>

            <div class="panel-body05">

                <ul>
                    <li class="col-xs-5"></li>
                    <li class="col-xs-2">
                        <div>평점</div>
                        <select disabled name="star" id="example6">
                            @for($i=1; $i<=5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <input hidden name="eval_star" id="input_star" >
                        <div id="star_value"></div>

                    </li>


                </ul>

            </div>


            <div style="padding:20px" class="panel-body06">
                <span><img class="partner_profile03" src="{{ $project->client->profileImage }}"></span>
                <div>
                    <span class="rd_box02">광고주</span><span><strong>{{ $project->client->nick }}</strong></span><br>
                    <textarea name="evaluation"
                              style="width:100%">@if(!$eval == null){{ $eval->evaluation }}@endif</textarea>
                </div>
            </div>
            <button style="left:80%; margin-bottom: 10px" class="button008" type="submit" value="eval_form">등록</button>


        </form>
    </div>

    <link rel="stylesheet" href="{{asset('js/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <script src="{{asset('js/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('#example').barrating({
                theme: 'fontawesome-stars',
                initialRating: 1
            });
            $('#example2').barrating({
                theme: 'fontawesome-stars',
                initialRating: 1
            });
            $('#example3').barrating({
                theme: 'fontawesome-stars',
                initialRating: 1
            });
            $('#example4').barrating({
                theme: 'fontawesome-stars',
                initialRating: 1
            });
            $('#example5').barrating({
                theme: 'fontawesome-stars',
                initialRating: 1
            });
            $('#example6').barrating({
                theme: 'fontawesome-stars',
                readonly: true,
                initialRating: 1
            });

            $("#star_value").html(1);
            $("#input_star").val(1);

        });


        function avg() {
            var sum = Number($('#example').val()) + Number($('#example2').val())
                    + Number($('#example3').val()) + Number($('#example4').val()) +
                    Number($('#example5').val());

            $("#input_star").val(sum / 5);
            return Math.round(sum / 5);
        }

        function val() {
            $('#star_value').html((Number($('#example').val()) + Number($('#example2').val())
                    + Number($('#example3').val()) + Number($('#example4').val()) +
                    Number($('#example5').val())) / 5);
        }


        $('#example').change(function () {
            $('#example6').barrating('set', avg());
            val();
        });
        $('#example2').change(function () {
            $('#example6').barrating('set', avg());
            val();
        });
        $('#example3').change(function () {
            $('#example6').barrating('set', avg());
            val();
        });
        $('#example4').change(function () {
            $('#example6').barrating('set', avg());
            val();
        });
        $('#example5').change(function () {
            $('#example6').barrating('set', avg());
            val();
        });

        $('#example').change(function () {

        });
    </script>



@endsection