<?php
$sub_menu = "200120";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$upload_max_filesize = ini_get('upload_max_filesize');

if (empty($_POST))
    alert("파일 또는 글내용의 크기가 서버에서 설정한 값을 넘어 오류가 발생하였습니다.\\n\\npost_max_size=".ini_get('post_max_size')." , upload_max_filesize=$upload_max_filesize\\n\\n게시판관리자 또는 서버관리자에게 문의 바랍니다.");


$u_id = $_POST[u_id];
$upload_size = "31457280";



$sql = "select * from {$g5['partner_table']} where user_id = '$u_id'";
$row = sql_fetch($sql);

if ($type == "company") {
    $file_name = $row['company_file_name'];
    $origin_name = $row['company_origin_name'];
    $file_field = "company_file_name";
    $origin_field = "company_origin_name";
    $file_dir = '/files/companys/';
} else if($type == "proposal") {
    $file_name = $row['proposal_file_name'];
    $origin_name = $row['proposal_origin_name'];
    $file_field = "proposal_file_name";
    $origin_field = "proposal_origin_name";
    $file_dir = '/files/proposals/';
}


// 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
@mkdir($_SERVER['DOCUMENT_ROOT'].$file_dir, G5_DIR_PERMISSION);
@chmod($_SERVER['DOCUMENT_ROOT'].$file_dir, G5_DIR_PERMISSION);

// "인터넷옵션 > 보안 > 사용자정의수준 > 스크립팅 > Action 스크립팅 > 사용 안 함" 일 경우의 오류 처리
// 이 옵션을 사용 안 함으로 설정할 경우 어떤 스크립트도 실행 되지 않습니다.
//if (!$_POST[wr_content]) die ("내용을 입력하여 주십시오.");

$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));
//print_r2($chars_array); exit;

// 가변 파일 업로드
$file_upload_msg = "";
$upload = array();

if ($_FILES['bf_file']['name'][0] == "") {
    // 삭제에 체크가 되어있다면 파일을 삭제합니다.
    if (isset($_POST['file_name_del'][0]) && $_POST['file_name_del'][0]) {
        $upload[$i]['del_check'] = true;

        @unlink($_SERVER['DOCUMENT_ROOT'] . $row[$file_field]);

        $sql = "update {$g5['partner_table']} set $file_field = '', $origin_field = '' where user_id = '$u_id'";
        sql_query($sql);
    } else
        $upload[0]['del_check'] = false;
}


for ($i=0; $i<count($_FILES['bf_file']['name']); $i++)
{
    if ($_FILES['bf_file']['name'][$i] == "") continue;

    @unlink($_SERVER['DOCUMENT_ROOT'].$file_dir . $row[$file_name]);



    $tmp_file  = $_FILES['bf_file']['tmp_name'][$i];
    $filesize  = $_FILES['bf_file']['size'][$i];
    $filename  = $_FILES['bf_file']['name'][$i];
    $filename  = preg_replace('/(<|>|=)/', '', $filename);

    // 서버에 설정된 값보다 큰파일을 업로드 한다면
    if ($filename) {
        if ($_FILES['bf_file']['error'][$i] == 1) {
            $file_upload_msg .= '\"'.$filename.'\" 파일의 용량이 서버에 설정('.$upload_max_filesize.')된 값보다 크므로 업로드 할 수 없습니다.\\n';
            continue;
        }
        else if ($_FILES['bf_file']['error'][$i] != 0) {
            $file_upload_msg .= '\"'.$filename.'\" 파일이 정상적으로 업로드 되지 않았습니다.\\n';
            continue;
        }
    }

    if (is_uploaded_file($tmp_file)) {
        // 관리자가 아니면서 설정한 업로드 사이즈보다 크다면 건너뜀
        if (!$is_admin && $filesize > $bo_upload_size) {
            $file_upload_msg .= '\"'.$filename.'\" 파일의 용량('.number_format($filesize).' 바이트)이 게시판에 설정('.number_format($bo_upload_size).' 바이트)된 값보다 크므로 업로드 하지 않습니다.\\n';
            continue;
        }

        //=================================================================\
        // 090714
        // 이미지나 플래시 파일에 악성코드를 심어 업로드 하는 경우를 방지
        // 에러메세지는 출력하지 않는다.
        //-----------------------------------------------------------------
        $timg = @getimagesize($tmp_file);
        // image type
        if ( preg_match("/\.({$config['cf_image_extension']})$/i", $filename) ||
            preg_match("/\.({$config['cf_flash_extension']})$/i", $filename) ) {
            if ($timg['2'] < 1 || $timg['2'] > 16)
                continue;
        }
        //=================================================================

        $upload[$i][image] = $timg;



        // 프로그램 원래 파일명
        $upload[$i]['source'] = $filename;
        $upload[$i]['filesize'] = $filesize;

        // 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
        $filename = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $filename);

        shuffle($chars_array);
        $shuffle = implode('', $chars_array);

        // 첨부파일 첨부시 첨부파일명에 공백이 포함되어 있으면 일부 PC에서 보이지 않거나 다운로드 되지 않는 현상이 있습니다. (길상여의 님 090925)
        $upload[$i]['file'] = $u_id;

        $dest_file = $_SERVER['DOCUMENT_ROOT'].$file_dir.$upload[$i]['file'];

        // 업로드가 안된다면 에러메세지 출력하고 죽어버립니다.
        $error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['bf_file']['error'][$i]);

        // 올라간 파일의 퍼미션을 변경합니다.
        chmod($dest_file, G5_FILE_PERMISSION);


        $file_name = $file_dir.$upload[$i]['file'];
        $sql = "update {$g5['partner_table']}
                set
                $file_field = '$file_name',
                $origin_field = '{$upload[$i]['source']}'
                where user_id = '$u_id'";
        sql_query($sql);
    }
}

goto_url("partner_list.php?page=$page");
?>