@extends('layouts.company_layout')
@section('company')



    <div class="col-md-9 job-right" id="story">

        <div class="panel panel-default">
            <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                <span style="color:black" class="h3 text-bold">언론보도</span>
                <p class="padding-top-5">언론에서 바라본 패스트엠 입니다.</p>
            </div>

            <div class="job-content">
                <table class="table">
                    <tr>
                        <th>번호</th>
                        <th width="70%">제목</th>
                        <th>등록일</th>
                    </tr>

                    @if($news->count() == 0)
                        <tr><td colspan="3" align="center">등록된 언론보도가 없습니다.</td></tr>
                    @endif


                    @foreach($news as $detail)

                        <tr>
                            <td>
                                {{ $detail->id }}
                            </td>
                            <td>
                                <a href="{{$detail->content}}">{{ $detail->title}}</a>
                            </td>

                            <td>
                                {{ substr($detail->created_at, 0, 10) }}
                            </td>
                        </tr>

                    @endforeach


                </table>
            </div>
        </div>
    </div>

@endsection

