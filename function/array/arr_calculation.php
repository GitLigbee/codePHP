<?php

$arr = array(1,2,3);
$arr1 = array(3,2,1);
$arr2 = array('1','2','3');
$arr3 = array('one'=>1,'two'=>2,'three'=>3);

if($arr == $arr1){
    echo '$arr == $arr1'.'</br>';
}else{
    echo '$arr != $arr1'.'</br>';
}


if($arr == $arr2){
    echo '$arr == $arr2'.'</br>';
}

if($arr === $arr1){
    echo '$arr === $arr1'.'</br>';
}else{
    echo '$arr !== $arr1'.'</br>';
}


if($arr === $arr2){
    echo '$arr === $arr2'.'</br>';
}else{
    echo '$arr !== $arr2'.'</br>';
}

$a = $arr + $arr1;
echo '<pre>';
var_dump($a);
echo '<pre/>';

$a = $arr1 + $arr;
echo '<pre>';
var_dump($a);
echo '<pre/>';

$a = $arr + $arr2;
echo '<pre>';
var_dump($a);
echo '<pre/>';

$a = $arr + $arr3;
echo '<pre>';
var_dump($a);
echo '<pre/>';