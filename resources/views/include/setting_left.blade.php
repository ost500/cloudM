<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <h5 class="side-tittle">개인정보관리</h5>
    <table class="sub_menu">
        <tbody>
        <tr>
            <td><a href="{{ url('/setting/profile') }}">개인정보수정</a></td>
        </tr>
        <tr>
            <td><a href="{{ url('/setting/auth') }}">신원인증</a></td>
        </tr>
        <tr>
            <td><a href="{{ url('/setting/bank') }}">계좌관리</a></td>
        </tr>
        <tr>
            <td><a href="{{ url('/setting/password') }}">비밀번호 변경</a></td>
        </tr>
        <tr>
            <td><a href="{{ url('/setting/notification') }}">알림설정</a></td>
        </tr>
        </tbody>
    </table>
</div>