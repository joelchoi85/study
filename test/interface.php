<?php
include 'goBack.php';

interface WebApp
{
    public function register($id, $password, $name); // 어디서든 접근 가능한 public으로 선언해야함
    public function login($id, $password);
    public function logout($id);
}

interface CMS
{
    public function post($subject);
}


class WebSite implements WebApp, CMS
{
    public function register($id, $password, $name)
    {
        echo "사용자 등록 : 아이디 ={$id}, 이름={$name}</br>";
    }

    public function login($id, $password)
    {
        echo "로그인 : {$id}です<br/>";
    }

    public function logout($id)
    {
        echo "로그아웃 : {$id}<br/>";
    }

    public function post($subject)
    {
        echo "게시물 등록 : {$subject}<br/>";
    }
}

$website = new WebSite;

$id = 'hong';
$password = 203457;
$name = '홍길똥';
$subject = '게시물이야';

$website->register(id:$id, password:$password, name:$name);
$website->login(id:$id, password: $password);
$website->post(subject:$subject);
$website->logout(id:$id);
