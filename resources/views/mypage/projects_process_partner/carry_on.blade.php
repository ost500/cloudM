@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">진행 중</span>
        <p class="padding-top-5">진행중인 캠페인을 확인할 수 있습니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">
        <div class="job-content job-post-page margin-bottom-10">
                <div class="panel-body">

                    <div class="port_guide img_f">
                        <img src="/images/i_icon.png" style="margin-top:12px;">

                        <div class="p_add_span padding-left-50">
                            <div class="content">1. 캠페인은 광고주가 대금을 결제한 후에 진행됩니다.</div>
                            <div class="content">2. 광고주의 승인시에만 계약시 약정한 기간에 맞춰 착수금, 중도금, 잔금을 지급 합니다.</div>
                            <div class="content">3. 고객센터 1544-2329 이메일 help@fastm.io</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="margin-top-20 margin-bottom-10">
                            <div class="panel02 panel-default02 margin-bottom-30">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:40%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:15%;"/>
                                    <tr>
                                        <th>캠페인명</th>
                                        <th>계약일자</th>
                                        <th>상태</th>
                                        <th>상세정보</th>
                                    </tr>
                                    @if(sizeof($carryon) == 0)
                                        <td colspan="4">진행 중 캠페인가 없습니다</td>
                                    @endif

                                    @foreach($carryon as $carryonItem)
                                        <tr>
                                            <td class="left"><a
                                                        href="{{ url("detail/".$carryonItem->id) }}">{{ $carryonItem->title }}</a>
                                            </td>
                                            <td>{{ substr($carryonItem->created_at, 0, 10) }}</td>
                                            <td>{{ $carryonItem->step }}</td>
                                            <td><a href="{{ url("partner/project/carryon/".$carryonItem->id) }}">
                                                    <button class="btn btn-azure btn-sm">상세정보</button>
                                                </a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

