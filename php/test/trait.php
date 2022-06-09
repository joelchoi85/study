<?php
include './goBack.php';
echo '<p style="color:grey">trait은 클래스와 비슷 use로 상속 받아 사용.<br/> 인터페이스에서는 메서드 선언 밖에 못 하지만 trait에서는 구현까지 가능<br/></p>';

trait Dog
{
    public string $type;
    public string $name;
    public int $age;

    public function describe(){ echo "{$this->type}의 이름은 {$this->name}. {$this->age}살<br/>";}
}

trait say
{
    abstract public function greet();
}

class Animal
{
    use Dog, Say; // 선언한 trait 사용

    public function greet()
    {
        echo "walwal<br/>";
    }
}

$animal = new Animal;
$animal->type = "개";
$animal->name = "찡찡이";
$animal->age = 245;

$animal->describe();
//$animal->greet();
