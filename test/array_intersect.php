<?php
include './goBack.php';

$fruits = [
    'apple' => '사과',
    'banana' => '바나나',
    'grape' => '생과일'
];

$fr = [
    'banana' => '바나나',
    'grape' => '포도',
    'ginger' => '생강'
];

print_r(array_intersect_key($fruits, $fr));


// array_intersect, array_intersect_assoc 은 키+값 둘 다 같아야 교집합에 추가됨
// array_intersect_key 는 키만 같으면 교집합 배열에 추가, 첫번째 파라미터만 살림