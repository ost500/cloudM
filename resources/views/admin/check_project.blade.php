@extends('admin.layouts.app')

@section('content')



    <h2 class="sub-header">검수 중 프로젝트</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>프로젝트명</th>
                <th>진행</th>
                <th>파트너</th>
                <th>진행</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $pro)
                <tr>
                    <td>{{ $pro->id }}</td>
                    <td><a href="{{ url("/detail/".$pro->id) }}">{{ $pro->title }}</a></td>
                    <td>{{ $pro->client->name }}</td>

                    <td>{{ $pro->client->email }}</td>
                    <td>{{ $pro->step }} <a href = "{{ url("/admin/post/".$pro->id) }}"><button class="btn btn-default">게시</button></a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
