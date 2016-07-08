<?php
$sub_menu = "400100";
include_once("./_common.php");
include_once(G5_LIB_PATH."/register.lib.php");

if ($w == 'u')
    check_demo();

auth_check($auth[$sub_menu], 'w');

check_admin_token();


$id = trim($_POST['id']);


$sql_common = "  charger_name			= '{$_POST['charger_name']}',
                charger_phone			= '{$_POST['charger_phone']}',
                area					= '{$_POST['area']}',
                category				= '{$_POST['category']}',
                title					= '{$_POST['title']}',
                budget					= '{$_POST['budget']}',
                managing_experience	    = '{$_POST['managing_experience']}',
                expected_start_date	    = '{$_POST['expected_start_date']}',
                meeting_way			    = '{$_POST['meeting_way']}',
                address_sido			= '{$_POST['address_sido']}',
                detail_content			= '{$_POST['detail_content']}',
                deadline				= '{$_POST['deadline']}',
                reason					= '{$_POST['reason']}',
                purpose				    = '{$_POST['purpose']}',
                estimated_duration		= '{$_POST['estimated_duration']}' ";

if ($w == '')
{
    $sql = "insert into {$g5['project_table']}
			set
				created_at = now(), 
				updated_at = now(), 
				$sql_common";
    sql_query($sql);
}
else if ($w == 'u')
{
    $sql = "delete from {$g5['area_table']}
            where p_id = '$id'";
    sql_query($sql);

    $for_size = sizeof($_POST['areas']);
    for($i = 0; $i < $for_size; $i++) {
        if (!isset($_POST['areas'][$i][0])) continue;

        $sql = "insert into {$g5['area_table']}
                set
                  p_id          = '$id',
                  area          = '{$_POST['areas'][$i][0]}',
                  price         = '{$_POST['areas'][$i][1]}',
                  commission    = '{$_POST['areas'][$i][2]}',
                  memo          = '{$_POST['areas'][$i][3]}',
                  created_at    = now(),
                  updated_at    = now()";
        sql_query($sql);
    }



    $sql = "update {$g5['project_table']}
            set 
				updated_at = now(), 
				{$sql_common}
            where id = '{$id}' ";
    sql_query($sql);


    $sql = "update {$g5['contract_table']}
            set
                charge_check              = '{$_POST['charge_check']}',
                charge_date               = '{$_POST['charge_date']}',
                charge_type               = '{$_POST['charge_type']}',
                type_pay                  = '{$_POST['type_pay']}',
                contract_date             = '{$_POST['contract_date']}',
                start_work_date           = '{$_POST['start_work_date']}',
                finish_work_date          = '{$_POST['finish_work_date']}',
                contract_pay              = '{$_POST['contract_pay']}',
                start_pay_date            = '{$_POST['start_pay_date']}',
                middle_pay_date           = '{$_POST['middle_pay_date']}',
                finish_pay_date           = '{$_POST['finish_pay_date']}',
                start_pay_ratio           = '{$_POST['start_pay_ratio']}',
                middle_pay_ratio          = '{$_POST['middle_pay_ratio']}',
                finish_pay_ratio          = '{$_POST['finish_pay_ratio']}',
                start_pay_request_date    = '{$_POST['start_pay_request_date']}',
                start_pay_accept_date     = '{$_POST['start_pay_accept_date']}',
                start_pay_give_date       = '{$_POST['start_pay_give_date']}',
                middle_pay_request_date   = '{$_POST['middle_pay_request_date']}'
                middle_pay_accept_date    = '{$_POST['middle_pay_accept_date']}'
                middle_pay_give_date      = '{$_POST['middle_pay_give_date']}',
                finish_pay_request_date   = '{$_POST['finish_pay_request_date']}',
                finish_pay_accept_date    = '{$_POST['finish_pay_accept_date']}',
                finish_pay_give_date      = '{$_POST['finish_pay_give_date']}',
				updated_at                = now()
            where p_id = '{$id}'";
    sql_query($sql);
}
else
    alert('제대로 된 값이 넘어오지 않았습니다.');

goto_url('./project_form.php?'.$qstr.'&amp;w=u&amp;id='.$id, false);
?>