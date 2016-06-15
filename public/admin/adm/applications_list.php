<?php
$sub_menu = "400100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');


$step = $_GET['step'];
$p_id = $_GET['p_id'];


$sql_common = " from {$g5['application_table']} as a left join {$g5['member_table']} as b ";
$sql_common .= " on a.u_id = b.id ";

$sql_search = " where (1) and a.p_id = '$p_id'";

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'title' :
            $sql_search .= " ({$sfl} like '%{$stx}') ";
            break;
        default :
            $sql_search .= " ({$sfl} like '{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

/*
if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";
*/

if (!$sst) {
    $sst = "b.created_at";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함


$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$g5['title'] = '프로젝트 지원 관리';
include_once('./admin.head.php');

$sql = " select *, a.id as app_id, b.id as user_id {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 16;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    총 <?php echo number_format($total_count) ?>건
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">

    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="title"<?php echo get_selected($_GET['sfl'], "title"); ?>>프로젝트명</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">

</form>

<div class="btn_list01 btn_list">
	<a href="./project_list.php?page=<?=$page?>&step=<?=$step?>">프로젝트로 돌아가기</a>
</div>


<form name="fmemberlist" id="fmemberlist" action="./project_list_update.php" onsubmit="return fmemberlist_submit(this);" method="post">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="">

    <div class="tbl_head02 tbl_wrap">
        <table>
            <caption><?php echo $g5['title']; ?> 목록</caption>
            <thead>
            <tr>
                <th scope="col" id="project_list_chk">
                    <label for="chkall" class="sound_only">회원 전체</label>
                    <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                </th>
                <th scope="col" id="project_list_mobile"><?php echo subject_sort_link('name') ?>업체명</a></th>
				<th scope="col" id="project_list_mng"><?php echo subject_sort_link('type') ?>기업<br>형태</a></th>
                <th scope="col" id="project_list_name">지역</th>
				<th scope="col" id="project_list_mobile">연락처</th>
				<th scope="col" id="project_list_mobile">지원</th>
				<th scope="col" id="project_list_mobile">계약</th>
				<th scope="col" id="project_list_mobile">완료</th>                
                <th scope="col" id="project_list_lastcall"><?php echo subject_sort_link('mb_today_login', '', 'desc') ?>지원일</a></th>
                <th scope="col" id="project_list_mng">제안서</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0; $row=sql_fetch_array($result); $i++) {

				$sql = "select count(*) as cnt
						from {$g5['contract_table']}
						where u_id = '$row[user_id]'
						where step = '지원'";
				$step1 = sql_fetch($sql);
				
				$sql = "select count(*) as cnt
						from {$g5['contract_table']}
						where u_id = '$row[user_id]'
						where step = '계약'";
				$step2 = sql_fetch($sql);

				$sql = "select count(*) as cnt
						from {$g5['contract_table']}
						where u_id = '$row[user_id]'
						where step = '대금지급'";
				$step3 = sql_fetch($sql);


                $sql = "select *
                        from {$g5['file_table']}
                        where p_id = '$p_id' and
                          u_id = '$row[u_id]'";
                $files = sql_fetch($sql);
            ?>

                <tr class="<?php echo $bg; ?>">
                    <td class="td_40">
                        <input type="hidden" name="project_id[<?php echo $i ?>]" value="<?php echo $row['project_id'] ?>" id="project_id_<?php echo $i ?>">

                        <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
                    </td>
                    <td class="td_date"><a href="member_form.php?mb_id=<?=$row[email]?>&w=u&<?=$qrst?>"> <?php echo $row[name] ?></a></td>
					<td class="td_40"><?=$row[company_type]?></td>
					<td class="td_date"></td>
                    <td class="td_60"><?php echo $row[phone_num] ?></td>
					<td class="td_40"><?=number_format($step1[cnt]);?></td>
					<td class="td_40"><?=number_format($step2[cnt]);?></td>
					<td class="td_40"><?=number_format($step3[cnt]);?></td>
                    <td headers="project_list_lastcall" class="td_date"><?php echo $row['created_at'] ?></td>
                    <td headers="project_list_mng" class="bts td_mngsmall">
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#fileModal"  data-fid="<?=$row[id]?>" data-pid="<?=$row[p_id]?>" data-uid="<?=$row[user_id]?>">등록</button>
                    <? if ($files[file_name]) { ?>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#fileModalEdit" data-source_name="<?=$files[source_name]?>" data-file_name="<?=$files[file_name]?>" data-fid="<?=$files[f_id]?>" data-pid="<?=$row[p_id]?>" data-uid="<?=$row[user_id]?>">수정</button>
                    <? } ?>
					</td>
                </tr>

                <?php
            }
            if ($i == 0)
                echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">자료가 없습니다.</td></tr>";
            ?>
            </tbody>
        </table>
    </div>

    <div class="btn_list01 btn_list">
        <input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">
        <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">
    </div>

</form>




<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;page='); ?>


<script>
    function fmemberlist_submit(f)
    {
        if (!is_checked("chk[]")) {
            alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
            return false;
        }

        if(document.pressed == "선택삭제") {
            if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
                return false;
            }
        }

        return true;
    }
</script>



<?php
include_once ('./admin.tail.php');
?>

