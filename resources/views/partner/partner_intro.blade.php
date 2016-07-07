@extends('layouts.partner_layout')
@section('right_content')
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
                        <h6 class="partner_title">{{ $partner->user->nick }} 님의 자기소개 입니다.</h6>

                        <?=nl2br($partner->intro)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection