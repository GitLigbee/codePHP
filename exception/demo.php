<?php
error_reporting(0);
try{
    if(!mysqli_connect('127.0.0.1','root','root','db')){
        throw new Exception('connect fail');
    }
}catch(Exception $e){
    echo $e->getmessage();
}