<?php
include './goBack.php';

//Exception 클래스 상속 받아 예외 처리 클래스 생성
class MyException extends Exception
{
    public function myMessage($my_msg) { return $my_msg; }
}


$msg = "예외 클래스 오류 발생";
$code = 123;
$e = new MyException($msg, $code);

echo $e->myMessage("Exception 클래스 상속 받음");
echo "<br/>";
echo "Exception : ".$e->getMessage();
echo "<br/>";
echo "Exception Code : ".$e->getCode();