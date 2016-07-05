<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <div class="side-bar-revenues">

        <a href="/setting/profile" class="head {{ (Request::is('setting/profile'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;개인정보수정</a>

        <a href="/setting/auth" class="head {{ (Request::is('setting/auth'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;신원인증</a>

        <a href="/setting/bank" class="head {{ (Request::is('setting/bank'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;계좌관리</a>

        <a href="/setting/password" class="head {{ (Request::is('setting/password') || Request::is('setting/passwordChange'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;비밀번호 변경</a>

        <a href="/setting/notification" class="head {{ (Request::is('setting/notification'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;알림설정</a>

    </div>
</div>