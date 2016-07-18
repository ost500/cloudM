<?php
$sub_menu = '300700';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = 'FAQ';

if ($w == "u")
{
    $html_title .= ' 수정';
    $readonly = ' readonly';

    $sql = " select * from {$g5['faq_master_table']} where id = '$id' ";
    $fm = sql_fetch($sql);
    if (!$fm['id']) alert('등록된 자료가 없습니다.');
}
else
{
    $html_title .= ' 입력';
}

$g5['title'] = $html_title.' 관리';


include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<form name="frmfaqmasterform" action="./faqmasterformupdate.php" onsubmit="return frmfaqmasterform_check(this);" method="post" enctype="MULTIPART/FORM-DATA">
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
        <th scope="row"><label for="fm_order">출력순서</label></th>
        <td>
            <?php echo help('숫자가 작을수록 FAQ 분류에서 먼저 출력됩니다.'); ?>
            <input type="text" name="order_by" value="<?=(!$fm['order_by'])?"0":$fm['order_by']?>" id="fm_order" class="frm_input" maxlength="10" size="10">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="fm_subject">제목</label></th>
        <td>
            <input type="text" value="<?php echo get_text($fm['subject']); ?>" name="subject" id="subject" required class="frm_input required"  size="70">
            <?php if ($w == 'u') { ?>
            <a href="<?php echo G5_BBS_URL; ?>/faq.php?fm_id=<?php echo $fm_id; ?>" class="btn_frmline">보기</a>
            <a href="./faqlist.php?fm_id=<?php echo $fm_id; ?>" class="btn_frmline">상세보기</a>
            <?php } ?>
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./faqmasterlist.php">목록</a>
</div>

</form>

<script>

// document.frmfaqmasterform.fm_subject.focus();
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
