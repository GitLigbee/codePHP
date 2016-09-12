<?php

    $str = '2014-11-25';
    $preg = '/(-)/';
    $temp = 'Year';
    echo preg_replace($preg,$temp.'${1}',$str);
    
    echo '<br>';

    $preg = array(
        '/(\d+)/'
    );
    $temp = array(
        'temp[${1}]'
    );
    echo preg_replace($preg,$temp,$str);
?>