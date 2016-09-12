<?php
$dom = new domdocument();
$dom->preserveWhiteSpace=false;
$dom->load('save.xml');

$root = $dom->documentElement;

tree($root);

function tree($root){
    echo "<ul>";
    if($root->nodeType==3){
        echo "<li>";
        echo $root->nodeValue;
        echo "</li>";
    }else{
        echo "<li>";
        echo $root->nodeName;
        echo "</li>";
        //判断是否存在属性
        if($root->attributes->length>0){
            foreach($root->attributes as $attr){
                echo "<li>";
                //获取属性值
                echo $attr->value;
                echo "</li>";
            }
        }
        foreach($root->childNodes as $child){
            tree($child);
        }
    }
    echo "</ul>";
}