<h6 class="my_h6">계약 정보</h6>
<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>

        <tr>
            <th>계약일</th>
            <th>계약금액</th>
            <th>프로젝트 비용 결제 방식</th>
            <th>결제여부</th>
            <th>결제일</th>
        </tr>


        <tr>
            <td>{{ $contract->contract_date }}</td>
            <td>{{ number_format($contract->contract_pay) }}원</td>
            <td>{{ $contract->charge_type}}</td>
            <td>
                @if($contract->charge_check)
                <button class='btn btn-azure btn-sm'>결제완료</button>
                @else
                <button class='btn btn-danger btn-sm'>결제전</button>
                @endif</td>
            </td>
            <td>
                @if($contract->charge_check)
                {{ $contract->charge_date }}
                @endif
            </td>

        </tr>
    </table>
</div>


<h6 class="my_h6">결제 정보</h6>
<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>

        <tr>
            <th>프로젝트 기간</th>
            <th>대금 지급 방식</th>
            <th>착수금(%) / 지급일</th>
            <th>중도금(%) / 지급일</th>
            <th>잔금(%) / 지급일</th>
        </tr>


        <tr>
            <td>{{ $contract->start_work_date }} ~ {{ $contract->finish_work_date }}</td>
            <td>{{ $contract->type_pay }}</td>
            <td>{{ $pay['start'] }}원 ({{ $contract->start_pay_ratio }}%) / {{ $contract->start_pay_date }} </td>
            <td>{{ $pay['middle'] }}원 ({{ $contract->middle_pay_ratio }}%) / {{ $contract->middle_pay_date }} </td>
            <td>{{ $pay['finish'] }}원 ({{ $contract->finish_pay_ratio }}%) / {{ $contract->finish_pay_date }} </td>
        </tr>
    </table>
</div>

@if($loginUser->PorC == "C")
<h6 class="my_h6">클라이언트 정보</h6>
<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:20%;"/>


        <tr>
            <th>업체명</th>
            <th>담당자</th>
            <th>연락처</th>
            <th>이메일</th>
            <th>팩스</th>
        </tr>


        <tr>
            <td><a href="{{ url('partner/'.$contract->user->id) }}"><button class="btn btn-azure btn-sm">{{ $project->client->name }}</button></a></td>
            <td>{{ $project->charger_name }}</td>
            <td>{{ $project->charger_phone }}</td>
            <td>{{ $project->client->email }}</td>
            <td>{{ $project->client->fax_num }}</td>
        </tr>
    </table>
</div>
@else
    <h6 class="my_h6">계약 파트너 정보</h6>
    <div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
        <table class="table_01" width=100% cellpadding=0 cellspacing=0>
            <col style="width:20%;"/>
            <col style="width:20%;"/>
            <col style="width:20%;"/>
            <col style="width:20%;"/>
            <col style="width:20%;"/>


            <tr>
                <th>업체명</th>
                <th>담당자</th>
                <th>연락처</th>
                <th>이메일</th>
                <th>팩스</th>
            </tr>


            <tr>
                <td><a href="{{ url('partner/'.$contract->user->id) }}"><button class="btn btn-azure btn-sm">{{ $contract->user->name }}</button></a></td>
                <td>{{ $project->charger_name }}</td>
                <td>{{ $contract->user->phone_num }}</td>
                <td>{{ $contract->user->email }}</td>
                <td>{{ $contract->user->fax_num }}</td>
            </tr>
        </table>
    </div>
@endif

<h6 class="my_h6">계약 매체</h6>
<div class="panel02 panel-default02 margin-top-10 margin-bottom-30">
    <table class="table_01" width=100% cellpadding=0 cellspacing=0>
        <col style="width:20%;"/>
        <col style="width:20%;"/>
        <col style="width:60%;"/>

        <tr>
            <th>매체명</th>
            <th>계약금액</th>
            <th>한줄설명</th>
        </tr>

        @foreach($project->projects_area as $areas)

        <tr>
            <td>{{ $areas->area }}</td>
            <td>{{ number_format($areas->price) }}원</td>
            <td class="left">{{ $areas->memo }}</td>
        </tr>
        @endforeach

    </table>
</div>