<?php

/*
class bee{
    public $a = 1;
    public function f(){
        echo $this->a;
        echo '<br>';
        @lig::f();
    }
}

class lig{
    public $a = 2;
    public function f(){
        echo $this->a;
    }
}

$obj = new bee();
$obj->f();
*/
class bee{
    static public $a = 10;
    static public function f(){
        echo get_class().':';
        echo self::$a.'-';
        echo static::$a;
    }
}
class lig extends bee{
    static public $a = 20;
    
}

echo bee::f();
echo '<br>';
echo lig::f();