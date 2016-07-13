@extends('layouts.master_layout')
@section('right_content')
    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">관심 프로젝트</span>
        <p class="padding-top-5">관심 프로젝트를 확인할 수 있습니다.</p>
    </div>

    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        <div class="job-content job-post-page">
            <div class="panel-body">

                <div class="port_guide img_f">
                    <img src="/images/i_icon.png" style="margin-top:12px;">

                    <div class="p_add_span padding-left-50">
                        <div class="content">1. 프로젝트 지원시 관심 프로젝트에서 제외 됩니다.</div>
                        <div class="content">2. 프로젝트 모집 기간이 지난 경우, 관심 프로젝트에서 제외 됩니다.</div>
                    </div>
                </div>
            </div>

            <!-- Job Tittle -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <!-- PANEL HEADING -->
                    <div class="panel-heading">
                        <div class="job-tittle03 margin-bottom-10">
                            <div class="panel02 panel-default02">
                                <table class="table_01" width=100% cellpadding=0 cellspacing=0>
                                    <col style="width:50%;"/>
                                    <col style="width:20%;"/>
                                    <col style="width:15%;"/>
                                    <col style="width:15%;"/>
                                    <tr>
                                        <th>프로젝트 제목</th>
                                        <th>비용</th>
                                        <th>마감일자</th>
                                        <th>지원하기</th>

                                    </tr>
                                    @if(sizeof($interesting) == 0)
                                        <td colspan="4">관심 프로젝트가 없습니다</td>
                                    @endif
                                    @foreach($interesting as $interestingItem)

                                        <tr>
                                            <td class="left"><a
                                                        href="{{url("/detail/".$interestingItem->id)}}">{{ $interestingItem->title }}</a>
                                            </td>
                                            <td>{{ number_format($interestingItem->budget) }}</td>
                                            <td>{{ $interestingItem->deadline }}</td>
                                            <td><a href="/apply/{{$interestingItem->id}}/application"><button class="btn btn-sm btn-dark-azure" id="pro_apply">지원하기</button></a></td>
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

    <?php

    echo '<script>';
    echo '$("#pro_apply").click(function(){';
    if (!Auth::user()->partners->authenticated) {
        echo 'alert("\n패스트엠은 회원 가입 후 인증을 거쳐야 활동이 가능합니다.\n\n신원인증, 회사소개서, 상품소개서, 회사소개, 포트폴리오 등록 필요\n\n"); return false;';
    }
    echo '});';
    echo '</script>';

    ?>
@endsection

