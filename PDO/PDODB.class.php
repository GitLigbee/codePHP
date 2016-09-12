<?php
header('content-type:text/html;charset=utf-8');
    class PDODB{
        static private $_init;
        private $_host;
        private $_port;
        private $_dbname;
        private $_username;
        private $_password;
        private $_charset;
        private $_dns;
        private $_pdo;
        
        private function __construct($config){
            $this->_initParamas($config);
            $this->_initDNS();
            $this->_initDriverOptions();
            $this->_initPDO();
        }
        private function __clone(){}
        
        static public function getInstance($config){
            if(!static::$_init instanceof static){
                static::$_init = new static($config);
            }
            return static::$_init;
        }
        
        private function _initParamas($config){
            $this->_host = isset($config['host'])?$config['host']:'localhost';
            $this->_port = isset($config['port'])?$config['port']:'3306';
            $this->_dbname = isset($config['dbname'])?$config['dbname']:'';
            $this->_username = isset($config['username'])?$config['username']:'root';
            $this->_passward = isset($config['passward'])?$config['passward']:'';
            $this->_charset = isset($config['charset'])?$config['charset']:'utf8';
        }
        private function _initDNS(){
            $this->_dns = "mysql:host=$this->_host;port=$this->_port;dbname=$this->_dbname";
        }
        private function _initDriverOptions(){
            $this->_driverOptions = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "set names $this->_charset"
            );
        }
        private function _initPDO(){
            $this->_pdo = new PDO($this->_dns,$this->_username,$this->_passward,$this->_driverOptions) or die("fail");
        }
        
        public function query($sql){
            if(!$result = $this->_pdo->query($sql)){
                $erro = $this->_pdo->errorInfo();
                echo '失败的语句'.$sql.'<br>';
                echo '错误代码'.$erro[1].'<br>';
                echo '错误信息'.$erro[2].'<br>';
                die;
            }
            return $result;
        }
        
        public function fetchAll($sql){
            $res = $this->query($sql);
            $list = $res->fetchAll(PDO::FETCH_ASSOC);
            $res->closeCursor();
            return $list;
        }
        public function fetchRow($sql){
            $res = $this->query($sql);
            $row = $res->fetch(PDO::FETCH_ASSOC);
            $res->closeCursor();
            return $row;
        }
        public function fetchOne($sql){
            $res = $this->query($sql);
            $one = $res->fetchColumn();
            $res->closeCursor();
            return $one;
        }
        public function escape_string($data){
            return $this->_pdo->quote($data);
        }
    }
    $config = array(
        "host"=>"localhost",
        "username"=>"root",
        "passward"=>"root",
        "dbname"=>"students"
    );
    $pdo = PDODB::getInstance($config);
    $sql = "select sdept from student where sage=21";
    var_dump($pdo->fetchRow($sql));
?>