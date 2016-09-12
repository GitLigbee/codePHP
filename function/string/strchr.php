<?php

    $fix = 'b.class.php';
    echo strchr($fix,'.');
    echo '</br>';
    echo strrchr($fix,'.');
    echo '</br>';
    $pathinfo = pathinfo($fix); 
    var_dump($pathinfo);
    echo '</br>';
    echo $pathinfo['extension'];
?>