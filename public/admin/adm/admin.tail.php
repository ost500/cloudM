<?php
if (!defined('_GNUBOARD_')) exit;
?>

        <noscript>
            <p>
                귀하께서 사용하시는 브라우저는 현재 <strong>자바스크립트를 사용하지 않음</strong>으로 설정되어 있습니다.<br>
                <strong>자바스크립트를 사용하지 않음</strong>으로 설정하신 경우는 수정이나 삭제시 별도의 경고창이 나오지 않으므로 이점 주의하시기 바랍니다.
            </p>
        </noscript>

    </div>
</div>

<footer id="ft">
    <p>
        Copyright &copy; <?php echo $_SERVER['HTTP_HOST']; ?>. All rights reserved.<br>
        <a href="#">상단으로</a>
    </p>
</footer>


<div class="bts">
    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">제안서 업로드</h4>
                </div>
                <form role="form" method="POST" action="proposals_file_update.php" enctype="multipart/form-data">
                <div class="modal-body" style="padding:30px 100px 50px 100px;">
                        <input type="hidden" name="f_id" value="">
                        <input type="hidden" name="p_id" value="">
                        <input type="hidden" name="u_id" value="">

                        <div class="form-group">
                            삭제 : <input type="checkbox" name="file_name_del[]" style="margin: 0;"> (재업로드시 체크를 안해도 기존 파일은 삭제 됩니다.)
                        </div>

                        <div class="form-group">
                            <input type="file" name="bf_file[]"  style="width:100%;">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue btn-block">
                                업로드
                            </button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="companyFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">회사소개서 업로드</h4>
                </div>
                <form role="form" method="POST" action="partner_file_update.php" enctype="multipart/form-data">
                <div class="modal-body" style="padding:30px 100px 50px 100px;">
                        <input type="hidden" name="u_id" value="">
                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="page" value="<?=$page?>">

                        <div class="form-group">
                            삭제 : <input type="checkbox" name="file_name_del[]" style="margin: 0;"> (재업로드시 체크를 안해도 기존 파일은 삭제 됩니다.)
                        </div>

                        <div class="form-group">
                            <input type="file" name="bf_file[]"  style="width:100%;">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue btn-block">
                                업로드
                            </button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="proposalFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">상품소개서 업로드</h4>
                </div>
                <form role="form" method="POST" action="partner_file_update.php" enctype="multipart/form-data">
                <div class="modal-body" style="padding:30px 100px 50px 100px;">
                        <input type="hidden" name="u_id" value="">
                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="page" value="<?=$page?>">

                        <div class="form-group">
                            삭제 : <input type="checkbox" name="file_name_del[]" style="margin: 0;"> (재업로드시 체크를 안해도 기존 파일은 삭제 됩니다.)
                        </div>

                        <div class="form-group">
                            <input type="file" name="bf_file[]"  style="width:100%;">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue btn-block">
                                업로드
                            </button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="profileFileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">프로필사진 업로드</h4>
                </div>
                <form role="form" method="POST" action="user_file_update.php" enctype="multipart/form-data">
                <div class="modal-body" style="padding:30px 100px 50px 100px;">
                        <input type="hidden" name="u_id" value="">
                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="page" value="<?=$page?>">

                        <div class="form-group">
                            삭제 : <input type="checkbox" name="file_name_del[]" style="margin: 0;"> (재업로드시 체크를 안해도 기존 파일은 삭제 됩니다.)
                        </div>

                        <div class="form-group">
                            <input type="file" name="bf_file[]"  style="width:100%;">
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-blue btn-block">
                                업로드
                            </button>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <!--
    $('#fileModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var fid = button.data('fid')
        var pid = button.data('pid')
        var uid = button.data('uid')


        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find(".modal-body input[name$='f_id']").val(fid)
        modal.find(".modal-body input[name$='p_id']").val(pid)
        modal.find(".modal-body input[name$='u_id']").val(uid)
    });

    $('#companyFileModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var type = button.data('type')
        var uid = button.data('uid')


        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find(".modal-body input[name$='type']").val(type)
        modal.find(".modal-body input[name$='u_id']").val(uid)
    });

    $('#proposalFileModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var type = button.data('type')
        var uid = button.data('uid')


        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find(".modal-body input[name$='type']").val(type)
        modal.find(".modal-body input[name$='u_id']").val(uid)
    });

    $('#profileFileModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var type = button.data('type')
        var uid = button.data('uid')


        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find(".modal-body input[name$='type']").val(type)
        modal.find(".modal-body input[name$='u_id']").val(uid)
    });
    //-->
</script>


<!-- <p>실행시간 : <?php echo get_microtime() - $begin_time; ?> -->

<script src="<?php echo G5_ADMIN_URL ?>/admin.js"></script>
<script>
$(function(){
    var hide_menu = false;
    var mouse_event = false;
    var oldX = oldY = 0;

    $(document).mousemove(function(e) {
        if(oldX == 0) {
            oldX = e.pageX;
            oldY = e.pageY;
        }

        if(oldX != e.pageX || oldY != e.pageY) {
            mouse_event = true;
        }
    });

    // 주메뉴
    var $gnb = $(".gnb_1dli > a");
    $gnb.mouseover(function() {
        if(mouse_event) {
            $(".gnb_1dli").removeClass("gnb_1dli_over gnb_1dli_over2 gnb_1dli_on");
            $(this).parent().addClass("gnb_1dli_over gnb_1dli_on");
            menu_rearrange($(this).parent());
            hide_menu = false;
        }
    });

    $gnb.mouseout(function() {
        hide_menu = true;
    });

    $(".gnb_2dli").mouseover(function() {
        hide_menu = false;
    });

    $(".gnb_2dli").mouseout(function() {
        hide_menu = true;
    });

    $gnb.focusin(function() {
        $(".gnb_1dli").removeClass("gnb_1dli_over gnb_1dli_over2 gnb_1dli_on");
        $(this).parent().addClass("gnb_1dli_over gnb_1dli_on");
        menu_rearrange($(this).parent());
        hide_menu = false;
    });

    $gnb.focusout(function() {
        hide_menu = true;
    });

    $(".gnb_2da").focusin(function() {
        $(".gnb_1dli").removeClass("gnb_1dli_over gnb_1dli_over2 gnb_1dli_on");
        var $gnb_li = $(this).closest(".gnb_1dli").addClass("gnb_1dli_over gnb_1dli_on");
        menu_rearrange($(this).closest(".gnb_1dli"));
        hide_menu = false;
    });

    $(".gnb_2da").focusout(function() {
        hide_menu = true;
    });

    $('#gnb_1dul>li').bind('mouseleave',function(){
        submenu_hide();
    });

    $(document).bind('click focusin',function(){
        if(hide_menu) {
            submenu_hide();
        }
    });

    // 폰트 리사이즈 쿠키있으면 실행
    var font_resize_act = get_cookie("ck_font_resize_act");
    if(font_resize_act != "") {
        font_resize("container", font_resize_act);
    }
});

function submenu_hide() {
    $(".gnb_1dli").removeClass("gnb_1dli_over gnb_1dli_over2 gnb_1dli_on");
}

function menu_rearrange(el)
{
    var width = $("#gnb_1dul").width();
    var left = w1 = w2 = 0;
    var idx = $(".gnb_1dli").index(el);

    for(i=0; i<=idx; i++) {
        w1 = $(".gnb_1dli:eq("+i+")").outerWidth();
        w2 = $(".gnb_2dli > a:eq("+i+")").outerWidth(true);

        if((left + w2) > width) {
            el.removeClass("gnb_1dli_over").addClass("gnb_1dli_over2");
        }

        left += w1;
    }
}

</script>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>