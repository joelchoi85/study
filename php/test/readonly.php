<?php
include 'goBack.php';

class Example
{
    public readonly string $str; // readonly 속성, +초기값을 가지지 못함
    public function say(string $str) { $this->str = $str; } // 책에 오타 있음 $this->say 아님
}

//$str = 'Hello World';
$example = new Example;
$example->say(str: "HELL"); // 수정은 한 번 밖에 못함
# $example->say(str:"php"); // Uncaught Error: Cannot modify readonly property

echo $example->str;
