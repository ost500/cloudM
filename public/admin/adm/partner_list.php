<?php
$sub_menu = "200120";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$sql_common = " from {$g5['member_table']} as a left join {$g5['partner_table']} as b on a.id = b.user_id ";

$sql_search = " where (1) and PorC = 'P'";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case 'mb_point' :
            $sql_search .= " ({$sfl} >= '{$stx}') ";
            break;
        case 'mb_level' :
            $sql_search .= " ({$sfl} = '{$stx}') ";
            break;
        case 'mb_tel' :
        case 'mb_hp' :
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
    $sst = "a.created_at";
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

$g5['title'] = '파트너 관리';
include_once('./admin.head.php');

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
$result = sql_query($sql);

$colspan = 16;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
    총회원수 <?php echo number_format($total_count) ?>명 중,
    <a href="?sst=mb_intercept_date&amp;sod=desc&amp;sfl=<?php echo $sfl ?>&amp;stx=<?php echo $stx ?>">차단 <?php echo number_format($intercept_count) ?></a>명,
    <a href="?sst=mb_leave_date&amp;sod=desc&amp;sfl=<?php echo $sfl ?>&amp;stx=<?php echo $stx ?>">탈퇴 <?php echo number_format($leave_count) ?></a>명
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">

<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mb_email"<?php echo get_selected($_GET['sfl'], "email"); ?>>아이디</option>
    <option value="mb_name"<?php echo get_selected($_GET['sfl'], "name"); ?>>이름</option>
    <option value="mb_level"<?php echo get_selected($_GET['sfl'], "level"); ?>>권한</option>
    <option value="mb_tel"<?php echo get_selected($_GET['sfl'], "phone_num"); ?>>전화번호</option>
</select>
<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
<input type="submit" class="btn_submit" value="검색">

</form>


<?php if ($is_admin == 'super') { ?>
<div class="btn_add01 btn_add">
    <a href="./member_form.php" id="member_add">회원추가</a>
</div>
<?php } ?>

<form name="fmemberlist" id="fmemberlist" action="./partner_list_update.php" onsubmit="return fpartnerlist_submit(this);" method="post">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">


<div class="btn_list01 btn_list">
    <input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">
</div>


<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col" id="mb_list_chk">
            <label for="chkall" class="sound_only">회원 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col" id="mb_list_id"><?php echo subject_sort_link('id') ?>번호</a></th>
        <th scope="col" id="mb_list_id"><?php echo subject_sort_link('email') ?>아이디</a></th>
        <th scope="col" id="mb_list_name"><?php echo subject_sort_link('name') ?>이름</a></th>
        <th scope="col" id="mb_list_cert"><?php echo subject_sort_link('company_type', '', 'desc') ?>타입</a></th>
        <th scope="col" id="mb_list_mobile">연락처</th>
        <th scope="col" id="mb_list_auth">회사소개서</th>
        <th scope="col" id="mb_list_auth">상품소개서</th>
        <th scope="col" id="mb_list_auth"><?php echo subject_sort_link('check', '', 'desc') ?>노출승인</a></th>
        <th scope="col" id="mb_list_auth"><?php echo subject_sort_link('auth_chceck', '', 'desc') ?>신원인증</a></th>
        <th scope="col" id="mb_list_lastcall"><?php echo subject_sort_link('created_at', '', 'desc') ?>가입일</a></th>
        <th scope="col" id="mb_list_mng">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {

        $mb_nick = get_sideview($row['mb_id'], get_text($row['mb_nick']), $row['mb_email'], $row['mb_homepage']);

        $mb_id = $row['email'];

        $address = $row['mb_zip1'] ? print_address($row['mb_addr1'], $row['mb_addr2'], $row['mb_addr3'], $row['mb_addr_jibeon']) : '';

        $bg = 'bg'.($i%2);

        $auth = "";
        $proposal_file = "";
        $company_file = "";

        if ($row[auth_check] != "인증전") {
            $auth = " <a href='download.php?t=user&id={$row['id']}'><font color='red'>다운</font></a>";
        }

        if ($row[proposal_file_name] && file_exists($_SERVER['DOCUMENT_ROOT'].$row[proposal_file_name])) {
            $proposal_file = "<br><a href='download.php?t=proposal&id={$row['id']}'><font color='red'>{$row['proposal_origin_name']}</font></a>";
        }

        if ($row[company_file_name] && file_exists($_SERVER['DOCUMENT_ROOT'].$row[company_file_name])) {
            $company_file = "<br><a href='download.php?t=company&id={$row['id']}'><font color='red'>{$row['company_origin_name']}</font></a>";
        }

    ?>

    <tr class="<?php echo $bg; ?>">
        <td headers="mb_list_chk" class="td_chk">
            <input type="hidden" name="id[<?php echo $i ?>]" value="<?php echo $row['id'] ?>" id="mb_id_<?php echo $i ?>">
            <label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['mb_name']); ?> <?php echo get_text($row['mb_nick']); ?>님</label>
            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
        </td>
        <td headers="mb_list_chk" class="td_chk"><?php echo $row[id] ?></td>
        <td class="c td_100"><?php echo $mb_id ?></td>
        <td class="c td_50"><?php echo get_text($row['name']); ?></td>
        <td class="c td_50"><?php echo get_text($row['company_type']); ?></td>
        <td headers="mb_list_mobile" class="c td_100"><?php echo $row[phone_num]; ?></td>

        <td class="c td_50">
            <select name="company_check[<?=$i?>]" id="company_check_<?=$i?>">
                <option value="">선택</option>
                <option value="0">인증전</option>
                <option value="1">인증완료</option>
            </select>
            <?=$company_file?>

            <script> $(function(){  $("#company_check_<?=$i?>").val("<?=$row[company_check]?>"); });</script>
        </td>
        <td class="c td_50">
            <select name="proposal_check[<?=$i?>]" id="proposal_check_<?=$i?>">
                <option value="">선택</option>
                <option value="0">인증전</option>
                <option value="1">인증완료</option>
            </select>
            <?=$proposal_file?>

            <script> $(function(){  $("#proposal_check_<?=$i?>").val("<?=$row[proposal_check]?>"); });</script>
        </td>

        <td headers="mb_list_mobile" class="td_tel">
            <select name="check[<?=$i?>]" id="check_<?=$i?>">
                <option value="">선택</option>
                <option value="0">승인전</option>
                <option value="1">승인완료</option>
            </select>

            <script> $(function(){  $("#check_<?=$i?>").val("<?=$row[check]?>"); });</script>
        </td>


        <td headers="mb_list_mobile" class="td_tel">
            <select name="auth_check[<?=$i?>]" id="auth_check_<?=$i?>">
                <option value="">선택</option>
                <option value="인증전">인증전</option>
                <option value="인증요청">인증요청</option>
                <option value="인증완료">인증완료</option>
            </select>

            <?=$auth?>

            <script> $(function(){  $("#auth_check_<?=$i?>").val("<?=$row[auth_check]?>"); });</script>
        </td>

        <td headers="mb_list_lastcall" class="td_date"><?php echo $row['created_at'] ?></td>
        <td headers="mb_list_mng" class="td_mngsmall"><?php echo $s_mod ?> <?php echo $s_grp ?></td>
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
function fpartnerlist_submit(f)
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
