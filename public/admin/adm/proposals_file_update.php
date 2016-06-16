<?php
$sub_menu = "400100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$upload_max_filesize = ini_get('upload_max_filesize');

if (empty($_POST))
    alert("파일 또는 글내용의 크기가 서버에서 설정한 값을 넘어 오류가 발생하였습니다.\\n\\npost_max_size=".ini_get('post_max_size')." , upload_max_filesize=$upload_max_filesize\\n\\n게시판관리자 또는 서버관리자에게 문의 바랍니다.");


$f_id = $_POST[f_id];
$p_id = $_POST[p_id];
$u_id = $_POST[u_id];
$upload_size = "31457280";



// 디렉토리가 없다면 생성합니다. (퍼미션도 변경하구요.)
@mkdir(G5_DATA_PATH.'/proposals/', G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH.'/proposals/', G5_DIR_PERMISSION);

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

        $row = sql_fetch(" select file_name from {$g5['file_table']} where p_id = '{$p_id}' and f_id = '0' ");
        @unlink(G5_DATA_PATH . '/proposals/' . $row['file_name']);

        sql_query(" delete from $g5[file_table] where p_id = '$p_id' and f_id = '0' ");
    } else
        $upload[0]['del_check'] = false;
}


for ($i=0; $i<count($_FILES['bf_file']['name']); $i++)
{
    if ($_FILES['bf_file']['name'][$i] == "") continue;

    // 기존 파일은 무조건 삭제
    $upload[$i]['del_check'] = true;

    $row = sql_fetch(" select file_name from {$g5['file_table']} where p_id = '{$p_id}' and f_id = '{$i}' ");
    @unlink(G5_DATA_PATH . '/proposals/' . $row['file_name']);



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



        // 4.00.11 - 글답변에서 파일 업로드시 원글의 파일이 삭제되는 오류를 수정
        if ($w == 'u') {
            // 존재하는 파일이 있다면 삭제합니다.
            $row = sql_fetch(" select file_name from {$g5['file_table']} where p_id = '$p_id' and f_id = '$i' ");
            @unlink(G5_DATA_PATH.'/proposals/'.$row['file_name']);
        }


        // 프로그램 원래 파일명
        $upload[$i]['source'] = $filename;
        $upload[$i]['filesize'] = $filesize;

        // 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
        $filename = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $filename);

        shuffle($chars_array);
        $shuffle = implode('', $chars_array);

        // 첨부파일 첨부시 첨부파일명에 공백이 포함되어 있으면 일부 PC에서 보이지 않거나 다운로드 되지 않는 현상이 있습니다. (길상여의 님 090925)
        $upload[$i]['file'] = abs(ip2long($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.str_replace('%', '', urlencode(str_replace(' ', '_', $filename)));

        $dest_file = G5_DATA_PATH.'/proposals/'.$upload[$i]['file'];

        // 업로드가 안된다면 에러메세지 출력하고 죽어버립니다.
        $error_code = move_uploaded_file($tmp_file, $dest_file) or die($_FILES['bf_file']['error'][$i]);

        // 올라간 파일의 퍼미션을 변경합니다.
        chmod($dest_file, G5_FILE_PERMISSION);

        //$upload[$i][image] = @getimagesize($dest_file);

    }
}


//------------------------------------------------------------------------------
// 가변 파일 업로드
// 나중에 테이블에 저장하는 이유는 $id 값을 저장해야 하기 때문입니다.
for ($i=0; $i<count($upload); $i++)
{
    if (!get_magic_quotes_gpc()) {
        $upload[$i]['source'] = addslashes($upload[$i]['source']);
    }

    $row = sql_fetch(" select count(*) as cnt from $g5[file_table] where p_id = '$p_id' and f_id = '$i' ");
    if ($row[cnt])
    {
        // 삭제에 체크가 있거나 파일이 있다면 업데이트를 합니다.
        // 그렇지 않다면 내용만 업데이트 합니다.
        if ($upload[$i]['del_check'] || $upload[$i]['file'])
        {
            $sql = " update {$g5['file_table']}
                        set source_name = '{$upload[$i]['source']}',
                            file_name = '{$upload[$i]['file']}',
                            file_size = '{$upload[$i]['filesize']}'
                      where p_id = '$p_id'
                        and f_id = '$i' ";
            sql_query($sql);
        }
    }
    else
    {
        $sql = " insert into {$g5['file_table']}
                    set p_id = '$p_id',
                        f_id = '$i',
                        u_id = '$u_id',
                        source_name = '{$upload[$i]['source']}',
                        file_name = '{$upload[$i]['file']}',
                        file_size = '{$upload[$i]['filesize']}',
                        created_at = now(),
                        updated_at = now()";
        sql_query($sql);
    }
}

// 업로드된 파일 내용에서 가장 큰 번호를 얻어 거꾸로 확인해 가면서
// 파일 정보가 없다면 테이블의 내용을 삭제합니다.
$row = sql_fetch(" select max(f_id) as max_f_id from $g5[file_table] where p_id = '$p_id' ");
for ($i=(int)$row[max_f_id]; $i>=0; $i--)
{
    $row2 = sql_fetch(" select file_name from $g5[file_table] where p_id = '$p_id' and f_id = '$i' ");

    // 정보가 있다면 빠집니다.
    if ($row2[file_name]) break;

    // 그렇지 않다면 정보를 삭제합니다.
    sql_query(" delete from $g5[file_table] where p_id = '$p_id' and f_id = '$i' ");
}
//------------------------------------------------------------------------------

goto_url("applications_list.php?p_id=$p_id&page=$page&step=$step");
?>