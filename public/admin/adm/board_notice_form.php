<?php
$sub_menu = '300200';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '공지사항';

if ($w == "u")
{
    $html_title .= ' 수정';
    $readonly = ' readonly';

    $sql = " select * from {$g5['notice_table']} ";
    $row = sql_fetch($sql);
    if (!$row['id']) alert('등록된 자료가 없습니다.');
}
else
{
    $html_title .= ' 입력';
}

$g5['title'] = $html_title.' 관리';


include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<form name="fnoticeform" action="./board_notice_form_update.php" onsubmit="return board_notice_form_check(this);" method="post" enctype="MULTIPART/FORM-DATA">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="token" value="">
<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row"><label for="fm_subject">제목</label></th>
        <td>
            <input type="text" name="notification" value="<?php echo get_text($row['notification']); ?>" class="frm_input" style="width: 90%">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="fm_subject">작성일</label></th>
        <td>
            <?=$row['created_at']?>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="fm_subject">내용</label></th>
        <td>
            <textarea name="content" rows="10" cols="10" required="required"><?=$row['content']?></textarea>
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./board_notice.php">목록</a>
</div>
</form>
<script>
    function board_notice_form_check(f) {

    }
</script>
<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
