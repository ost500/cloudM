<?php
$sub_menu = '300200';
include_once('./_common.php');

if ($w == "u" || $w == "d")
    check_demo();

if ($W == 'd')
    auth_check($auth[$sub_menu], "d");
else
    auth_check($auth[$sub_menu], "w");

check_admin_token();

$sql_common = " notification    = '$notification',
               content         = '$content',
               updated_at = now()";

if ($w == "")
{
    $sql = " insert {$g5['notice_table']} se created_at = now(), $sql_common ";
    sql_query($sql);
    $id = sql_insert_id();
}
else if ($w == "u")
{
    $sql = " update {$g5['notice_table']} set $sql_common where id = '$id' ";
    sql_query($sql);
}
else if ($w == "d")
{
    // 삭제
	$sql = " delete from {$g5['notice_table']} where id = '$id' ";
    sql_query($sql);
}

if ($w == "" || $w == "u")
{
    goto_url("./board_notice_form.php?w=u&amp;id=$id");
}
else
    goto_url("./board_notice.php");
?>
