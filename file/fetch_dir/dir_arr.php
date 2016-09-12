<?php
$res = showDir('../../file');
echo '<pre>';
print_r($res);
function showDir($path){
    $pos = opendir($path);
    $next = array();
    while(false!==$file=readdir($pos)){
        if($file=='.'||$file=='..') continue;
        $fileinfo = array();
        
        $fileinfo['name'] = $file;
        
        if(is_dir($path.'/'.$file)){
            $fileinfo['type'] = 'dir';
            $func = __FUNCTION__;
            $fileinfo['next'] = $func($path.'/'.$file);
        }else{
            $fileinfo['type'] = 'file';
        }
        $next[] = $fileinfo;
    }
    closedir($pos);
    return  $next;
}