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

// 뷰 가져오기-------------------------------------------
function viewLoad() {
    var display_results = $("#check");
    display_results.html("<img src=images/ajax-loader.gif>");

    $.ajax({
        url: "p_search/" + checked + "/" + page + "/" + sort,
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
            $("#id2").click(function () {
                page = ((currentpageBlock - 1) * 5) + 2;
                viewLoad();
            });
            $("#id1").click(function () {
                page = ((currentpageBlock - 1) * 5) + 1;
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



$('#dev-11').change(function () {
    page = 1
    if ($('#dev-11').is(':checked')) {
        checked = checked | 1;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 1);
        viewLoad();
    }
});
$('#dev-12').change(function () {
    page = 1
    if ($('#dev-12').is(':checked')) {
        checked = checked | 2;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 2);
        viewLoad();
    }
});
$('#dev-13').change(function () {
    page = 1
    if ($('#dev-13').is(':checked')) {
        checked = checked | 4;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 4);
        viewLoad();
    }
});
$('#dev-14').change(function () {
    page = 1
    if ($('#dev-14').is(':checked')) {
        checked = checked | 8;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 8);
        viewLoad();
    }
});
$('#dev-21').change(function () {
    page = 1
    if ($('#dev-21').is(':checked')) {
        checked = checked | 16;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 16);
        viewLoad();
    }
});
$('#dev-22').change(function () {
    page = 1
    if ($('#dev-22').is(':checked')) {
        checked = checked | 32;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 32);
        viewLoad();
    }
});
$('#dev-23').change(function () {
    page = 1
    if ($('#dev-23').is(':checked')) {
        checked = checked | 64;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 64);
        viewLoad();
    }
});
$('#dev-24').change(function () {
    page = 1
    if ($('#dev-24').is(':checked')) {
        checked = checked | 128;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 128);
        viewLoad();
    }
});
$('#dev-25').change(function () {
    page = 1
    if ($('#dev-25').is(':checked')) {
        checked = checked | 256;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 256);
        viewLoad();
    }
});
$('#dev-26').change(function () {
    page = 1
    if ($('#dev-26').is(':checked')) {
        checked = checked | 512;
        viewLoad();
    }
    else {
        checked = checked & (2047 - 512);
        viewLoad();
    }
});

//----------------SORT----------------
$('#latestcreate').click(function () {
    page = 1;
    sort = 3;
    viewLoad();
});