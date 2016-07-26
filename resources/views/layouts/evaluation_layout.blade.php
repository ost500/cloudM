@include('include.head')
<div id="content">
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">
            <div class="coupen">
                <p class="h3 text-bold"><span>{{ $project['title'] }}</span> 캠페인의 평가</p>
                <p class="padding-top-10">진행한 캠페인에 대해서 평가해주세요.</p>
            </div>

            <div class="row padding-top-15">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="job-content job-post-page">

                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="port_guide img_f">
                                        <img src="/images/i_icon.png" style="margin-top:10px;">
                                        <div class="p_add_span padding-top-0 padding-left-60">
                                            <div class="content">안전한 대금 지급과 캠페인 진행을 위해서, 가능한 패스트엠 시스템을 이용하여 주시기
                                                바랍니다.<br>기본적으로 대금 지급은 광고주 승인이후에 진행 됩니다.
                                            </div>
                                        </div>

                                        <div class="p_add_span">
                                            <p class="title">1. 광고주 지급승인시</p>
                                            <div class="content">광고주가 지급승인시 대행사에게 익일 오후 2시까지, 캠페인 대금을 지급합니다.</div>


                                        </div>
                                    </div>
                                </div>


                                <div class="panel padding-top-20">


                                    @yield('right_content')


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="http://tectonic.kaijuthemes.com/assets/demo/demo-app-todo.js"></script>
@include('include.footer')