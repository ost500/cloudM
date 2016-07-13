<?php
include_once('./_common.php');

// clean the output buffer
ob_end_clean();

$f_id = (int)$f_id;

if ($t == "app") {
    $table = $g5['application_table'];
    $file_name = "file_name";
    $origin_name = "origin_name";
    $sfl = "id";
} else if ($t == "user") {
    $table = $g5['member_table'];
    $file_name = "auth_image";
    $origin_name = "auth_image";
    $sfl = "id";
} else if ($t == "proposal") {
    $table = $g5['partner_table'];
    $file_name = "proposal_file_name";
    $origin_name = "proposal_origin_name";
    $sfl = "user_id";
} else if ($t == "company") {
    $table = $g5['partner_table'];
    $file_name = "company_file_name";
    $origin_name = "company_origin_name";
    $sfl = "user_id";
}


$sql = " select * from $table where $sfl = '$id'";
$file = sql_fetch($sql);

if (!$file[$file_name])
    alert_close('파일 정보가 존재하지 않습니다.');

$filepath = $_SERVER['DOCUMENT_ROOT'].$file[$file_name];
$filepath = addslashes($filepath);
if (!is_file($filepath) || !file_exists($filepath))
    alert('파일이 존재하지 않습니다.');


$g5['title'] = '다운로드';

if ($t == "app") {
    $original = $file['origin_name'];
} else if ($t == "user") {
    $size = sizeof(explode("/", $file[$file_name]));
    $original_ = explode("/", $file[$file_name]);
    $original = $original_[$size-1];
} else if ($t == "proposal") {
    $original = $file['proposal_origin_name'];
} else if ($t == "company") {
    $original = $file['company_origin_name'];
}



if(preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT'])) {
    header("content-type: doesn/matter");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$original\"");
    header("content-transfer-encoding: binary");
} else {
    header("content-type: file/unknown");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$original\"");
    header("content-description: php generated data");
}
header("pragma: no-cache");
header("expires: 0");
flush();

$fp = fopen($filepath, 'rb');

// 4.00 대체
// 서버부하를 줄이려면 print 나 echo 또는 while 문을 이용한 방법보다는 이방법이...
//if (!fpassthru($fp)) {
//    fclose($fp);
//}

$download_rate = 10;

while(!feof($fp)) {
    //echo fread($fp, 100*1024);
    /*
    echo fread($fp, 100*1024);
    flush();
    */

    print fread($fp, round($download_rate * 1024));
    flush();
    usleep(1000);
}
fclose ($fp);
flush();
?>
