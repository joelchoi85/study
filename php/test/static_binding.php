<?php
include './goBack.php';

class MyClass
{
    public static $message = "Hello";
    public static function say() {
        return self::$message; // static prop에 접근할 땐 :: 을 사용
    }
}

echo MyClass::say();

echo '<br/>';


class A
{
    public static function myFunc() { static::say(); }
    public static function say() { echo "부모 호출<br/>"; }
}

class B extends A
{
    public static function test()
    {
        A::myFunc();
        parent::myFunc();
        self::myFunc();
    }

    public static function say() { echo "자식 호출<br/>"; }
}

b::test();