<?php
//$sim = simplexml_load_file('save.xml');

$xml = file_get_contents('save.xml');
$sim = new simplexmlelement($xml);

//$sim = simplexml_load_string($xml);

echo '<pre>';
//var_dump($sim);
var_dump($sim->book);
/*echo $sim->book->name;
$attr = $sim->book->attributes();
//var_dump($attr);
echo $attr->type;*/
foreach($sim->book as $book){
    $attr = $book->attributes();
    echo $attr->type;
    echo '-';
    echo $book->name;
    echo '</br>';
}

//添加节点
//返回一个simpleXML对象
$book = $sim->addChild('book');
$book->addChild('name','node');
$book->addAttribute('type','web');
$sim->saveXML('save.xml');

//更新节点
$length = count($sim->book);
$sim->book[$length-1]->name.='.js';
$sim->saveXML('save.xml');

//删除节点
for($i=count($sim->book)-1;$i>=0;$i--){
    $book = $sim->book[$i];
    $attr = $book->attributes();
    if($attr->type=='web'){
        unset($sim->book[$i]);
    }
}
$sim->saveXML('save.xml');