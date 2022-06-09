<?php
include './goBack.php';

$filename = $_GET['file'];
$filepath = $_SERVER['DOCUMENT_ROOT'].'./test/uploads/'.$filename;

if (!is_file($filepath) && !file_exists($filepath) ) {
    echo '파일 없음';
    exit;
}

if ( preg_match("/msie/i", $_SERVER['HTTP_USER_AGENT']) && preg_match("/5\.5/", $_SERVER['HTTP_USER_AGENT']) ) {
    header("content-type: doesn/matter");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$filename\"");
    header("content-transfer-encoding: binary");
} else {

    header("content-: file/unknown");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$filename\"");
    header("content-description: php generated data");
}

header("pragma: no-cache");
header("expires:0");

$fp = fopen($filepath, 'rb');
while(!feof($fp))
{
    echo fread($fp, 100*1024);
}
fclose($fp);