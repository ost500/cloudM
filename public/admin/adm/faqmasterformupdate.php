<?php
$sub_menu = '300700';
include_once('./_common.php');

if ($w == "u" || $w == "d")
    check_demo();

if ($W == 'd')
    auth_check($auth[$sub_menu], "d");
else
    auth_check($auth[$sub_menu], "w");

check_admin_token();

$sql_common = " order_by    = '$order_by',
                subject = '$subject',
               updated_at = now()";

if ($w == "")
{
    $sql = " insert {$g5['faq_master_table']} set  created_at = now(), $sql_common ";
    sql_query($sql);
    $f_id = sql_insert_id();
}
else if ($w == "u")
{
    $sql = " update {$g5['faq_master_table']} set $sql_common where id = '$id' ";
    sql_query($sql);
}
else if ($w == "d")
{
    // FAQ삭제
	$sql = " delete from {$g5['faq_master_table']} where id = '$id' ";
    sql_query($sql);

    // FAQ상세삭제
	$sql = " delete from {$g5['faq_table']} where f_id = '$id' ";
    sql_query($sql);
}

if ($w == "" || $w == "u")
{
    goto_url("./faqmasterform.php?w=u&amp;id=$id");
}
else
    goto_url("./faqmasterlist.php");
?>
