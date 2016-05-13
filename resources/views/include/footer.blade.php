<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">

            <!-- ABOUT -->
            <div class="col-md-6"><img src="{{ URL::asset('images/logo-footer.png') }}" alt="">
                <div class="about-foot">
                    <ul>
                        <li>
                            <p><i class="fa fa-phone"></i> (02) 1661-8863</p>
                        </li>
                        <li>
                            <p><i class="fa fa-envelope"></i> help@gmlab.kr</p>
                        </li>
                        <li>
                            <p>서울시 금천구 가산동 우리림라이온스밸리 C동 703호</p>
                        </li>
                        <li>
                            <p>사업자등록번호 : 129-86-85906 / 대표이사 : 김태훈</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2">
                <h6>착한마케팅</h6>
                <ul>
                    <li><p><a href="#.">서비스소개</a></p></li>
                    <li><p><a href="#.">광고주이용방법</a></p></li>
                    <li><p><a href="#.">파트너이용방법</a></p></li>
                    <li><p><a href="#.">이용요금</a></p></li>
                    <li><p><a href="#.">자주 묻는 질문</a></p></li>
                </ul>
            </div>

            <!-- Photostream -->
            <div class="col-md-2">
                <h6>관련정보</h6>
                <ul>
                    <li><p><a href="#.">회사소개</a></p></li>
                    <li><p><a href="#.">이용약관</a></p></li>
                    <li><p><a href="#.">언론보도</a></p></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-2">
                <h6>관련링크</h6>
                <ul>
                    <li><p><a href="#.">User Experience</a></p></li>
                    <li><p><a href="#.">html 5</a></p></li>
                    <li><p><a href="#.">Css 3</a></p></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- RIGHTS -->
<div class="rights">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p> © All Rights Reserved <span class="primary-color">Crowd m </span></p>
            </div>
            <div class="col-md-6 text-right"><a href="#.">Privacy Policy</a> <a href="#.">Terms & Conditions</a></div>
        </div>
    </div>
</div>
</div>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/own-menu.js"></script>
<script src="/js/jquery.isotope.min.js"></script>
<script src="/js/jquery.flexslider-min.js"></script>
<script src="/js/jquery.countTo.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.cubeportfolio.min.js"></script>
<script src="/js/jquery.colio.min.js"></script>
<script src="/js/main.js"></script>

<script src="/js/jquery.timelinr-0.9.54.js"></script>
<script type="text/javascript">
    $(function () {
        $().timelinr({
            orientation: 'horizontal',
            // value: horizontal | vertical, default to horizontal
            containerDiv: '#timeline',
            // value: any HTML tag or #id, default to #timeline
            datesDiv: '#dates',
            // value: any HTML tag or #id, default to #dates
            datesSelectedClass: 'selected',
            // value: any class, default to selected
            datesSpeed: 'normal',
            // value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to normal
            issuesDiv: '#issues',
            // value: any HTML tag or #id, default to #issues
            issuesSelectedClass: 'selected',
            // value: any class, default to selected
            issuesSpeed: 'fast',
            // value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to fast
            issuesTransparency: 0.2,
            // value: integer between 0 and 1 (recommended), default to 0.2
            issuesTransparencySpeed: 500,
            // value: integer between 100 and 1000 (recommended), default to 500 (normal)
            prevButton: '#prev',
            // value: any HTML tag or #id, default to #prev
            nextButton: '#next',
            // value: any HTML tag or #id, default to #next
            arrowKeys: 'false',
            // value: true/false, default to false
            startAt: 1,
            // value: integer, default to 1 (first)
            autoPlay: 'false',
            // value: true | false, default to false
            autoPlayDirection: 'forward',
            // value: forward | backward, default to forward
            autoPlayPause: 2000
            // value: integer (1000 = 1 seg), default to 2000 (2segs)< });
        });
    });
</script>

</body>
</html>