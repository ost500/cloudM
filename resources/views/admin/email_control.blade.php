@extends('admin.layouts.app')

@section('content')



    <h2 class="sub-header">프로젝트</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>프로젝트명</th>
                <th>게시 메일 보내기</th>
                <th>검수 탈락 메일</th>
                <th>미팅 메일</th>
                <th>파트너</th>
                <th>진행</th>


            </tr>
            </thead>
            <tbody>
            @foreach($projects as $pro)
                <tr>

                    <td>{{ $pro->id }}</td>
                    <td><a href="{{ url("/detail/".$pro->id) }}">{{ $pro->title }}</a></td>
                    <td><a href="{{ url("/new_project_send_email/".$pro->id) }}">
                            <button class="btn btn-default">메일 보내기</button>
                        </a>{{$pro->email_new->count()}}회 보냄
                    </td>
                    <td><a href="{{ url("/email_manual/".$pro->id."?purpose=fail_check") }}">
                            <button class="btn btn-default">메일 보내기</button>
                        </a>{{$pro->email_failed->count()}}회 보냄
                    </td>
                    <td><a href="{{ url("/email_manual/".$pro->id."?purpose=meeting") }}">
                            <button class="btn btn-default">메일 보내기</button>
                        </a>{{$pro->email_meeting->count()}}회 보냄
                    </td>


                    <td>{{ $pro->client->email }}</td>
                    <td>{{ $pro->step }}</td>



                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
