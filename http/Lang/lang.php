<?php
$lang = array('zh_CN','en_US');
$default_lang = 'zh_cn';
$browser_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
//echo $browser_lang;
$_lang = explode(',',$browser_lang);
//print_r($_lang);
$request_lange = array_map('func',$_lang);
print_r($request_lange);
function func($lang){
    $arr = explode(';',$lang);
    return str_replace('-','_',$arr[0]);
}
foreach($request_lange as $val){
    if(in_array($val,$lang)){
        $show_lang = $val;
    }
}
$show_lang = isset($show_lang)?$show_lang:$default_lang;
echo $show_lang;