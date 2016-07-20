@extends('layouts.partner_layout')
@section('right_content')
    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        <!-- Job Section -->
        <div class="job-content job-post-page">
            <!-- Job Tittle -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="job-tittle03">

                            <div class="media-body02">
                                <h6 class="portfolio_title">{{ $portfolios->title }} <?=($portfolios->top)?"<span class=\"port_title_box\">대표 포트폴리오</span>":"" ?></h6>
                            </div>

                            <table class="table_02 margin-top-30" width=100% cellpadding=0
                                   cellspacing=0>
                                <col style="width:15%;"/>
                                <col style="width:85%;"/>
                                <tr>
                                    <th>업종</th>
                                    <td class="left">{{ $portfolios->category }}</td>
                                </tr>
                                <tr>
                                    <th>매체</th>
                                    <td class="left">
                                        <ul class="tags d">
                                        <?=str_replace(",", ", ", $portfolios->area)?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>설명</th>
                                    <td class="left"><?=nl2br($portfolios->description)?></td>
                                </tr>
                                <tr>
                                    <th>참여기간</th>
                                    <td class="left">{{ $portfolios->from_date }}
                                        - {{ $portfolios->to_date }}</td>
                                </tr>
                            </table>
                            <div class="margin-top-20"><img src="{{ $portfolios->image1 }}"
                                                            class="img-responsive">
                            </div>
                            @if($portfolios->image2 != null)
                                <div class="margin-top-20"><img src="{{ $portfolios->image2 }}"
                                                                class="img-responsive port_detail_img">
                                </div>
                            @endif
                            @if($portfolios->image3 != null)
                                <div class="margin-top-20"><img src="{{ $portfolios->image3 }}"
                                                                class="img-responsive port_detail_img">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

