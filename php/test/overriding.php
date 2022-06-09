<?php
declare(strict_types=1);
include ('./goBack.php');

// 정확한 유형의 변수만 허용 else TypeError

echo "<br/>";
class Parents
{
    public string $txt = "부모클래스 Props :";
    public function name() : string { return "{$this->txt} 부모 메서드임<br/>"; }
    public function age($age) : string { return "{$this->txt} 나이는 {$age}임<br/>"; }
}

class Child extends Parents
{
    public string $txt = "자식 Props :";
    public function name() : string { return "{$this->txt} 자식 메서드임<br/>"; } // 오버라이딩
}


$parents = new Parents;
$child = new Child;

echo $parents->name(); // 결과값-----------------------------------> 부모클래스 Props : 부모 메서드임
echo $child->name(); // 자식 클래스에서 메서드 오버라이딩 결과값------> 자식 Props : 자식 메서드임
echo $child->age(38); // 부모 클래스 메서드를 당겨와서 사용, 결과값---> 자식 Props : 나이는 38임
?>