<!-- FOOTER -->
<footer>
    <div class="container">

        <div class="col-md-2">
            <img src="/images/logo-footer.png" alt="" class="margin-bottom-20">
        </div>
        <div class="col-md-10">
            <ul class="footer_menu">
                <li><a href="{{route('introduction')}}">회사소개</a></li>
                <li><a href="{{url("/services/1")}}">서비스소개</a></li>
                <li><a href="{{url("/services/4")}}">이용요금</a></li>
                <li><a href="{{url("/services/5")}}">자주묻는질문</a></li>
                <li><a href="{{route('agreement')}}">이용약관</a></li>
                <li><a href="{{route('personal_info')}}">개인정보 취급방침</a></li>
                <li class="bg_round"><a href="{{url("/services/2")}}">광고주 이용방법</a></li>
                <li class="bg_round"><a href="{{url("/services/3")}}">파트너 이용방법</a></li>
                <li class="bg_round"><a href="#">상단으로 이동 ▲</a></li>
            </ul>
            <div class="clear"></div>
            <p class="footer_add">
                주식회사 플랫포머 대표이사 김태훈 사업자등록번호 273-81-00290<br>
                서울시 금천구 가산동 우림라이온스밸리 C동 703호 고객센터 1544-2329 이메일 help@fastm.io
            </p>
        </div>


    </div>
</footer>

</div>


<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery-ui-i18n.js') }}">
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<?php $tomorrow = new DateTime('+1 day')?>
<script type="text/javascript">

    $.datepicker.setDefaults($.datepicker.regional['ko']);
    $('#deadline').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: +1,
        maxDate: +14,
    });

    $('#start_day').datepicker({
        dateFormat: "yy-mm-dd",
        minDate: +1,
        maxDate: +28,
    });

    $('#bod').datepicker({
        dateFormat: "yy-mm-dd",
    });


    $(function () {
        var localTime = new Date();
        var ptTime = new Date();
        ptTime.setMinutes(ptTime.getMinutes() + localTime.getTimezoneOffset() - 420);

    });
</script>


<script src="/js/bootstrap.min.js"></script>
<script src="/js/own-menu.js"></script>
<script src="/js/jquery.isotope.min.js"></script>
<script src="/js/jquery.flexslider-min.js"></script>
<script src="/js/jquery.countTo.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.cubeportfolio.min.js"></script>
<script src="/js/jquery.colio.min.js"></script>
<script src="/js/main.js"></script>

<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 878031499;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/878031499/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>



{{--<script src="/js/jquery.timelinr-0.9.54.js"></script>--}}
{{--<script type="text/javascript">--}}
{{--$(function () {--}}
{{--$().timelinr({--}}
{{--orientation: 'horizontal',--}}
{{--// value: horizontal | vertical, default to horizontal--}}
{{--containerDiv: '#timeline',--}}
{{--// value: any HTML tag or #id, default to #timeline--}}
{{--datesDiv: '#dates',--}}
{{--// value: any HTML tag or #id, default to #dates--}}
{{--datesSelectedClass: 'selected',--}}
{{--// value: any class, default to selected--}}
{{--datesSpeed: 'normal',--}}
{{--// value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to normal--}}
{{--issuesDiv: '#issues',--}}
{{--// value: any HTML tag or #id, default to #issues--}}
{{--issuesSelectedClass: 'selected',--}}
{{--// value: any class, default to selected--}}
{{--issuesSpeed: 'fast',--}}
{{--// value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to fast--}}
{{--issuesTransparency: 0.2,--}}
{{--// value: integer between 0 and 1 (recommended), default to 0.2--}}
{{--issuesTransparencySpeed: 500,--}}
{{--// value: integer between 100 and 1000 (recommended), default to 500 (normal)--}}
{{--prevButton: '#prev',--}}
{{--// value: any HTML tag or #id, default to #prev--}}
{{--nextButton: '#next',--}}
{{--// value: any HTML tag or #id, default to #next--}}
{{--arrowKeys: 'false',--}}
{{--// value: true/false, default to false--}}
{{--startAt: 1,--}}
{{--// value: integer, default to 1 (first)--}}
{{--autoPlay: 'false',--}}
{{--// value: true | false, default to false--}}
{{--autoPlayDirection: 'forward',--}}
{{--// value: forward | backward, default to forward--}}
{{--autoPlayPause: 2000--}}
{{--// value: integer (1000 = 1 seg), default to 2000 (2segs)< });--}}
{{--});--}}
{{--});--}}
{{--</script>--}}

</body>
</html>