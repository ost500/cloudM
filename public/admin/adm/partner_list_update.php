<?php
$sub_menu = "200120";
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


        $sql = " update {$g5['member_table']}
                    set
                    name          = '{$_POST['name'][$k]}',
                    homepage      = '{$_POST['homepage'][$k]}',
                    phone_num     = '{$_POST['phone_num'][$k]}',
                    fax_num       = '{$_POST['fax_num'][$k]}',
                    company_name  = '{$_POST['company_name'][$k]}',
                    auth_check    = '{$_POST['auth_check'][$k]}'
                    where id = '{$_POST['id'][$k]}' ";
        sql_query($sql);

        $sql = " update {$g5['partner_table']}
                    set
                    intro           = '{$_POST['intro'][$k]}',
                    authenticated   = '{$_POST['authenticated'][$k]}',
                    company_check   = '{$_POST['company_check'][$k]}',
                    proposal_check  = '{$_POST['proposal_check'][$k]}',
                    rank            = '{$_POST['rank'][$k]}'
                    where user_id = '{$_POST['id'][$k]}' ";
        sql_query($sql);
    }

} else if ($_POST['act_button'] == "선택삭제") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];

        $sql = " delete from {$g5['member_table']}
                   where id = '{$_POST['id'][$k]}' ";
        //sql_query($sql);

        $sql = "delete from {$g5['partner_table']}
                  where u_id = '{$_POST['id'][$k]}'";
        //sql_query($sql);
    }
} else if ($_POST['act_button'] == "프로필사진 초기화") {

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];

        $sql = "update {$g5['member_table']}
                set
                  profileImage = '/files/userImage/default'
                where id = '{$_POST['id'][$k]}' ";
        sql_query($sql);
    }
}

if ($msg)
    //echo '<script> alert("'.$msg.'"); </script>';
    alert($msg);

goto_url('./partner_list.php?'.$qstr);
?>
