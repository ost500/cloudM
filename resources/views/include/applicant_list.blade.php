<div class="col-md-12 panel-white padding-20">
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-1 padding-0 text-center">
                @if($app_list->user['profileImage'] != null)
                    <img class="partner_profile02"
                         src="{{ URL::asset($app_list->user['profileImage']) }}"><br>
                @else
                    <img class="partner_profile02" src="/images/p_img02.png"><br>
                @endif
            </div>
            <div class="col-md-10">
                <div>
                    <span class="name_b">{{ $app_list->user['email'] }}</span>
                    <ul>
                        <li style="float:left"><div class="rating star-lg star-lg-0"></div></li>
                        <li style="float:left">
                            <span class="rating-stats-body stats-body">
                                <span class="average-rating-score">0.0</span>
                                <span class="rating-append-unit append-unit">/ 평가 0개</span>
                            </span>
                        </li>
                    </ul>
                    <div class="clear padding-top-5"></div>
                    <div>
                        <span class="media-body-sm02">{{ $app_list->user['company_type'] }}</span>
                        <span class="media-body-sm02 bar"></span>
                        <span class="media-body-sm02">지역: {{ $app_list->user['address'] }}</span>
                        <span class="media-body-sm02 bar"></span>
                        <span class="media-body-sm02">계약한 프로젝트 1개</span>
                        <span class="media-body-sm02 bar"></span>
                        <span class="media-body-sm02 la-line"><span>전체 포트폴리오</span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class=" applist_profile_line"></div>

        <div class="row padding-top-20">
            <div class="col-md-1 padding-0 text-center">지원내용</div>
            <div class="col-md-11"><?=nl2br($app_list->content)?></div>
        </div>

        <div class=" applist_profile_line"></div>

        <div class="row margin-top-20">
            <div class="col-md-1 padding-0 text-center">서류</div>
            <div class="col-sm-11">
                <table class="table_04">
                    <col style="width:14%;"/>
                    <col style="width:36%;"/>
                    <col style="width:14%;"/>
                    <col style="width:36%;"/>
                    <tr>
                        <th>회사소개서</th>
                        <td>
                            @if($app_list->user->partners['company_file_name'] && file_exists(public_path().$app_list->user->partners['company_file_name'] && $app_list->user->partners['company_file_check']))
                                <a href="/apply/download/company/{{ $app_list->id }}">{{ $app_list->user->partners['company_origin_name'] }}</a>
                            @else
                                등록된 회사소개서가 없습니다.
                            @endif
                        </td>

                        <th>상품소개서</th>
                        <td>
                            @if($app_list->user->partners['proposal_file_name'] && file_exists(public_path().$app_list->user->partners['proposal_file_name']) && $app_list->user->partners['proposal_file_check'])
                                <a href="/apply/download/proposal/{{ $app_list->id }}">{{ $app_list->user->partners['proposal_origin_name'] }}</a>
                            @else
                                등록된 상품소개서가 없습니다.
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>맞춤제안서</th>
                        <td colspan="3">
                            @if($app_list['file_name'] && file_exists(public_path().$app_list['file_name']))
                                <a href="/apply/download/{{ $app_list->id }}">{{ $app_list['origin_name'] }}</a>
                            @else
                                제출된 맞춤제안서가 없습니다.
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>


    </div>

    <div class="col-md-2">
        <div class="row">
            <form action="{{ url('/applist/meeting') }}"
                  method="POST" role="form" onsubmit="return confirm('미팅신청 하시겠습니까?');">
                {!! csrf_field() !!}
                <input name="id" type="hidden"
                       value="{{ $app_list['id']}}">
                <button class="btn btn-dark-azure pull-right" type="submit">미팅신청</button>
            </form>
        </div>

        <div class="row margin-top-5">
            <form action="{{ url('/applist/interest') }}"
                  method="POST" role="form" onsubmit="return confirm('관심등록 하시겠습니까?');">
                {!! csrf_field() !!}
                <input name="id" type="hidden"
                       value="{{ $app_list['id']}}">
                <button class="btn btn-orange pull-right" type="submit">관심등록</button>
            </form>
        </div>

        <div class="row margin-top-5">
            <form action="{{ url('/applist/out') }}"
                  method="POST" role="form" onsubmit="return confirm('탈락등록 하시겠습니까?');">
                {!! csrf_field() !!}
                <input name="id" type="hidden"
                       value="{{ $app_list['id']}}">
                <button class="btn btn-dark-grey pull-right" type="submit">탈락등록</button>
            </form>
        </div>

    </div>
</div>