@include('include.head')
    <!-- Content -->
    <div id="content">
        <!-- Job -->
        <section class="job padding-top-15 padding-bottom-20">
            <div class="container">
                <!-- Side Bar -->
                <div class="row">
                    <div class="col-md-3">{{ Route::getCurrentRoute()->getPath }}
                        @if (starts_with(Route::getCurrentRoute()->getPath(), 'setting'))
                            @include('include.setting_left')
                        @elseif(Request::is('dashboard') || starts_with(Route::getCurrentRoute()->getPath(), 'client') || starts_with(Route::getCurrentRoute()->getPath(), 'partner'))
                            @if($loginUser->PorC == "P")
                                @include('include.project_p_left')
                            @else
                                @include('include.project_c_left')
                            @endif
                        @else
                            @include('include.mypage_left')
                        @endif
                    </div>


                    <!-- Job  Content -->
                    <div class="col-md-9 job-right">
                        @yield('right_content')
                    </div>

                </div>
            </div>
        </section>
    </div>
@include('include.footer')
