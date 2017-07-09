<?php
// http://www.jianshu.com/p/f339fc8d006c
// http://www.nonb.cn/blog/php-png-xml-cdata.html
// http://www.cnblogs.com/rhythmK/p/5426050.html
$bigImgPath = 'backgroud.png';
$img = imagecreatefromstring(file_get_contents($bigImgPath));

$font = 'msyhl.ttc';//字体
$black = imagecolorallocate($img, 0, 0, 0);//字体颜色 RGB

$fontSize = 20;   //字体大小
$circleSize = 60; //旋转角度
$left = 50;      //左边距
$top = 150;       //顶边距

imagefttext($img, $fontSize, $circleSize, $left, $top, $black, $font, 'Rhythmk| 坤');

list($bgWidth, $bgHight, $bgType) = getimagesize($bigImgPath);
switch ($bgType) {
    case 1: //gif
        header('Content-Type:image/gif');
        imagegif($img);
        break;
    case 2: //jpg
        header('Content-Type:image/jpg');
        imagejpeg($img);
        break;
    case 3: //jpg
        header('Content-Type:image/png');
        imagepng($img);
        break;
    default:
        break;
}
imagedestroy($img);

/*
$bigImgPath = 'backgroud.png';
$qCodePath = 'qcode.png';
 
$bigImg = imagecreatefromstring(file_get_contents($bigImgPath));
$qCodeImg = imagecreatefromstring(file_get_contents($qCodePath));
 
list($qCodeWidth, $qCodeHight, $qCodeType) = getimagesize($qCodePath);
// imagecopymerge使用注解
imagecopymerge($bigImg, $qCodeImg, 200, 300, 0, 0, $qCodeWidth, $qCodeHight, 100);
 
list($bigWidth, $bigHight, $bigType) = getimagesize($bigImgPath);
 
 
switch ($bigType) {
    case 1: //gif
        header('Content-Type:image/gif');
        imagegif($bigImg);
        break;
    case 2: //jpg
        header('Content-Type:image/jpg');
        imagejpeg($bigImg);
        break;
    case 3: //jpg
        header('Content-Type:image/png');
        imagepng($bigImg);
        break;
    default:
        # code...
        break;
}
 
imagedestroy($bigImg);
imagedestroy($qcodeImg);
*/

/*
function GrabImage($url,$filename) {  
    if($url==""):return false;endif;  
    ob_start();  
    readfile($url);  
    $img = ob_get_contents();  
    ob_end_clean();  
    $size = strlen($img);  
    //"../../images/books/"为存储目录，$filename为文件名 
    $fp2=@fopen("../../images/books/".$filename, "a");  
    fwrite($fp2,$img);  
    fclose($fp2);  
    return $filename;  
}  
*/