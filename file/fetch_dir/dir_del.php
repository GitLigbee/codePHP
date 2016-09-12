<?php
showDir('../../file/sim');
function showDir($path,$dep=0){
    $pos = opendir($path);
    while(false!==$file=readdir($pos)){
        if($file=='.'||$file=='..') continue;
//        echo str_repeat("&nbsp",$dep*4),$file.'</br>';
        if(is_dir($path.'/'.$file)){
            $func = __FUNCTION__;
            $func($path.'/'.$file,$dep+1);
        }else{
            unlink($path.'/'.$file);
        }
    }
    rmdir($path);
    closedir($pos);
}