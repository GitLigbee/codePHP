<?php
class FrontController
{
    protected $_controller, $_action, $_params, $_body;
    static $_instance;

    public static function getInstance()
    {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/', trim($request, '/'));
        // $this->_controller = $splits[0]??'index';
        $this->_controller = 'IndexController';
        // $this->_action = $splits[1]??'index';
        $this->_action = 'index';
        // print_r($splits);
        if(!empty($splits[2])){
            $keys = $values = array();
            for($idx=2, $cnt=count($splits); $idx<$cnt; $idx++){
                if($idx%2 == 0){
                    //偶数索引号指的是键值
                    $keys[] = $splits[$idx];
                }else{
                    //奇数索引号指的是数值
                    $values[] = $splits[$idx];
                }
            }
            $this->_params = array_combine($keys, $values);
        }
    }

    public function route()
    {
        if(class_exists($this->getController())){
            $rc = new ReflectionClass($this->getController());
            if($rc->implementsInterface('IController')){
                if($rc->hasMethod($this->getAction())){
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod($this->getAction());
                    $method->invoke($controller);
                }else{
                    throw new Exception("Action");
                }
            }else{
                throw new Exception("Interface");
            }
        }else{
            throw new Exception("Controller");
        }
    }

    public function getParams()
    {
        return $this->_params;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function setBody($body)
    {
        $this->_body = $body;
    }
}