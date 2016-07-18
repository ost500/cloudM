<!-- Stories -->
<div class="col-md-9">

    <div class="job-content job-post-page margin-top-10">
        <div class="heading">

            <h5 class="side-tittle02">자주 묻는 질문</h5>

            <!-- Job  Content -->
            <div class="col-md-12">
                <!-- Job Content -->
                <div id="accordion">


                    <div class="row">


                        <h4 class="ser_s_title">광고주가 자주 묻는 질문</h4>

                        @foreach($clients as $faqs)
                            <!-- Job Section -->
                            <div class="job-content03 job-post-page margin-top-15">
                                <div class="panel-default">
                                    <!-- PANEL HEADING -->
                                    <div class="panel-heading"><a data-toggle="collapse" href="#job{{ $faqs->id }}">
                                            <div class="job-tittle">
                                                <div class="media-body">
                                                    <h5 class="faq_f">{!! $faqs->subject !!}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- ADD INFO HERE -->
                                    <div id="job{{  $faqs->id }}" class="panel-collapse collapse">
                                        <div class="panel-body02">
                                            {!! $faqs->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach




                        <div style="clear:both"></div>
                        <h4 class="ser_s_title margin-top-30">대행사가 자주 묻는 질문</h4>

                        @foreach($partners as $faqs)
                                <!-- Job Section -->
                        <div class="job-content03 job-post-page margin-top-15">
                            <div class="panel-default">
                                <!-- PANEL HEADING -->
                                <div class="panel-heading"><a data-toggle="collapse" href="#job{{ $faqs->id }}">
                                        <div class="job-tittle">
                                            <div class="media-body">
                                                <h5 class="faq_f">{!! $faqs->subject !!}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- ADD INFO HERE -->
                                <div id="job{{  $faqs->id }}" class="panel-collapse collapse">
                                    <div class="panel-body02">
                                        {!! $faqs->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
