<?php
//工厂模式
class factory{
    function __construct($name){
        if(file_exists('./'.$name.'.class.php')){
            return new $name;
        }else{
            die('not exist');
        }
    }
}
//单例模式
class instance{
    public $val = 10;
    private static $instance ;
    private function __construct(){}
    private function __clone(){}
    //设置为静态方法才可被类调用
    public static function getInstance(){
        /*if(!isset(self::$instance)){
            self::$instance = new self;
        }*/
        if(!isset(instance::$instance)){
            instance::$instance = new self;
        }
        return instance::$instance;
    }
}

$obj_one = instance::getInstance();
$obj_one->val = 20;
//clone可以调用__clone()克隆即new出一个新的的对象
//$obj_two = clone $obj_one;
$obj_two = instance::getInstance();
echo $obj_two->val;
echo '<p>';
var_dump($obj_one,$obj_two);