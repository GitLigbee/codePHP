<?php 
	require_once DIR.'/mysqldb.class.php';
	class model{
		protected $db;
		public function __construct(){
			$this->initDb();
		}
		public function initDb(){
			$this->db = mysqldb::getInsance();
		}
	}

 ?>