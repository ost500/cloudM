@extends('layouts.evaluation_layout')
@section('right_content')


    <div class="panel02 panel-default02 margin-top-20">
        <div class="panel-heading03">
            <div>
                <ul>
                    <li class="panel-heading03_title">{{$project->title}}</li>
                    <li class="panel-heading03_title02">클라이언트 &nbsp; <strong>{{$project->client->nick}}</strong></li>
                </ul>
            </div>
        </div>
        <div class="panel-body04">
            <ul>
                <!--<li class="row">
                  <span class="col-xs-4">계약일 2015년12월12일</span>
                  <span class="col-xs-4">계약금액 5,000,000원</span>
                  <span class="col-xs-4">계약기간 100일</span>
                </li>-->

                <li class="col-xs-4"><i class="fa fa-calendar-minus-o"></i> 계약일 {{ $contract->contract_date }}</li>
                <li class="col-xs-4"><i class="fa fa-krw"></i> 계약금액 {{ $contract->contract_pay }}</li>
                <li class="col-xs-4"><i class="fa fa-clock-o"></i> 계약기간 {{ $project->estimated_duration }}</li>
            </ul>
        </div>

        <form action="{{route('eval_post',['id'=>$project->id])}}" method="post" id="eval_form" role="form">
            {!! csrf_field() !!}
            <div class="panel-body05">
                <ul>
                    <li>
                        <div>광고주 별점</div>

                        <select name="star" autofocus id="example">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <div id="star_value">{{ $contract->star }}</div>

                    </li>
                </ul>
            </div>

            <div class="panel-body06">
                <span><img class="partner_profile03" src="{{ $project->client->profileImage }}"></span>
                <div>
                    <span class="rd_box02">광고주</span><span><strong>{{ $project->client->nick }}</strong></span><br>
                    <textarea name="evaluation" style="width:100%">{{ $contract->evaluation }}</textarea>
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
                initialRating: "{{ $contract->star }}"
            });

        });
        $('#example').change(function () {
            $('#star_value').html($('#example').val());
        });
    </script>



@endsection