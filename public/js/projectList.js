/**
 * Created by OST on 2016-04-26.
 */

var checked = 0;
var checked_area = 0;
var cate_checked_area = 0;
var page = 1;
// var pagemultiply = 1;
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
        url: "project/" + checked_area + "/" + cate_checked_area + "/" + page + "/" + sort + "/" + literal_search,

        success: function (result) {
            console.log("project/" + checked_area+ "/" + cate_checked_area + "/" + page + "/" + sort + "/" + literal_search);
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
    if (checked == 0) {
        viewLoad();
    }

});

// 검색-------------------------------------------
$("#literal_button").click(function () {
    var search_text = $("#literal_text").val();
    literal_search = search_text;
    page = 1;
    sort = 3;
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

$('#tree_2')
// listen for event
    .on('changed.jstree', function (e, data) {
        var i, j, r = [];
        for (i = 0, j = data.selected.length; i < j; i++) {
            r.push($('#tree_2').jstree(true).get_selected()[i]);
        }
        var max_binary = Number(134217727);
        var area_max_num_children = 27;
        checked_area = Number(134217727);

        var index_calculator = (max_binary / 2).toFixed(0);
        console.log("---------------------------------");
        // -1 means unchecked

        for (var i = 1; i <= area_max_num_children; i++) {
            if (jQuery.inArray("id_" + i, r) == -1) {
                console.log(checked_area + " & " + (max_binary - (index_calculator)));
                checked_area = checked_area & (max_binary - (index_calculator));
            }
            index_calculator = (index_calculator / 2).toFixed(0);
        }

        var cate_max_binary = Number(127);
        var cate_max_num_children = 7;
        cate_checked_area = cate_max_binary;
        var cate_index_calculator = (cate_max_binary / 2).toFixed(0);
        for (var i = 1; i <= cate_max_num_children; i++) {

            if (jQuery.inArray("id_" + (i + area_max_num_children), r) == -1) {
                console.log(cate_checked_area + " & " + (cate_max_binary - (cate_index_calculator)));
                cate_checked_area = cate_checked_area & (cate_max_binary - (cate_index_calculator));
            }
            cate_index_calculator = (cate_index_calculator / 2).toFixed(0);
        }


        // -1 means unchecked


        page = 1;
        viewLoad();
    });
// create the instance


//----------------SORT----------------
$('#moneyhigh').click(function () {
    page = 1;
    sort = 1;
    viewLoad();
});
$('#moneylow').click(function () {
    page = 1;
    sort = 2;
    viewLoad();
});
$('#latestcreate').click(function () {
    page = 1;
    sort = 3;
    viewLoad();
});
$('#deadline').click(function () {
    page = 1;
    sort = 4;
    viewLoad();
});