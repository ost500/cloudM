@extends('include.admin')
@section('customer_centre')

    <div class="col-md-9 job-right">
        <!-- Job Content -->
        <div id="accordion">
            <div class="coupen padding-top-30 padding-bottom-30 margin-bottom-10">
                <span style="color:black" class="h3 text-bold">일대일 문의</span>
                <p class="padding-top-5">패스트엠 관리자 문의를 남기세요.</p>
            </div>

            <!-- Job Section -->
            <div class="job-content02 job-post-page ">
                <!-- Job Tittle -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <!-- Save -->

                        <!-- PANEL HEADING -->
                        <div class="panel-heading">
                            <div id="map" style="width:100%;height:250px; margin-bottom: 50px"></div>

                            <div class="job-tittle03 margin-top-20 margin-bottom-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>
                                            고객센터 위치</h4>
                                        <h4>주소 서울시 금천구 가산동 우림라이온스밸리 C동 703호</h4>
                                        <h4>Tel 1544-2329</h4>
                                        <h4>Email help@fastm.io</h4>
                                        <h4>Fax 0505-300-8863</h4>
                                        @if($try == "success")
                                            <h4>문의를 등록했습니다.
                                                24시간 내에 답변을 드리겠습니다.</h4>
                                        @endif


                                    </div>
                                    <div class="col-md-6">

                                        <form class="form-horizontal" role="form" method="post" action="{{ url('/customer_centre/man_to_man') }}">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="email" value="">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3">제목 </label>
                                                <div class="col-sm-10">
                                                    <input autofocus class="form-control" name="title" placeholder=""
                                                           required="required">

                                                </div>
                                            </div>

                                            <div class="form-group padding-top-15">
                                                <label class="col-sm-2 control-label" for="inputEmail3"> 내용 </label>
                                                <div class="col-sm-10">
                                            <textarea rows="10" class="form-control" name="content_query"
                                                      placeholder="" required="required"></textarea>
                                                    </label>

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="inputEmail3"></label>
                                                <div class="col-sm-10">

                                                    <button class="btn btn-app" type="submit">
                                                        문의하기
                                                    </button>

                                                </div>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script>
        function initialize() {

            var myLatLng = {lat: 37.4798262, lng: 126.8799983};

            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                scrollwheel: false,
                zoom: 14
            });

            // Create a marker and set its position.
            var marker = new google.maps.Marker({
                map: map,
                position: myLatLng,
                title: 'FastM'
            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endsection