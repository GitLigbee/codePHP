<?php
class bee{
	public $a = 1;
	protected $b = 2;
	private $c = 3;
}
$obj = new bee();
foreach($obj as $key => $val){
    echo $key.'-'.$val;
}