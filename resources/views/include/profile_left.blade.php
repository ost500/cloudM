<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <div class="side-bar-revenues">
        <a href="/profile" class="head {{ (Request::is('profile'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;프로필관리</a>

        <a href="/profile/portfolio/list/{{ $loginUser->id }}" class="head {{ (Request::is('profile/portfolio/*'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;포트폴리오</a>

        <a href="/profile/company" class="head {{ (Request::is('profile/company'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;회사소개서</a>

        <a href="/profile/proposal" class="head {{ (Request::is('profile/proposal'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;상품소개서</a>

    </div>
</div>