<?php
include './dbconn.php';

$id = trim( $_POST['mb_id']);
$pw = trim( $_POST['mb_pw']);

if( !$id || !$pw ) {
    echo "<script>alert('ID or PW is empty. check one more');</script>";
    echo "<script> history.back();</script>";
    exit;
}


$sql = "select * from member where mb_id = '$id' and mb_pw = password('$pw')";
$result = $conn->query($sql);

if ( $result->num_rows ) {
    $member = $result->fetch_assoc();
    $_SESSION['ss_mb_id'] = $id;
}
else {
    echo "<script> alert(`there isn't such ID : ".$id."`);</script>";
    echo "<script> history.back();</script>";
    exit;
}
$conn->close();

if(isset($_SESSION['ss_mb_id'])) {
    echo "<script> alert('login successful. welcome ".$member['mb_name']."');</script>";
    echo "<script>location.replace('./member_list.php');</script>";
}
