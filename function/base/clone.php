<?php

class B{
    public $val = 10;
}

class A{
    public $val = 20;
    public $b;
    public function __construct(){
        $this->b = new B();
    }
    public function __clone(){
        $this->b = clone $this->b;
    }
}

$obj_a = new A();
$obj_b = clone $obj_a;
$obj_a->val = 30;
$obj_a->b->val = 40;

var_dump($obj_a);
echo '<br>';
var_dump($obj_b);