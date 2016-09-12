<?php
$dom = new domdocument();
$dom->preservewhitespace = false;
$dom->load('save.xml');

$xpath = new domxpath($dom);
//根据路径查找
$path = '/books/book/name';
res($path,$xpath);
//路径基础上增加属性过滤 @type <>= val
$path = "/books/book[@type='client']/name";
res($path,$xpath);
//路径基础上增加位置选择 索引从0开始，位置从1开始
$path = "/books/book[position()=2]/name";
res($path,$xpath);

//路径基础上选择最后一个位置
$path = "/books/book[last()]/name";

function res($path,$xpath){
    
   $res = $xpath->query($path);
   foreach($res as $node){
    echo $node->nodeValue,'<br/>';
   }
    echo '<hr>';
}
