<?php

class base{
    
    public $name;
    
    function __construct($name){
        $this->name = $name;
        echo 'obj '.$this->name.' have built'.'</br>'.'</br>';
    }
    function __destruct(){
        echo 'obj '.$this->name.' have destroyed'.'</br>'.'</br>';
    }
}

$a = new base('a');
$b = new base('b');
$c = new base('c');

unset($b);
$c = 'd';