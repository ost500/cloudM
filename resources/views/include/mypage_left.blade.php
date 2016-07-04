<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <div class="side-bar-revenues">

        <a href="/mypage" class="head {{ (Request::is('mypage'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;프로필관리</a>

        <a href="/portfolio_list/1" class="head {{ (starts_with(Route::getCurrentRoute()->getPath(), 'portfolio'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;포트폴리오</a>

    </div>
</div>