<?php
    header("Cache-Control:no-cache,must-revalidate");
    $mysqli = new mysqli("localhost","root","root","phpsql");
    if($mysqli->connect_error){
        die("data errot".$mysqli->connect_error);
    }
    $name=$_GET['name'];
    
    $sql="select * from lib where name='$name'";

    $res=$mysqli->query($sql);
    $num=$mysqli->affected_rows;
    if($num>0){
        echo 1;
    }else{
        echo 0;
    }
?>