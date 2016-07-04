@extends('include.admin')
@section('customer_centre')



    <div class="col-md-9 job-right" id="story">

        <div class="panel panel-default">
            <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                <span style="color:black" class="h3 text-bold">공지사항</span>
                <p class="padding-top-5">패스트엠 관리자가 알리는 공지사항입니다.</p>
            </div>

            <div class="job-content">


                <table class="table">
                    <tr>
                        <th>
                            번호
                        </th>
                        <th>
                            내용
                        </th>
                        <th>
                            날짜
                        </th>
                        <th>
                            글쓴이
                        </th>
                    </tr>

                    @foreach($notis as $noti)

                        <tr>
                            <td>
                                {{ $noti->id }}
                            </td>
                            <td>
                                <a href="{{ url('customer_centre/notification/'.$noti->id) }}">{{ $noti->notification }}</a>
                            </td>

                            <td>
                                {{ $noti->created_at }}
                            </td>

                            <td>
                                관리자
                            </td>
                        </tr>

                    @endforeach


                </table>
            </div>
        </div>
    </div>

@endsection

