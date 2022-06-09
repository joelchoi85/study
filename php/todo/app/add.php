<?php
include("../dbconn.php");

$title = trim($_POST['title']);
$datetime = date('Y-m-d H:i:s', time());

if( empty($title)) {
    echo "script>alert('내용을 입력하세요.');</script>";
    echo "<script>history.back();</script>";
    exit;
} else {
    $sql = "INSERT into todo set title='$title', datetime='$datetime'";
    if($conn->query($sql)) $conn->close(); else echo "<script>alert('오류');</script>";
    header("Location:../index.php");
    exit;
}