<?php
$book = array(
    array('name'=>'php','type'=>'web'),
    array('name'=>'java','type'=>'web'),
    array('name'=>'html','type'=>'client')
);
//创建xml文档对象
$dom = new domdocument('1.0','utf-8');
$dom->formatOutput = true;
//创建节点
$books = $dom->createElement('books');
foreach($book as $k=>$v){
    $book = $dom->createElement('book');
    $name = $dom->createElement('name',$v['name']);
    //添加子节点
    $books->appendChild($book);
    $book->appendChild($name);
    //添加属性
    $book->setAttribute('type',$v['type']);
}
$dom->appendChild($books);
//保存xml文件
$dom->save('save.xml');
echo 'save succ';
