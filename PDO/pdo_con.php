<?php 

	try {
		$dsn = "mysql:host=localhost; port=3306; dbname=wsq_hotel; charset=utf-8";
		$user = 'root';
		$psw ='root';
		$pdo = new PDO($dsn,$user,$psw);
		$sql = 'select goods_prices from wsq_goods_info where goods_id=2';
		// $sql = "show database";
		$res = $pdo->query($sql) or var_dump($pdo->errorInfo());
		// var_dump($res);
		$mon = $res->fetch(PDO::FETCH_ASSOC);
		echo $mon['goods_price'];
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
 ?>