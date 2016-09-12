<?php
$dom = new DOMDocument();
//加载xml文件
$dom->load('save.xml');
//获取元素节点
$res = $dom->getElementsByTagName('book');
for($i=0;$i<$res->length;$i++){
    echo $res->item($i)->getElementsByTagName('name')->item(0)->nodeValue;
}