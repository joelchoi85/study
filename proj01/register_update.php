<?php
include('./dbconn.php');
$mode = $_POST['mode'];

switch ( $mode) {
    case 'insert' :
        $id = trim($_POST['mb_id']);
        $title = "회원가입";
        break;
    case 'modify' :
        $id = trim($_POST['mb_id']);
        $title = "회원수정";
        break;
    default :
        echo "<script>alert('wrong value in mode');</script>";
        echo "<script>history.back();</script>";
        break;
}

if( !$_POST['mb_id']) {
    echo "<script>alert('아이디가 ...어디갔지?');</script>";
    echo "<script>history.back();</script>";
    exit;
}
if( !$_POST['mb_pw']) {
    echo "<script>alert('비밀번호가 ...어디갔지?');</script>";
    echo "<script>history.back();</script>";
    exit;
}
if( $_POST['mb_pw'] !== $_POST['mb_pw_confirm']) {
    echo "<script>alert('비밀번호가 다른데?');</script>";
    echo "<script>history.back();</script>";
    exit;
}
if( !$_POST['mb_name']) {
    echo "<script>alert('이름이 ...어디갔지?');</script>";
    echo "<script>history.back();</script>";
    exit;
}
if( !$_POST['mb_email']) {
    echo "<script>alert('이메일 안 썼나?');</script>";
    echo "<script>history.back();</script>";
    exit;
}

$pw = trim($_POST['mb_pw']);
$pw_confirm = trim($_POST['mb_pw_confirm']);
$name = trim($_POST['mb_name']);
$email = trim($_POST['mb_email']);
$job = $_POST['mb_job'] ?? '';
$gender = $_POST['mb_gender'] == 'male' ? '1' : '2';
$language = isset($_POST['mb_language']) ? implode(",", $_POST['mb_language']): "";
$datetime = date('Y-m-d H:i:s', time());

if( $mode == "insert") {
    $sql = "SELECT * from member where mb_id = '$id'";
    $result = $conn->query($sql) or die('쿼리 못 날려');
    if( $result->num_rows ) {
        echo "<script>alert('입력한 아이디가 이미 사용중이래');</script>";
        echo "<script>history.back();</script>";
        exit;
    }
    $result->free();
    $sql = "INSERT into member set mb_id='$id', mb_pw=password('$pw'), mb_name='$name', mb_email='$email', mb_job='$job', mb_gender='$gender', mb_language='$language', mb_datetime='$datetime'";
} else if ($mode == "modify" ) {
    $sql = " UPDATE member set mb_pw=password('$pw'), mb_name='$name', mb_email='$email', mb_job='$job', mb_gender='$gender', mb_language='$language', mb_datetime='$datetime' where mb_id='$id'";
}
if ($conn->query($sql)) {
    echo "<script>alert('".$title."이 정상적으로 처리되었음');</script>";
    $_SESSION['ss_mb_id'] = $id;
    echo "<script>location.replace('./member_list.php');</script>";
    $result->free();
    $conn->close();
    exit;
} else {
    echo $title." 실패 : ".$conn->error;
    $result->free();
    $conn->close();
}

