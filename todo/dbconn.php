<?php
$host = '127.0.0.1';
$user = 'root';
$pw = '124578986532';
$db = 'calvary';

$conn = new mysqli($host, $user, $pw, $db);

$conn ?: die("connection error : ".$conn->error);

 ini_set('display_errors', 'Off'); // PHP 오류 메시지 숨김
session_start();