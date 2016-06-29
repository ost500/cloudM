/**
 * Created by OST on 2016-04-26.
 */

var checked = 0;
var checked_area = 67108863;
var checked_category = 0;
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
        url: "project/" + checked_area + "/" + page + "/" + sort + "/" + literal_search,

        success: function (result) {
            console.log("project/" + checked_area + "/" + page + "/" + sort + "/" + literal_search);

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
        var max_binary = 67108863;
        checked_area = max_binary;


        // -1 means unchecked

        if (jQuery.inArray("area_1_1", r) == -1) {
            checked_area = checked_area & (max_binary - 33554432);
        }

        console.log("binary1_1 " + jQuery.inArray("area_1_1", r) + " " + checked_area);

        if (jQuery.inArray("area_1_2", r) == -1) {
            checked_area = checked_area & (max_binary - 16777216);
        }

        console.log("binary1_2 "+jQuery.inArray("area_1_2", r)+" " + checked_area);


        if (jQuery.inArray("area_1_3", r) == -1){
            checked_area = checked_area & (max_binary - 8388608);
        }
        console.log("binary1_2 "+jQuery.inArray("area_1_3", r)+" " + checked_area);
        if (jQuery.inArray("area_1_4", r) == -1){
            checked_area = checked_area & (max_binary - 4194304);
        }
        if (jQuery.inArray("area_1_5", r) == -1){
            checked_area = checked_area & (max_binary - 2097152);
        }
        if (jQuery.inArray("area_2_1", r) == -1){
            checked_area = checked_area & (max_binary - 1048576);
        }if (jQuery.inArray("area_2_2", r) == -1){
            checked_area = checked_area & (max_binary - 524288);
        }if (jQuery.inArray("area_2_3", r) == -1){
            checked_area = checked_area & (max_binary - 262144);
        }if (jQuery.inArray("area_2_5", r) == -1){
            checked_area = checked_area & (max_binary - 131072);
        }if (jQuery.inArray("area_3_1", r) == -1){
            checked_area = checked_area & (max_binary - 65536);
        }if (jQuery.inArray("area_3_2", r) == -1){
            checked_area = checked_area & (max_binary - 32768);
        }if (jQuery.inArray("area_3_3", r) == -1){
            checked_area = checked_area & (max_binary - 16384);
        }if (jQuery.inArray("area_3_4", r) == -1){
            checked_area = checked_area & (max_binary - 8192);
        }if (jQuery.inArray("area_3_5", r) == -1){
            checked_area = checked_area & (max_binary - 4096);
        }if (jQuery.inArray("area_4_1", r) == -1){
            checked_area = checked_area & (max_binary - 2048);
        }if (jQuery.inArray("area_4_2", r) == -1){
            checked_area = checked_area & (max_binary - 1024);
        }if (jQuery.inArray("area_4_3", r) == -1){
            checked_area = checked_area & (max_binary - 512);
        }if (jQuery.inArray("area_4_4", r) == -1){
            checked_area = checked_area & (max_binary - 256);
        }if (jQuery.inArray("area_4_5", r) == -1){
            checked_area = checked_area & (max_binary - 128);
        }

        // -1 means unchecked
        if (jQuery.inArray("category_1", r) == -1){
            checked_area = checked_area & (max_binary - 64);
        }if (jQuery.inArray("category_2", r) == -1){
            checked_area = checked_area & (max_binary - 32);
        }if (jQuery.inArray("category_3", r) == -1){
            checked_area = checked_area & (max_binary - 16);
        }if (jQuery.inArray("category_4", r) == -1){
            checked_area = checked_area & (max_binary - 8);
        }if (jQuery.inArray("category_5", r) == -1){
            checked_area = checked_area & (max_binary - 4);
        }
        if (jQuery.inArray("category_6", r) == -1) {
            checked_area = checked_area & (max_binary - 2);
        }
        if (jQuery.inArray("category_7", r) == -1) {
            checked_area = checked_area & (max_binary - 1);
        }
        console.log("result " + checked_area);
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