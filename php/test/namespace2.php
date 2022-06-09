<?php
include "./goBack.php";
include "AnswerBook/user.php";
include "AnswerBook/PHP/user.php";
include "AnswerBook/PYTHON/user.php";

$user1 = new \AnswerBook\User();
echo $user1->getNamespaceName()."<br/>";

$user2 = new \AnswerBook\PHP\User();
echo $user2->getNamespaceName()."<br/>";

$user3 = new \AnswerBook\PYTHON\User(); // 전역에서 네임스페이스 찾아서 불러들이기 -> 네임스페이스 앞에 \
echo $user3->getNamespaceName()."<br/>";