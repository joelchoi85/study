<?php
namespace AnswerBook\PHP;
include './goBack.php';

class Student {
    public function __construct( protected $name ) {}
    public function name() { return 'PHP namespace '.$this->name; }
}

namespace AnswerBook\PYTHON;

class Student {
    public function __construct( protected $name ) {}
    public function name() { return 'PYTHON namespace '.$this->name; }
}



$php = new \AnswerBook\PHP\Student('피에이치피');
echo 'echo $php->name() ==><br/>'.$php->name().'<br/>';

$php = new \AnswerBook\PYTHON\Student('파이썬');
echo 'echo $php->name() ==><br/>'.$php->name().'<br/>';