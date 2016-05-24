@extends('admin.layouts.app')

@section('content')

    <h2 class="sub-header">프로젝트 지원 목록</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>이름</th>
                <th>이메일</th>

                <th>종류</th>
            </tr>
            </thead>
            <tbody>
            @foreach($App as $app_item)
                <tr>
                    <td>{{ $app_item->id }}</td>
                    <td>{{ $app_item->name }}</td>
                    <td>{{ $app_item->email }}</td>
                    <td>{{ $app_item->PorC }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
