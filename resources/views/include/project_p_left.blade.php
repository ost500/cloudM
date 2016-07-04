<div class="job-sider-bar003">
    @include('include.left_info')
</div>

<div class="job-sider-bar02">
    <div class="side-bar-revenues">
        @if(Request::is('dashboard'))
            <a href="{{ url('/dashboard') }}" class="head {{ (Request::is('dashboard'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;전체 프로젝트</a>

            <a href="{{ url('/partner/project/apply') }}" class="head {{ (Request::is('partner/project/apply'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;지원한 프로젝트 {{ count($app) }}건</a>

            <a href="{{ url('/partner/project/carryon') }}" class="head {{ (Request::is('partner/project/carryon'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;진행중 프로젝트 {{ count($carryon) }}건</a>

            <a href="{{ url('/partner/project/done') }}" class="head {{ (Request::is('partner/project/done'))?"on":"" }}"><i
                    class="fa fa-angle-double-right "></i> &nbsp;완료한 프로젝트 {{ count($compeleted) }}건</a>
        @elseif(Request::is('partner/project/apply') || Request::is('partner/project/apply/finished') || Request::is('partner/project/interesting'))
            <a href="{{ url('/partner/project/apply') }}" class="head {{ (Request::is('partner/project/apply'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;지원한 프로젝트 {{ count($app) }}건</a>

            <a href="{{ url('/partner/project/apply/finished') }}" class="head {{ (Request::is('partner/project/apply/finished'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;지원 종료 프로젝트 {{ count($app_finished) }}건</a>

            <a href="{{ url('/partner/project/interesting') }}" class="head {{ (Request::is('partner/project/interesting'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;관심 프로젝트 {{ count($interesting) }}건</a>
        @elseif(Request::is('partner/project/carryon'))
            <a href="{{ url('/partner/project/carryon') }}" class="head {{ (Request::is('partner/project/carryon'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;진행중 프로젝트 {{ count($carryon) }}건</a>
        @elseif(Request::is('partner/project/done'))

            <a href="{{ url('/partner/project/done') }}" class="head {{ (Request::is('partner/project/done'))?"on":"" }}"><i
                        class="fa fa-angle-double-right "></i> &nbsp;완료한 프로젝트 {{ count($compeleted) }}건</a>
        @endif
    </div>
</div>


