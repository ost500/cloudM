@extends('layouts.master_layout')
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
                            @if(Auth::user() == $portfolios->partner->user)
                                <a style="cursor:pointer" id="delete_port"
                                   class="button004">삭제</a>
                                <a href="{{ url('/profile/portfolio/update/'.$portfolios->id) }}"
                                   class="button004 margin-top-3">수정</a>
                                <form hidden id="delete_portfolio">
                                    {!! csrf_field() !!}
                                    <input hidden name="id" value="{{ $portfolios->id }}">
                                </form>
                                <script>
                                    $("#delete_port").click(function () {

                                        if (confirm('정말로 삭제하시겠습니까?')) {
                                            $.ajax({
                                                type: 'POST',
                                                url: '{{ route('portfolio_del',['id'=>$portfolios->id]) }}',
                                                data: $("#delete_portfolio").serialize(),
                                                success: function () {
                                                    window.location.assign("{{route('profile_portfolio_list',['id'=>Auth::user()->id])}}");
                                                }

                                            });
                                        }
                                    });
                                </script>
                            @endif

                            <div class="media-body02">
                                <h6 class="portfolio_title">{{ $portfolios->title }} <?=($portfolios->top)?"<span class=\"port_title_box\">대표 포트폴리오</span>":"" ?></h6>
                            </div>
                        </div>
                        <table class="table_02 margin-top-30" width=100%>
                            <col style="width:15%;"/>
                            <col style="width:85%;"/>
                            <tr>
                                <th>업종</th>
                                <td class="left">{{ $portfolios->category }}</td>
                            </tr>
                            <tr>
                                <th>매체</th>
                                <td class="left"><?=str_replace(",", ", ", $portfolios->area)?></td>
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
                                                        class="img-responsive port_detail_img">
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