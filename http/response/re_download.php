<?php
$file = './2015-10-21_150123.png';

header('Content-Disposition:Attachment;filename='.basename($file));

$finfo = new Finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file);
//echo $mime;
header('Content-Type: '.$mime);
header('Content-Length: '.filesize($file));

$mo = 'rb';
$link = fopen($file,$mo);
while(!feof($link)){
    echo fgets($link,1024);
}
fclose($link);