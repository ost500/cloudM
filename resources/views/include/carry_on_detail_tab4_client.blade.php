<h6 class="my_h6">결제 정보</h6>
<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>

        <tr>
            <th>착수금(%)</th>
            <th>지급시기</th>
            <th>지급여부</th>
            <th>지급요청</th>
            <th>지급승인일</th>
            <th>지급처리일</th>
        </tr>


        <tr>
            <td>{{ $pay['start'] }}원 ({{ $contract->start_pay_ratio }}%) </td>
            <td>{{ $contract->start_pay_date }} </td>
            <td>{{ ($contract->start_pay_give_date == "0000-00-00")?"지급전":"지급완료" }}</td>
            <td>
                @if($contract->start_pay_request_date != "0000-00-00")
                    <button class="btn btn-azure btn-sm" id="start_button_{{$contract->id}}">{{ $contract->start_pay_request_date }} 지급요청</button>
                @else
                    지급요청전
                @endif
            </td>
            <td>
                @if($contract->start_pay_request_date != "0000-00-00" &&
                    $contract->start_pay_accept_date == "0000-00-00")
                <form id="pay_request_form{{ $contract->id }}"
                      method="POST"
                      action="{{ url("/client/project/carryon/pay/request/".$contract->id) }}"
                      onsubmit="return confirm('지급승인 하시겠습니까?');">
                    {!! csrf_field() !!}
                    <input name="pay_type" hidden value="first">
                    <input name="p_id" hidden
                           value="{{$contract->p_id}}">
                <button class="btn btn-danger btn-sm" id="start_button_{{$contract->id}}">지급승인</button>
                </form>
            </td>

            <script>
                $("#{start_button_{{$contract->id}}").click(function () {
                    $("#pay_request_form{{ $contract->id }}").submit();
                });
            </script>
            @else
                @if($contract->start_pay_request_date != "0000-00-00" &&
                   $contract->start_pay_accept_date != "0000-00-00")
                    <button class="btn btn-azure btn-sm" id="start_button_{{$contract->id}}">{{ $contract->start_pay_accept_date }} 승인완료</button>
                @else
                    승인전
                @endif
            @endif
            <td>{{ ($contract->start_pay_give_date == "0000-00-00")?"지급처리전":$contract->start_pay_give_date }}</td>
        </tr>
    </table>
</div>

<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>

        <tr>
            <th>중도금(%)</th>
            <th>지급시기</th>
            <th>지급여부</th>
            <th>지급요청</th>
            <th>지급승인일</th>
            <th>지급처리일</th>
        </tr>


        <tr>
            <td>{{ $pay['middle'] }}원 ({{ $contract->middle_pay_ratio }}%) </td>
            <td>{{ $contract->middle_pay_date }} </td>
            <td>{{ ($contract->middle_pay_give_date == "0000-00-00")?"지급전":"지급완료" }}</td>
            <td>
                @if($contract->middle_pay_request_date != "0000-00-00")
                    <button class="btn btn-azure btn-sm" id="middle_button_{{$contract->id}}">{{ $contract->middle_pay_request_date }} 지급요청</button>
                @else
                    지급요청전
                @endif
            </td>
            <td>
                @if($contract->middle_pay_request_date != "0000-00-00" &&
                    $contract->middle_pay_accept_date == "0000-00-00")
                    <form id="pay_request_form{{ $contract->id }}"
                          method="POST"
                          action="{{ url("/client/project/carryon/pay/request/".$contract->id) }}"
                          onsubmit="return confirm('지급승인 하시겠습니까?');">
                        {!! csrf_field() !!}
                        <input name="pay_type" hidden value="middle">
                        <input name="p_id" hidden
                               value="{{$contract->p_id}}">
                        <button class="btn btn-danger btn-sm" id="middle_button_{{$contract->id}}">지급승인</button>
                    </form>
            </td>

            <script>
                $("#{middle_button_{{$contract->id}}").click(function () {
                    $("#pay_request_form{{ $contract->id }}").submit();
                });
            </script>
            @else
                @if($contract->middle_pay_request_date != "0000-00-00" &&
                   $contract->middle_pay_accept_date != "0000-00-00")
                <button class="btn btn-azure btn-sm" id="middle_button_{{$contract->id}}">{{ $contract->middle_pay_accept_date }} 승인완료</button>
                @else
                    승인전
                @endif
            @endif
            <td>{{ ($contract->middle_pay_give_date == "0000-00-00")?"지급처리전":$contract->middle_pay_give_date }}</td>
        </tr>
    </table>
</div>

<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>
        <col style="width:16.6%;"/>

        <tr>
            <th>잔금(%)</th>
            <th>지급시기</th>
            <th>지급여부</th>
            <th>지급요청</th>
            <th>지급승인일</th>
            <th>지급처리일</th>
        </tr>


        <tr>
            <td>{{ $pay['finish'] }}원 ({{ $contract->finish_pay_ratio }}%) </td>
            <td>{{ $contract->finish_pay_date }} </td>
            <td>{{ ($contract->finish_pay_give_date == "0000-00-00")?"지급전":"지급완료" }}</td>
            <td>
                @if($contract->finish_pay_request_date != "0000-00-00")
                    <button class="btn btn-azure btn-sm" id="finish_button_{{$contract->id}}">{{ $contract->finish_pay_request_date }} 지급요청</button>
                @else
                    지급요청전
                @endif
            </td>
            <td>
                @if($contract->finish_pay_request_date != "0000-00-00" &&
                    $contract->finish_pay_accept_date == "0000-00-00")
                    <form id="pay_request_form{{ $contract->id }}"
                          method="POST"
                          action="{{ url("/client/project/carryon/pay/request/".$contract->id) }}"
                          onsubmit="return confirm('지급승인 하시겠습니까?');">
                        {!! csrf_field() !!}
                        <input name="pay_type" hidden value="finish">
                        <input name="p_id" hidden
                               value="{{$contract->p_id}}">
                        <button class="btn btn-danger btn-sm" id="finish_button_{{$contract->id}}">지급승인</button>
                    </form>
            </td>

            <script>
                $("#{finish_button_{{$contract->id}}").click(function () {
                    $("#pay_request_form{{ $contract->id }}").submit();
                });
            </script>
            @else
                @if($contract->finish_pay_request_date != "0000-00-00" &&
                   $contract->finish_pay_accept_date != "0000-00-00")
                    <button class="btn btn-azure btn-sm" id="start_button_{{$contract->id}}">{{ $contract->start_pay_accept_date }} 승인완료</button>
                @else
                    승인전
                @endif
            @endif
            <td>{{ ($contract->finish_pay_give_date == "0000-00-00")?"지급처리전":$contract->finish_pay_give_date }}</td>
        </tr>
    </table>
</div>