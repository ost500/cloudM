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

$sql_common = " subject = '$subject',
                content = '$content',
                order_by = '$order_by',
                 updated_at = now()";

if ($w == "")
{
    $sql = " insert {$g5['faq_table']}
                set f_id ='$f_id',
                    created_at = now(),
                    $sql_common ";
    sql_query($sql);
    $id = sql_insert_id();
}
else if ($w == "u")
{
    $sql = " update {$g5['faq_table']}
                set $sql_common
              where id = '$id' ";
    sql_query($sql);
}
else if ($w == "d")
{
	$sql = " delete from {$g5['faq_table']} where id = '$id' ";
    sql_query($sql);
}

if ($w == 'd')
    goto_url("./faqlist.php?f_id=$f_id");
else
    goto_url("./faqform.php?w=u&amp;f_id=$f_id&amp;id=$id");
?>
