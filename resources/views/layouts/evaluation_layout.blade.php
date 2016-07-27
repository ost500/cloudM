@include('include.head')
<div id="content">
    <section class="job padding-top-15 padding-bottom-70">
        <div class="container">
            <div class="coupen">
                <p class="h3 text-bold"><span>{{ $project['title'] }}</span> 캠페인의 평가</p>
                <p class="padding-top-10">광고캠페인을 함께 진행한 대행사에 대한 평가를 남겨주세요.</p>
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
                                            <div class="content">평가는 수정이 불가능합니다.
                                            </div>
                                        </div>

                                        <div class="p_add_span">
                                            <p class="title">각 항목평가는 별1개에서 5개까지 가능합니다. 수정이 불가하오니 신중히 남겨주십시오. 평가는 다른 광고주들이 대행사를 선택하는데 큰 도움이 됩니다.</p>



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