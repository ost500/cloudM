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

        $sql = " update {$g5['application_table']}
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

        $sql = " delete from {$g5['application_table']} where id = '{$_POST['ids'][$k]}' and p_id = '{$_POST['p_ids'][$k]}'";
        sql_query($sql);
    }


    $sql = "select count(*) as cnt
                from {$g5['application_table']}
                where id = '{$_POST['ids'][$k]}' and
                  p_id = '{$_POST['p_ids'][$k]}'";
    $row = sql_fetch($sql);

    $sql = " update {$g5['project_table']}
                    set
                        applications_cnt = '{$row['cnt']}'
                    where id = '{$_POST['p_id']}'";
    sql_query($sql);
}  else if ($_POST['act_button'] == "계약") {

    $sql = "update {$g5['project_table']}
            set
                step = '계약'
            where id = '{$_POST['p_id']}'";
    sql_query($sql);

    $sql = "insert into {$g5['contract_table']}
              SET
              created_at  = now(),
              updated_at  = now(),
              u_id        = '{$_POST['u_id']}',
              c_id        = '{$_POST['c_id']}',
              p_id        = '{$_POST['p_id']}',
              step        = '계약'";
    sql_query($sql);
}

if ($msg)
    //echo '<script> alert("'.$msg.'"); </script>';
    alert($msg);

goto_url('./applications.php?p_id='.$p_id.'&'.$qstr);
?>
