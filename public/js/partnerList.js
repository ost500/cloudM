/**
 * Created by OST on 2016-04-29.
 */

var option = 0;
var option2 = 0;
var page = 1;
var countofprojects = 0;
var maxpage = 0;
var maxpageBlock = 0;
var currentpageBlock = Number(1);
var currentpageStartnum = Number(1);
var currentpageEndnum = Number(1);
var keyword = "";

// 뷰 가져오기-------------------------------------------
function viewLoad() {
    var display_results = $("#list");
    display_results.html("<img src=images/ajax-loader.gif>");

    $.ajax({
        url: "partner" + "/" + page + "/" + option + "/" + option2 + "/" + keyword,
        success: function (result) {
            console.log("partner" + "/" + page + "/" + option + "/" + option2 + "/" + keyword);
            display_results.html(result);
            countofprojects = parseInt($('#count').text());
            currentpageBlock = Math.ceil(page / 5);
            pageLoad();
        }
    });
}

// 페이지 가져오기-------------------------------------------
function pageLoad() {
    maxpage = parseInt(countofprojects / 10);
    maxpageBlock = parseInt(maxpage / 5);
    if (countofprojects % 10) {
        maxpage += 1;
    }
    if (maxpage % 5) {
        maxpageBlock += 1;
    }
    // maxpage, maxpageBlock 계산
    currentpageStartnum = (5 * (currentpageBlock - 1)) + 1;
    currentpageEndnum = (currentpageStartnum + 4);
    if (currentpageEndnum > maxpage) {
        currentpageEndnum = maxpage;
    }
    // startpage 계산
    var page_results = $("#pagination");
    $.ajax({
        url: "project/pagination/" + currentpageStartnum + "/" + currentpageEndnum,
        success: function (result) {
            page_results.html(result);
        },
        complete: function () {
            $("#id1").click(function () {
                page = ((currentpageBlock - 1) * 5) + 1;
                viewLoad();
            });
            $("#id2").click(function () {
                page = ((currentpageBlock - 1) * 5) + 2;
                viewLoad();
            });
            $("#id3").click(function () {
                page = ((currentpageBlock - 1) * 5) + 3;
                viewLoad();
            });
            $("#id4").click(function () {
                page = ((currentpageBlock - 1) * 5) + 4;
                viewLoad();
            });
            $("#id5").click(function () {
                page = ((currentpageBlock - 1) * 5) + 5;
                viewLoad();
            });

            for (var i = 1; i <= 5; i++) {
                if ($("#id" + i).hasClass("current")) {
                    $("#id" + i).removeClass("current")
                }
            }

            $("#id" + (page - ((currentpageBlock - 1) * 5))).addClass("current");

        }
    });
}

// 첫 화면-------------------------------------------
$(function () {

    viewLoad();

});


// 검색-------------------------------------------
$("#literal_search_button").click(function () {
    var search_text = $("#literal_search_text").val();
    console.log(search_text);
    keyword = search_text;
    page = 1;
    option = 0;
    viewLoad();

});

// 분야 검색-------------------------------------------
$("#job_option").change(function () {
    console.log($("#job_option").val());
    if ($("#job_option").val() == "all") {
        console.log("all checked");
        option = 0;
    }
    if ($("#job_option").val() == "네이버CPC") {

        option = 1;
        console.log(option);
    }
    if ($("#job_option").val() == "언론보도") {
        console.log("4 checked");
        option = 2;
    }
    if ($("#job_option").val() == "구글광고") {
        console.log("2 checked");
        option = 3;
    }
    if ($("#job_option").val() == "페이스북광고") {
        console.log("3 checked");
        option = 4;
    }if ($("#job_option").val() == "매체 기타") {
        console.log("3 checked");
        option = 5;
    }
    if ($("#job_option").val() == "네이버SEO") {
        console.log("4 checked");
        option = 6;
    }if ($("#job_option").val() == "컨텐츠 배포") {
        console.log("4 checked");
        option = 7;
    }if ($("#job_option").val() == "체험단 모집") {
        console.log("4 checked");
        option = 8;
    }if ($("#job_option").val() == "바이럴 기타") {
        console.log("4 checked");
        option = 9;
    }if ($("#job_option").val() == "블로그") {
        console.log("4 checked");
        option = 10;
    }if ($("#job_option").val() == "페이스북페이지") {
        console.log("4 checked");
        option = 11;
    }if ($("#job_option").val() == "기타SNS") {
        console.log("4 checked");
        option = 12;
    }if ($("#job_option").val() == "홈페이지") {
        console.log("4 checked");
        option = 13;
    }if ($("#job_option").val() == "운영대행 기타") {
        console.log("4 checked");
        option = 14;
    }if ($("#job_option").val() == "개발") {
        console.log("4 checked");
        option = 15;
    }if ($("#job_option").val() == "디자인") {
        console.log("4 checked");
        option = 16;
    }if ($("#job_option").val() == "웹툰") {
        console.log("4 checked");
        option = 17;
    }if ($("#job_option").val() == "영상") {
        console.log("4 checked");
        option = 18;
    }if ($("#job_option").val() == "1회성 프로젝트 기타") {
        console.log("4 checked");
        option = 19;
    }if ($("#job_option").val() == "TV광고") {
        console.log("4 checked");
        option = 20;
    }if ($("#job_option").val() == "신문광고") {
        console.log("4 checked");
        option = 21;
    }if ($("#job_option").val() == "라디오광고") {
        console.log("4 checked");
        option = 22;
    }if ($("#job_option").val() == "지하철광고") {
        console.log("4 checked");
        option = 23;
    }if ($("#job_option").val() == "버스광고") {
        console.log("4 checked");
        option = 24;
    }if ($("#job_option").val() == "잡지광고") {
        console.log("4 checked");
        option = 25;
    }if ($("#job_option").val() == "외부광고") {
        console.log("4 checked");
        option = 26;
    }if ($("#job_option").val() == "오프라인 기타") {
        console.log("4 checked");
        option = 27;
    }

    page = 1;
    keyword = $("#literal_search_text").val();

    viewLoad();
});
$("#job_option2").change(function () {
    if ($("#job_option2").val() == "all") {
        console.log("all checked");
        option2 = 0;
    }
    if ($("#job_option2").val() == "의료") {
        console.log("5 checked");
        option2 = 5;
    }
    if ($("#job_option2").val() == "법률") {
        console.log("6 checked");
        option2 = 6;
    }
    if ($("#job_option2").val() == "스타트업") {
        console.log("7 checked");
        option2 = 7;
    }
    if ($("#job_option2").val() == "프랜차이즈") {
        console.log("8 checked");
        option2 = 8;
    }
    if ($("#job_option2").val() == "대학교") {
        console.log("9 checked");
        option2 = 9;
    }
    if ($("#job_option2").val() == "쇼핑몰") {
        console.log("10 checked");
        option2 = 10;
    }
    page = 1;
    keyword = $("#literal_search_text").val();

    viewLoad();
});


// 페이지 이전-------------------------------------------
$("#nextPblock").click(function () {
    var nextpageCheck = ((Math.ceil(page / 5)) * 5) + 1;
    // maxpage = parseInt(countofprojects / 10);
    if (maxpage >= nextpageCheck) {
        page = nextpageCheck;
        viewLoad();
    }

});
// 페이지 이후-------------------------------------------
$("#prevPblock").click(function () {
    var prevpageCheck = (5 * (Math.ceil(page / 5) - 1));
    if (0 < prevpageCheck) {
        page = prevpageCheck;
        viewLoad();
    }
});
