<?php
$sub_menu = "400100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$sql_common = " from {$g5['project_table']} as a left join {$g5['member_table']} as b ";
$sql_common .= " on a.client_id = b.id ";

$sql_search = " where (1) ";

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


if ($step)
{
	$sql_search .= " and a.step = '$step'";
}

/*
if ($is_admin != 'super')
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";
*/

if (!$sst) {
    $sst = "a.id";
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

$g5['title'] = '프로젝트관리';
include_once('./admin.head.php');

$sql = " select *, a.id as project_id, b.id as user_id {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 16;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    총 <?php echo number_format($total_count) ?>건
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
	<input type="hidden" name="step" value="<?php echo $step?>">

    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="title"<?php echo get_selected($_GET['sfl'], "title"); ?>>프로젝트명</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
    <input type="submit" class="btn_submit" value="검색">

</form>

<?php if ($is_admin == 'super') { ?>

<?php } ?>

<div class="btn_add01 btn_add" style="position: absolute; right:0px;">
    <a href="./project_form.php" id="member_add">프로젝트 추가</a>
</div>



<form name="fmemberlist" id="fmemberlist" action="./project_list_update.php" onsubmit="return fmemberlist_submit(this);" method="post">
    <div class="btn_list01 btn_list">
        <input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">
        <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">


    </div>
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
                <th scope="col" id="project_list_chk" rowspan="2">
                    <label for="chkall" class="sound_only">회원 전체</label>
                    <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">

                    <?php echo subject_sort_link('step') ?>상태</a>
                </th>
                <th scope="col" rowspan="2" id="project_list_title"><?php echo subject_sort_link('title') ?>프로젝트명</a></th>
                <th scope="col" id="project_list_mobile">업체명</th>
                <th scope="col" id="project_list_mobile">담당자</th>
                <th scope="col" id="project_list_name"><?php echo subject_sort_link('estimated_duration') ?>예상 기간</a></th>
                <th scope="col" id="project_list_name"><?php echo subject_sort_link('purpose') ?>진행 목적</a></th>
                <th scope="col" rowspan="2" id="project_list_mng">설명</th>
                <th scope="col" id="project_list_lastcall"><?php echo subject_sort_link('deadline', '', 'desc') ?>지원 마감일</a></th>
                <th scope="col" id="project_list_lastcall"><?php echo subject_sort_link('mb_today_login', '', 'desc') ?>등록시간</a></th>
                <th scope="col" rowspan="2" id="project_list_mng">지원자</th>
            </tr>
            <tr>
                <th scope="col" id="project_list_nick"><?php echo subject_sort_link('email') ?>이메일</a></th>
                <th scope="col" id="project_list_nick"><?php echo subject_sort_link('charger_phone') ?>연락처</a></th>
                <th scope="col" id="project_list_tel">예상 예산</th>
                <th scope="col" id="project_list_tel">등록 사유</th>
                <th scope="col" id="project_list_join"><?php echo subject_sort_link('expected_start_date', '', 'desc') ?>예상 시작일</a></th>
                <th scope="col" id="project_list_join"><?php echo subject_sort_link('mb_datetime', '', 'desc') ?>승인시간</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0; $row=sql_fetch_array($result); $i++) {
                $bg = 'bg'.($i%2);
                $updated_at = ($row['created_at']==$row['updated_at'])?"검수중":$row['updated_at'];

                $mb_nick = get_sideview($row['email'], get_text($row['name']), $row['email'], $row['mb_homepage']);
            ?>
                <tr class="<?php echo $bg; ?>">
                    <td class="td_40" rowspan="2">
                        <input type="hidden" name="project_id[<?php echo $i ?>]" value="<?php echo $row['project_id'] ?>" id="project_id_<?php echo $i ?>">

                        <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">

                        <select name="step[<?php echo $i ?>]" id="step<?=$i?>" required class="required frm_input">
                            <option value="">선택</option>
                            <option value="검수">검수</option>
                            <option value="게시">게시</option>
                            <option value="미팅">미팅</option>
                            <option value="계약">계약</option>
                            <option value="대금지급">대금지급</option>
                            <option value="환불">환불</option>
                            <option value="취소">취소</option>
                        </select>
                        <script> $(function() { $("#step<?=$i?>").val("<?=$row[step]?>"); }); </script>
                    </td>
                    <td rowspan="2" class="td_id"><a href="project_form.php?id=<?=$row[project_id]?>&w=u&<?=$qrst?>"> <?php echo $row[title] ?></a></td>
                    <td class="td_80"><?php echo $mb_nick ?></td>
                    <td class="td_60"><?php echo $row[charger_name] ?></td>
                    <td class="td_60"><?php echo $row[estimated_duration] ?></td>
                    <td class="td_60"><?php echo $row[purpose] ?></td>
                    <td rowspan="2" class="td_intro"><?php echo cut_str($row[detail_content], 140); ?></td>
                    <td class="td_date"><?php echo $row['deadline'] ?></td>
                    <td class="td_date"><?php echo $row['created_at'] ?></td>
                    <td class="td_mngsmall" rowspan=2><a href="applications_list.php?p_id=<?=$row[project_id]?>&page=<?=$page?>&step=<?=$step?>"><?=number_format($row[applications_cnt])?>명</a> <?php echo $s_grp ?></td>
                </tr>
                <tr class="<?php echo $bg; ?>">
                    <td class="td_80"><?php echo get_text($row['email']); ?></td>
                    <td class="td_60"><?php echo get_text($row['charger_phone']); ?></td>
                    <td class="td_60"><div><?php echo number_format($row[budget]); ?></div></td>
                    <td class="td_date"><?php echo $row['reason']; ?></td>
                    <td class="td_date"><?php echo $row['expected_start_date']; ?></td>
                    <td class="td_date"><?php echo $row[updated_at]; ?></td>
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

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&step='.$step.'&amp;page='); ?>


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
