<?php
session_start();
interface ILogin
{
    const user = 'ligbee';
    const pass = 'ligbee';
}

class DomainA implements ILogin
{
    private $user;
    private $pass;

    public function __construct()
    {
        $this->user = ILogin::user;
        $this->pass = ILogin::pass;
    }

    public function check($user, $pass)
    {
        return $this->user == $user && $this->pass == $pass;
    }
}
if(isset($_SESSION['login'])){
    echo 'login out';
    unset($_SESSION['login']);
}else{
    $user = $_GET['user']??'';
    $pass = $_GET['pass']??'';
    if(empty($user)){
        // echo $_GET['redirect_url'];die;
        // header("Location:http://www.site.com/codePHP/crossDomain/index.html?redirect_url=".$_GET['redirect_url']);
        include './domain.html';
    }else{
        $domain = new DomainA();
        $res = $domain->check($user,$pass);
        if($res){
            $_SESSION['login'] = true;
            if(!empty($_GET['redirect_url'])){
                $url = "http://www.".$_GET['redirect_url']."?session_id=".session_id();
                header("Location:$url");
            }
            echo 'login success,session_id:'.session_id();
        }else{
            echo 'the user or pass of account is error';
        }
    }
    
}
