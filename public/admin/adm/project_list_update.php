<?php
$sub_menu = "400100";
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

		$sql = " update {$g5['project_table']}
					set updated_at = now()
					where id = '{$_POST['project_id'][$k]}' ";
		sql_query($sql);
    }

} else if ($_POST['act_button'] == "선택삭제") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];

       $sql = " delete from {$g5['project_table']} 
				where id = '{$_POST['project_id'][$k]}' ";
       sql_query($sql);
       
    }
}

if ($msg)
    //echo '<script> alert("'.$msg.'"); </script>';
    alert($msg);

goto_url('./project_list.php?'.$qstr);
?>
