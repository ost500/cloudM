<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <h5 class="side-tittle">세부 메뉴</h5>
    <table class="history_table">
        <tbody>



        @if(Request::is('dashboard'))
            <tr>
                <th><a href="{{ url('/my_apply') }}">지원한 프로젝트</a></th>
                <td>{{ count($app) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/my_carry_on_p') }}">진행중 프로젝트</a></th>
                <td>{{ count($carryon) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/my_done_p') }}">완료한 프로젝트</a></th>
                <td>{{ count($compeleted) }}건</td>
            </tr>
        @elseif(Request::is('myProject/apply') || Request::is('myProject/apply/finished') || Request::is('myProject/interesting'))
            <tr>
                <th><a href="{{ url('/myProject/apply') }}">지원한 프로젝트</a></th>
                <td>{{ count($app) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/myProject/apply/finished') }}">지원 종료 프로젝트</a></th>
                <td>{{ count($app_finished) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/myProject/interesting') }}">관심 프로젝트</a></th>
                <td>{{ count($interesting) }}건</td>
            </tr>
        @elseif(Request::is('myProject/carryOn/partner'))
            <tr>
                <th>진행중 프로젝트</th>
                <td>{{ count($carryon) }}건</td>
            </tr>
        @elseif(Request::is('myProject/done/partner'))
            <tr>
                <th>완료한 프로젝트</th>
                <td>{{ count($compeleted) }}건</td>
            </tr>
        @endif




        </tbody>
    </table>
</div>




