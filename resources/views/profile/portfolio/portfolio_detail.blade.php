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

                            <div class="media-body02 border_bott">
                                @if(Auth::user() == $portfolios->partner->user)
                                    <a style="cursor:pointer" id="delete_port"
                                       class="button004">삭제</a>
                                    <a href="{{ url('/profile/portfolio/update/'.$portfolios->id) }}" class="button004 margin-top-3">수정</a>
                                    <form hidden id="delete_portfolio">
                                        {!! csrf_field() !!}
                                        <input hidden name="id" value="{{ $portfolios->id }}">
                                    </form>
                                    <script>
                                        $("#delete_port").click(function () {

                                            if (confirm('정말로 삭제하시겠습니까?')) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: "profile/portfolio/delete/{{$portfolios->id}}",
                                                    data: $("#delete_portfolio").serialize(),
                                                    success:function(){
                                                        window.location.assign("{{url('/portfolio_list/'.Auth::user()->id)}}");
                                                    }

                                                });
                                            }
                                        });
                                    </script>
                                @endif
                                <h3 class="margin-bottom-10">{{ $portfolios->title }}
                                    {{--<span class="port_title_box">대표작품</span>--}}
                                </h3>
                                <span>{{ $portfolios->partner->user->name }}의 포트폴리오</span>
                            </div>
                            <table class="table_02 margin-top-30" width=100% cellpadding=0
                                   cellspacing=0>
                                <col style="width:15%;"/>
                                <col style="width:85%;"/>
                                <tr>
                                    <th>카테고리</th>
                                    <td>{{ $portfolios->area }}/{{ $portfolios->category }}</td>
                                </tr>
                                <tr>
                                    <th>설명</th>
                                    <td>
                                        {{ $portfolios->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>참여기간</th>
                                    <td>{{ $portfolios->from_date }}
                                        - {{ $portfolios->to_date }}</td>
                                </tr>
                                <tr>
                                    <th>참여율</th>
                                    <td>{{ $portfolios->participation_rate }}%</td>
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

