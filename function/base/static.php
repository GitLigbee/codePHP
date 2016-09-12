<?php

class sta{
    public $temp = 123;
    static $type = 100;
    static function stat(){
        $me = new self;
        echo 'common val:'.$me->temp."</br>";
        echo 'static val:'.sta::$type."<hr>";
        echo 'static val:'.$me::$type."<hr>";
    }
}

echo 'sta:'.sta::$type."</br>";
echo sta::stat();

$a = new sta();
echo 'a:'.$a::$type."</br>";

$b = new sta();
$a::$type = 200;
echo 'b:'.$b::$type."</br>";