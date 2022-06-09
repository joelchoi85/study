<?php
include './goBack.php';

$str = "hEllO gnuWhz.com";

echo strtr(string: $str, from: 'hello', to:'Welcume');

// 1:N 치환

// 모든 h 는 W 로
// 모든 e 는 e 로
// 모든 l 은 l 로
// 하지만 다시 적용돼 모든 l 은 c 로
// 모든 o는 u로
// 대소문자 구분함


// 결과값 : WEccO gnuWWz.cum

// 문자열 배열로 치환하면 각 단어끼리만 변경