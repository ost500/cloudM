<?php
$sub_menu = '300100';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '1:1문의';

if ($w == "u")
{
    $html_title .= ' 수정';
    $readonly = ' readonly';

    $sql = " select * from {$g5['mantomen_table']} as a left join {$g5['member_table']} as b on a.u_id = b.id where a.id = '$id' ";
    $row = sql_fetch($sql);
    if (!$row['id']) alert('등록된 자료가 없습니다.');
}
else
{
    $html_title .= ' 입력';
}

$g5['title'] = $html_title.' 관리';


include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row"><label for="fm_subject">작성자</label></th>
        <td>
            <?php echo get_text($row['name']); ?>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="fm_subject">제목</label></th>
        <td>
            <?php echo get_text($row['title']); ?>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="fm_subject">작성일</label></th>
        <td>
            <?=$row['created_at']?>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="fm_subject">내용</label></th>
        <td>
            <textarea name="content" rows="10" cols="10"><?=$row['content']?></textarea>
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <a href="./mantomen.php">목록</a>
</div>


<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
