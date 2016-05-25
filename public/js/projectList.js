/**
 * Created by OST on 2016-04-26.
 */

var checked = 0;
var page = 1;
var pagemultiply = 1;
var sort = 3;
var countofprojects = 0;
var maxpage = 0;
var maxpageBlock = 0;
var currentpageBlock = Number(1);
var currentpageStartnum = Number(1);
var currentpageEndnum = Number(1);
var literal_search = "";

// 뷰 가져오기-------------------------------------------
function viewLoad() {
    var display_results = $("#check");
    display_results.html("<img src=images/ajax-loader.gif>");

    $.ajax({
        url: "p_search/" + checked + "/" + page + "/" + sort + "/" + literal_search,

        success: function (result) {
            
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
        url: "p_search/pagination/" + currentpageStartnum + "/" + currentpageEndnum,
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
    if (checked == 0) {
        viewLoad();
    }
    pageLoad();
});

// 검색-------------------------------------------
$("#literal_button").click(function () {
    var search_text = $("#literal_text").val();
    literal_search = search_text;
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


// 카테고리 체크박스 -----------------------------------
$('#dev-1').change(function () {
    page = 1;
    if ($('#dev-1').is(':checked')) {
        $('#dev-11').prop("checked", true);
        checked = checked | 1;
        $('#dev-12').prop("checked", true);
        checked = checked | 2;
        $('#dev-13').prop("checked", true);
        checked = checked | 4;
        $('#dev-14').prop("checked", true);
        checked = checked | 8;
    }
    else {
        $('#dev-11').attr("checked", false);
        $('#dev-12').attr("checked", false);
        $('#dev-13').attr("checked", false);
        $('#dev-14').attr("checked", false);
        checked = checked & (2047 - 1);
        checked = checked & (2047 - 2);
        checked = checked & (2047 - 4);
        checked = checked & (2047 - 8);

    }

    viewLoad();
});

$('#dev-11').change(function () {
    page = 1;
    if ($('#dev-11').is(':checked')) {
        checked = checked | 1;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 1);
        $('#dev-1').attr("checked", false);
        viewLoad();
    }
});
$('#dev-12').change(function () {
    page = 1;
    if ($('#dev-12').is(':checked')) {
        checked = checked | 2;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 2);
        $('#dev-1').attr("checked", false);
        viewLoad();
    }
});
$('#dev-13').change(function () {
    page = 1;
    if ($('#dev-13').is(':checked')) {
        checked = checked | 4;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 4);
        $('#dev-1').attr("checked", false);
        viewLoad();
    }
});
$('#dev-14').change(function () {
    page = 1;
    if ($('#dev-14').is(':checked')) {
        checked = checked | 8;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 8);
        $('#dev-1').attr("checked", false);
        viewLoad();
    }
});
// 분야
$('#dev-2').change(function () {
    page = 1;
    if ($('#dev-2').is(':checked')) {
        $('#dev-21').prop("checked", true);
        checked = checked | 16;
        $('#dev-22').prop("checked", true);
        checked = checked | 32;
        $('#dev-23').prop("checked", true);
        checked = checked | 64;
        $('#dev-24').prop("checked", true);
        checked = checked | 128;
        $('#dev-25').prop("checked", true);
        checked = checked | 256;
        $('#dev-26').prop("checked", true);
        checked = checked | 512;
    }
    else {
        $('#dev-21').attr("checked", false);
        $('#dev-22').attr("checked", false);
        $('#dev-23').attr("checked", false);
        $('#dev-24').attr("checked", false);
        $('#dev-25').attr("checked", false);
        $('#dev-26').attr("checked", false);
        checked = checked & (2047 - 16);
        checked = checked & (2047 - 32);
        checked = checked & (2047 - 64);
        checked = checked & (2047 - 128);
        checked = checked & (2047 - 256);
        checked = checked & (2047 - 512);

    }

    viewLoad();
});

$('#dev-21').change(function () {
    page = 1;
    if ($('#dev-21').is(':checked')) {
        checked = checked | 16;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 16);
        $('#dev-2').attr("checked", false);
        viewLoad();
    }
});
$('#dev-22').change(function () {
    page = 1;
    if ($('#dev-22').is(':checked')) {
        checked = checked | 32;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 32);
        $('#dev-2').attr("checked", false);
        viewLoad();
    }
});
$('#dev-23').change(function () {
    page = 1;
    if ($('#dev-23').is(':checked')) {
        checked = checked | 64;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 64);
        $('#dev-2').attr("checked", false);
        viewLoad();
    }
});
$('#dev-24').change(function () {
    page = 1;
    if ($('#dev-24').is(':checked')) {
        checked = checked | 128;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 128);
        $('#dev-2').attr("checked", false);
        viewLoad();
    }
});
$('#dev-25').change(function () {
    page = 1;
    if ($('#dev-25').is(':checked')) {
        checked = checked | 256;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 256);
        $('#dev-2').attr("checked", false);
        viewLoad();
    }
});
$('#dev-26').change(function () {
    page = 1;
    if ($('#dev-26').is(':checked')) {
        checked = checked | 512;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 512);
        $('#dev-2').attr("checked", false);
        viewLoad();
    }
});

//----------------SORT----------------
$('#latestcreate').click(function () {
    page = 1;
    sort = 3;
    viewLoad();
});