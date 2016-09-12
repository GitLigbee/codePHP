<?php
//抑制XML错误，便于代码自行处理错误
libxml_use_internal_errors(true);
$sim = simplexml_load_file('save.xml');

if(!$sim){
    $errors = libxml_get_errors();
    foreach($errors as $err){
        echo $err->message.'</br>';
    }
}else{
    foreach($sim->book as $book){
        echo $book->name.'</br>';
    }
}