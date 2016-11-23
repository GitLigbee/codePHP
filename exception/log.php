<?php
class LogExpection extends Exception
{
    public function __construct($message, $code = 0, $file='./log.txt')
    {
        parent::__construct($message, $code);
        $this->log($file);
    }
    public function log($file)
    {
        // file_put_contents($file, $this->__toString(), FILE_APPEND);
        $link = fopen($file, 'w+');
        fwrite($link, $this->__toString().PHP_EOL);
        fwrite($link, 'getMessage : '.$this->getMessage().PHP_EOL);
        fwrite($link, 'getFile : '.$this->getFile().PHP_EOL);
        fwrite($link, 'getCode : '.$this->getCode().PHP_EOL);
        fwrite($link, 'getLine : '.$this->getLine().PHP_EOL);
        fwrite($link, 'getTraceasString : '.$this->getTraceasString().PHP_EOL);
        fclose();
    }
}
error_reporting(0);
try{
    if(!mysqli_connect('127.0.0.1','root','root','db')){
        throw new LogExpection('connect fail', 4);
    }
}catch(Exception $e){
    echo $e->getmessage();
}