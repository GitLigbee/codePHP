<?php
//四个变量分别代表四盏灯的开关
$l_one = 1;
$l_two = 2;
$l_three = 4;
$l_four = 8;
//$sta代表四盏灯的状态
$sta = 3;
//输出灯开的号码
light_sta($sta);
//若要开启第四盏灯
echo '开启第四盏灯:';
$sta_n = $sta|$l_four;
light_sta($sta_n);

//若要关闭第一盏灯
echo '关闭第一盏灯:';
$sta_o = $sta&~$l_one;
light_sta($sta_o);

//输出灯开的号码
function light_sta($sta){
    
    //四个变量分别代表四盏灯的开关
    $l_one = 1;
    $l_two = 2;
    $l_three = 4;
    $l_four = 8;
    
    echo 'light on: ';
    if($sta&$l_one){
        echo '1 ';
    }if($sta&$l_two){
        echo '2 ';
    }if($sta&$l_three){
        echo '3 ';
    }if($sta&$l_four){
        echo '4';
    }
    echo '</br>';
}