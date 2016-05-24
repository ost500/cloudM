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
            @foreach($App as $app_item)
            <tr>
                <td>{{ $app_item->id }}</td>
                <td><a href="{{ url("/detail/".$pro->id) }}">{{ $app_item->project->title }}</a></td>
                <td>{{ $app_item->project->step }}</td>
                <td>{{ $app_item->user->name }}</td>
                <td>{{ $app_item->choice }}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
