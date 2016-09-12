<?php
$str = time();
$path = './time.txt';

echo '<hr>';

file_put_contents($path,$str);
echo file_get_contents($path);

echo '<hr>';

file_put_contents($path,"\r".$str,FILE_APPEND);
echo file_get_contents($path);
