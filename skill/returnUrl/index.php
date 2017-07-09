<?php
class ReturnUrl
{
    public function member(Login $login)
    {
        $guest = $login->isGuest;
        if($guest) {
            $url = $_SERVER['REQUEST_URI'];
            $login->setSession('url', $url);
            $host = $_SERVER['HTTP_HOST'];
            header('Location:http://'. $host, true, 302);
        } else {
            echo "I'm a member";
        }
    }

    public function login(Login $login)
    {
        if($login->isGuest)
            $login->getPage();
        else
            echo "You have logined";
    }

    public function logout(Login $login)
    {
        $login->logout();
    }

    public function validate(Login $login)
    {
        $password = $_GET['password'] ?? '';
        $result = $login->validate($password);
        if ($result) {
            $returnUrl = 'http://'. $_SERVER['HTTP_HOST']. $login->url;
            header('Location:'. $returnUrl, true, 302);
        }
    }
}
$methods = ['login', 'member', 'validate', 'logout'];
$fn = isset($_GET['method']) ? (in_array($_GET['method'], $methods) ? $_GET['method'] : 'login') : 'login';
(new ReturnUrl())->$fn(new Login());

class Login
{
    public $password = 'ruturnurl';

    public function __construct()
    {
        @session_start();
    }

    public function validate($password)
    {
        if(strcmp($password, $this->password)) {
            $this->login();
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        $this->setSession('id', 'success');
    }

    public function logout()
    {
        unset($_SESSION['id']);
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function __get($key)
    {
        $fn = 'get'. ucfirst($key);
        return $this->$fn();
    }

    public function getIsGuest()
    {
        return isset($_SESSION['id']) ? false : true;
    }

    public function getUrl()
    {
        return isset($_SESSION['url']) ? $_SESSION['url'] : '';
    }

    public function getPage()
    {
        $form = '
        <form action="" method="get">
            输入密码：<input type="password" name="password">
            <input type="submit" value="submit">
            <input type="hidden" value="validate" name="method">
        </form>
        ';
        die($form);
    }
}