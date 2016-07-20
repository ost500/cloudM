<?php
$sub_menu = '300100';
include_once('./_common.php');

auth_check($auth[$sub_menu], "r");


$g5['title'] = '1:1문의 관리';
include_once (G5_ADMIN_PATH.'/admin.head.php');

$sql_common = " from {$g5['mantomen_table']} as a left join {$g5['member_table']} as b on a.u_id = b.id ";

// 테이블의 전체 레코드수만 얻음
$sql = " select count(*) as cnt " . $sql_common;
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = "select *, a.id as man_id, b.id as user_id $sql_common limit $from_record, {$config['cf_page_rows']} ";
$result = sql_query($sql);
?>

<div class="local_ov01 local_ov">
    <?php if ($page > 1) {?><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">처음으로</a><?php } ?>
    <span>전체 1:1문의 <?php echo $total_count; ?>건</span>
</div>

<!--<div class="local_desc01 local_desc">-->
<!--    <ol>-->
<!--        <li>FAQ는 무제한으로 등록할 수 있습니다</li>-->
<!--        <li><strong>FAQ추가</strong>를 눌러 FAQ Master를 생성합니다. (하나의 FAQ 타이틀 생성 : 자주하시는 질문, 이용안내..등 )</li>-->
<!--        <li>생성한 FAQ Master 의 <strong>제목</strong>을 눌러 세부 내용을 관리할 수 있습니다.</li>-->
<!--    </ol>-->
<!--</div>-->

<form name="fmantomenlist" id="fmantomenlist" action="./mantomen_list_update.php" onsubmit="return fmantomenlist_submit(this);" method="post">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col" rowspan="2" id="mb_list_chk">
            <label for="chkall" class="sound_only">전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">제목</th>
        <th scope="col">작성자</th>
        <th scope="col">작성일</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i=0; $row=sql_fetch_array($result); $i++) {
        $bg = 'bg'.($i%2);
    ?>
    <tr class="<?php echo $bg; ?>">
        <td headers="mb_list_chk" class="td_chk" rowspan="2">
            <input type="hidden" name="id[<?php echo $i ?>]" value="<?php echo $row['man_id'] ?>" id="man_id_<?php echo $i ?>">
            <input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
        </td>
        <td class="td_200"><a href="./mantoman_form.php?id=<?php echo $row['man_id']; ?>&amp;w=u"><?php echo stripslashes($row['title']); ?></a></td>
        <td class="td_num"><?php echo $row['name']; ?></td>
        <td class="td_num"><?php echo $row['created_at']?></td>
    </tr>
    <?php
    }

    if ($i == 0){
        echo '<tr><td colspan="5" class="empty_table"><span>자료가 한건도 없습니다.</span></td></tr>';
    }
    ?>
    </tbody>
    </table>
</div>

<div class="btn_list01 btn_list">
    <input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">
</div>
</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>


<script>
    function fmantomenlist_submit(f)
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
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
