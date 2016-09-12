<?php

class bee{
    public $ol = array();
    public function __get($key){
        if(isset($this->ol[$key])){
            return $this->ol[$key];
        }
        return $key.' not exists';
    }
    public function __set($key,$val){
        $this->ol[$key] = $val;
    }
    public function __isset($key){
        if(isset($this->ol[$key])){
            return true;
        }
        return false;
    }
    public function __unset($key){
        unset($this->ol[$key]);
    }
    public function __call($name,$arr){
        echo '<br>';
        echo 'function '.$name.' not exist';
    }
    static function __callStatic($name,$arr){
        echo '<br>';
        echo 'function '.$name.' not exist';
    }
    /*public function __call($name,$arr){
        $num = count($arr);
        if($num<1){
            $name();
        }else{
            $name = $name.'_one';
            $name($arr[0]);
        }
    }*/
}

$obj = new bee();
echo $obj->one;
echo '<br>';
$obj->one = 1;
echo $obj->one;
echo '<br>';
var_dump(isset($obj->one));

$obj->func();
bee::staFunc();
/*$obj->func(1);

function func(){
    echo '<br>';
    echo 'no.0';
}
function func_one($val){
    echo '<br>';
    echo 'no.'.$val;
}*/
