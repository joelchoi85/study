<?php
include 'goBack.php';

abstract class Animal // 추상 클래스
{
    public string $type;
    public string $name;
    public int $age;

    public function describe() // 비추상 메서드
    {
        echo "{$this->type}의 이름은 {$this->name}. 올해 내 나이가..{$this->age}살 쯤 되었을라나<br/>";
    }

    abstract public function greet(); // 추상 메서드
}

class Dog extends Animal
{
    public function greet() { echo "wal wal~<br/>"; } // 상속 받은 추상 클래스의 추상 메서드 구현.. 안하면 에러
}

$animal = new Dog;
$animal->type = "개";
$animal->name = "강달이";
$animal->age = 3;

$animal->describe();
$animal->greet();