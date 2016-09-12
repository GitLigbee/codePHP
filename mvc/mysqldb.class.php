<?php 

class mysqldb{
	private $arr = array(
		'port' => 3306,
		'host' => 'localhost',
		'username' => 'root',
		'passward' => 'root',
		'dbname' => 'instance',
		'charset' => 'utf8'
		 );
	private $link;
	static $instance;
	private function __clone(){}
	private function __construct(){
		$this->link = mysql_connect($this->arr['host'],$this->arr['username'],$this->arr['passward']) or die(mysql_error());
		mysql_select_db($this->arr['dbname']) or die('db error');
		mysql_set_charset($this->arr['charset']);
	}
	static public function getInsance(){
		if(!isset(mysqldb::$instance)){
			mysqldb::$instance = new self;
		}
		return mysqldb::$instance;
	}
	public function query($sql){
		if($res = mysql_query($sql)){
			return $res;
		}return false;
	}
	//fetch one
	public function get_one($sql){
		$res = $this->query($sql);
		if($result = mysql_fetch_row($res)){
			return $result[0];
		}
	}
	//fetch row
	public function get_row($sql){
		$res = $this->query($sql);
		if($result = mysql_fetch_assoc($res)){
			return $result;
		}
		return false;
	}
	//fetch all
	public function get_all($sql){
		$res = $this->query($sql);
		$arr = array();
		while($result = mysql_fetch_assoc($res)){
			$arr[] = $result;
		}
		return $arr;
	}
}
/*$mysql = mysqldb::getInsance();
$sql = 'select m.m_id,t.t_name as t1,m.t1_score,a.t_name as t2,m.t2_score,m.m_time from  tch as m left join team as t on m.t1_id=t.t_id left join team as a on m.t2_id=a.t_id';
$res = $mysql->get_all($sql);*/
 // var_dump($res);

 ?>

 