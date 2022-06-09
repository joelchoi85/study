<?php
include "AnswerBook/user.php";
include "AnswerBook/PHP/user.php";
include "AnswerBook/PYTHON/user.php";

use AnswerBook\User as User;
use AnswerBook\PHP\User as PhpUser;
use AnswerBook\Python\User as PyUser;

$user1 = new User();
echo $user1->getNamespaceName()."<br/>";

$user2 = new PhpUser();
echo $user2->getNamespaceName()."<br/>";

$user3 = new PyUser();
echo $user3->getNamespaceName()."<br/>";