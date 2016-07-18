<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <div class="side-bar-revenues">

        @if(Request::is('dashboard'))
            <a href="{{ url('/dashboard') }}" class="head {{ (Request::is('dashboard'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;전체 캠페인</a>

            <a href="{{ url('/client/project/checking') }}" class="head {{ (Request::is('client/project/checking'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;검수중 캠페인 {{ count($checking) }}건</a>

            <a href="{{ url('/client/project/posted') }}" class="head {{ (Request::is('client/project/posted'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;등록 캠페인 {{ count($registered) }}건</a>

            <a href="{{ url('/client/project/carryon') }}" class="head {{ (Request::is('client/project/carryon'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;진행중 캠페인 {{ count($proceeding) }}건</a>

            <a href="{{ url('/client/project/done') }}" class="head {{ (Request::is('client/project/done'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;완료된 캠페인 {{ count($done) }}건</a>

        @elseif(Request::is('client/project/checking') || Request::is('client/project/temp') || Request::is('client/project/fail'))
            <a href="{{ url('/client/project/checking') }}" class="head {{ (Request::is('client/project/checking'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;검수중 캠페인 {{ count($checking) }}건</a>

            <a href="{{ url('/client/project/temp') }}" class="head {{ (Request::is('client/project/temp'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;임시 저장 {{ count($temp) }}건</a>

            <a href="{{ url('/client/project/fail') }}" class="head {{ (Request::is('client/project/fail'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;등록 실패 {{ count($fail) }}건</a>
        @elseif(Request::is('client/project/posted'))
            <a href="{{ url('/client/project/posted') }}" class="head {{ (Request::is('client/project/posted'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;등록 캠페인 {{ count($registered) }}건</a>

        @elseif(Request::is('client/project/carryon'))
            <a href="{{ url('/client/project/carryon') }}" class="head {{ (Request::is('client/project/carryon'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;진행중 캠페인 {{ count($proceeding) }}건</a>
        @elseif(Request::is('client/project/done') || Request::is('client/project/cancel'))
            <a href="{{ url('/client/project/done') }}" class="head {{ (Request::is('client/project/done'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;완료된 캠페인 {{ count($done) }}건</a>
            <a href="{{ url('/client/project/cancel') }}" class="head {{ (Request::is('client/project/cancel'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;취소한 캠페인 {{ count($cancel) }}건</a>
        @elseif(starts_with(Route::getCurrentRoute()->getPath(), 'client/project/carryon'))
            <a href="{{ url('/client/project/carryon') }}" class="head {{ (Request::is('client/project/carryon'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;진행중 캠페인 {{ count($proceeding) }}건</a>
        @endif
    </div>
</div>




