@extends('layouts.master_layout')
@section('right_content')

    <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
        <span class="h3 text-bold">커뮤니케이션 게시판</span>
        <p class="padding-top-10">대화를 나눠 보세요. </p>
    </div>


    <!-- Job Content -->
    <div id="accordion">

        <!-- Job Section -->
        <div class="job-content job-post-page">
            <!-- Job Tittle -->
            <table class="table">
                <col style="width:10%;"/>
                <col style="width:50%;"/>
                <col style="width:20%;"/>
                <col style="width:20%;"/>

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

                @for($i=count($communi)-1; $i>=0; $i--)
                    <tr>
                        <td>
                            {{ $i+1 }}
                        </td>
                        <td>
                            <a href="{{ url('client/project/carryon/'.$communi[$i]->project_id."/".$communi[$i]->id) }}">{{ $communi[$i]->title }}</a>
                        </td>

                        <td>
                            {{ $communi[$i]->created_at }}
                        </td>

                        <td>
                            {{ $communi[$i]->writer->name }}
                        </td>
                    </tr>
                @endfor


            </table>
        </div>
    </div>



@endsection

