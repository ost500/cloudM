/**
 * Created by OST on 2016-04-26.
 */

var checked = 0;
var page = 1;
var pagemultiply = 1;
var sort = 3;

function viewLoad() {
    var display_results = $("#check");
    display_results.html("loading...");

    $.ajax({
        
        url: "p_search/" + checked + "/" + page + "/" + sort,
        success: function (result) {
            display_results.html(result);
            

        }

    });
}
$(function () {
    if (checked == 0) {
        viewLoad();
    }
});

$('#dev-11').change(function () {
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

//----------------PAGE-------------------
$('#one').click(function () {
    page = ((pagemultiply - 1) * 5) + 1;
    viewLoad();
});
$('#two').click(function () {
    page = ((pagemultiply - 1) * 5) + 2;
    viewLoad();
});
$('#three').click(function () {
    page = ((pagemultiply - 1) * 5) + 3;
    viewLoad();
});
$('#four').click(function () {
    page = ((pagemultiply - 1) * 5) + 4;
    viewLoad();
});
$('#five').click(function () {
    page = ((pagemultiply - 1) * 5) + 5;
    viewLoad();
});
