<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <h5 class="side-tittle">세부 메뉴</h5>
    <table class="history_table">
        <tbody>



        @if(Request::is('dashboard'))
            <tr>
                <th><a href="{{ url('/client/project/checking') }}">검수중 프로젝트</a></th>
                <td>{{ count($checking) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/client/project/posted') }}">등록 프로젝트</a></th>
                <td>{{ count($registered) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/client/project/carryon') }}">진행중 프로젝트</a></th>
                <td>{{ count($proceeding) }}건</td>
            </tr>
            <tr>
                <th><a href="{{ url('/client/project/done') }}">완료된 프로젝트</a></th>
                <td>{{ count($done) }}건</td>
            </tr>
        @elseif(Request::is('client/project/checking') || Request::is('client/project/temp') || Request::is('client/project/fail'))
            <tr>
                <th>
                    <a href="{{ url('/client/project/checking') }}">검수중 프로젝트</a>
                <td>{{ count($checking) }}건</td>
            </tr>
            <tr>
                <th>
                    <a href="{{ url('/client/project/temp') }}">임시 저장</a>
                </th>
                <td>{{ count($temp) }}건</td>
            </tr>
            <tr>
                <th>
                    <a href="{{ url('/client/project/fail') }}">등록 실패</a>
                </th>
                <td>{{ count($fail) }}건</td>
            </tr>
        @elseif(Request::is('client/project/posted'))
            <tr>
                <th>등록 프로젝트</th>
                <td>{{ count($registered) }}건</td>
            </tr>
        @elseif(Request::is('client/project/carryon'))
            <tr>
                <th>진행중 프로젝트</th>
                <td>{{ count($proceeding) }}건</td>
            </tr>
        @elseif(Request::is('client/project/done') || Request::is('client/project/cancel'))
            <tr>
                <th><a href="{{ url("/client/project/done") }}">완료된 프로젝트</a></th>
                <td>{{ count($done) }}건</td>
            </tr>
            <tr>
                <th>
                    <a href="{{ url("/client/project/cancel") }}">취소한 프로젝트</a>
                </th>
                <td>{{ count($cancel) }}건</td>
            </tr>
        @endif




        </tbody>
    </table>
</div>




