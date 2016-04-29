/**
 * Created by OST on 2016-04-29.
 */

var option = 0;
var page = 1;
var countofprojects = 0;
var maxpage = 0;
var maxpageBlock = 0;
var currentpageBlock = Number(1);
var currentpageStartnum = Number(1);
var currentpageEndnum = Number(1);

// 뷰 가져오기-------------------------------------------
function viewLoad() {
    var display_results = $("#list");
    display_results.html("<img src=images/ajax-loader.gif>");

    $.ajax({
        url: "partner" + "/" + page + "/" + option,
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
