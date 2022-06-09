<?php
include '../test/goBack.php';

$host = '127.0.0.1'; // localhost 로 했을 때 엄청 느림
$user = 'root';
$pw = '124578986532';
$db = 'test';


$conn = mysqli_connect($host, $user, $pw, $db);

!($conn->error) ?: die('connect error : '.$conn->error);

$sql = "select * from movie_director ";
$result = $conn->query($sql) or die('query error : '.$conn->error);

if($result->num_rows) {
    while($row = $result->fetch_array()){
        echo $row['id']."\t".$row['name']."\t".$row['birthday']."<br/>";
     }
 }
$result->free_result();

$conn->close();


