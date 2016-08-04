@extends('admin.layouts.app')

@section('content')



    <h2 class="sub-header">프로젝트</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>프로젝트명</th>
                <th>진행</th>
                <th>파트너</th>
                <th>진행</th>
                <th>변경</th>
                <th>게시 메일 보내기</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $pro)
                <tr>
                    <td>{{ $pro->id }}</td>
                    <td><a href="{{ url("/detail/".$pro->id) }}">{{ $pro->title }}</a></td>
                    <td>{{ $pro->client->name }}</td>

                    <td>{{ $pro->client->email }}</td>
                    <td>{{ $pro->step }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                변경
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url("/admin/step_change/".$pro->id."/검수") }}">검수</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url("/admin/step_change/".$pro->id."/게시") }}">게시</a></li>
                                <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="{{ url("/admin/step_change/".$pro->id."/미팅") }}">미팅</a></li>
                                <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="{{ url("/admin/step_change/".$pro->id."/계약") }}">계약</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url("/admin/step_change/".$pro->id."/대금지급") }}">대금지급</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url("/admin/step_change/".$pro->id."/완료") }}">완료</a></li>
                            </ul>
                        </div>
                    </td>
                    <td><a href = "{{ url("/new_project_send_email/".$pro->id) }}"><button class="btn btn-default">메일 보내기</button></a>{{$pro->email_sent->count()}}회 보냄</td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
