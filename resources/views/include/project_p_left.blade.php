<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <h5 class="side-tittle">세부 메뉴</h5>
    <table class="history_table">
        <tbody>



        @if(Request::is('dashboard'))
            <tr>
                <th><a href="{{ url('/partner/project/apply') }}">지원한 프로젝트</a></th>
                <td>{{ count($app) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/partner/project/carryon') }}">진행중 프로젝트</a></th>
                <td>{{ count($carryon) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/partner/project/done') }}">완료한 프로젝트</a></th>
                <td>{{ count($compeleted) }}건</td>
            </tr>
        @elseif(Request::is('partner/project/apply') || Request::is('partner/project/apply/finished') || Request::is('partner/project/interesting'))
            <tr>
                <th><a href="{{ url('/partner/project/apply') }}">지원한 프로젝트</a></th>
                <td>{{ count($app) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/partner/project/apply/finished') }}">지원 종료 프로젝트</a></th>
                <td>{{ count($app_finished) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/partner/project/interesting') }}">관심 프로젝트</a></th>
                <td>{{ count($interesting) }}건</td>
            </tr>
        @elseif(Request::is('partner/project/carryon'))
            <tr>
                <th>진행중 프로젝트</th>
                <td>{{ count($carryon) }}건</td>
            </tr>
        @elseif(Request::is('partner/project/done/partner'))
            <tr>
                <th>완료한 프로젝트</th>
                <td>{{ count($compeleted) }}건</td>
            </tr>
        @endif




        </tbody>
    </table>
</div>




