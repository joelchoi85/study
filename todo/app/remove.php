<?php
include("../dbconn.php");

$id = $_GET['id'];

if( empty($id)) {
    echo "<script>alert('ID가 넘어오지 않았네');</script>";
    echo "<script>history.back();</script>";
    exit;
} else {
    $sql = "DELETE from todo where id='$id'";
    if( $conn->query($sql)) {
        $conn->close();
        header("Location:../index.php");
    } else {
        $conn->close();
        echo $conn->error." 에러";
        header("Location:../index.php");
        exit;
    }
}