<?php
$sub_menu = "300200";
include_once('./_common.php');

check_demo();

if (!count($_POST['chk'])) {
    alert($_POST['act_button']." 하실 항목을 하나 이상 체크하세요.");
}

auth_check($auth[$sub_menu], 'w');

if ($_POST['act_button'] == "선택수정") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];

        $sql = " update {$g5['notice_table']}
                    set
                        content = '{$_POST['content'][$k]}',
                        choice = '{$_POST['choice'][$k]}'
                    where id = '{$_POST['ids'][$k]}' and p_id = '{$_POST['p_ids'][$k]}'";
        sql_query($sql);
    }

} else if ($_POST['act_button'] == "선택삭제") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];

        $sql = " delete from {$g5['notice_table']} where id = '{$_POST['id'][$k]}'";
        sql_query($sql);
    }
}

if ($msg)
    //echo '<script> alert("'.$msg.'"); </script>';
    alert($msg);

goto_url('./board_notice.php?id='.$id.'&'.$qstr);
?>
