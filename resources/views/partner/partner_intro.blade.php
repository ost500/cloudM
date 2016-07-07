@extends('layouts.partner_layout')
@section('right_content')
<div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
    <span class="h3 text-bold">{{ $partner->user->nick }} 님의 자기소개 입니다.</span>
</div>

        <!-- Job Content -->
<div id="accordion">

    <!-- Job Section -->
    <div class="job-content job-post-page">
        <!-- Job Tittle -->
        <div class="panel-group">
            <div class="panel panel-default">
                <!-- PANEL HEADING -->
                <div class="panel-heading">
                    <div class="job-tittle02 txt_color_g">
                        <h6 class="my_h6 margin-bottom-10 margin-top-20">자기소개</h6>

                        {{ $partner->intro }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection