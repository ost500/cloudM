@extends('admin.layouts.app')

@section('content')



    <h2 class="sub-header">프로젝트 지원 목록</h2>
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
                    <td>{{ $pro->title }}</td>
                    <td>{{ $pro->client->name }}</td>

                    <td>{{ $pro->client->email }}</td>
                    <td>{{ $pro->step }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
