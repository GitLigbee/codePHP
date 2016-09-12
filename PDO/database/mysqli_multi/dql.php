<?php
    header("Content-type:text/html;charset=utf-8");
    $mysqli=new mysqli("localhost","root","root","phpsql");
    if(!$mysqli){
        die("操作失败".$mysqli->connect_error);
    }
    
    $sqls="select * from lib;";
    $sqls.="select * from stu";
    
    $res=$mysqli->multi_query($sqls);
    if(!$res){
        die("lose^_^");
    }
    /*
    echo("success");
    die();*/
    do{
        $result=$mysqli->store_result();
        while($row=$result->fetch_row()){
            foreach($row as $val=>$key){
                echo $key;
            }
        echo "<br/>";
        }$result->free();
        echo "<br/>";
        if(!$mysqli->more_results()){
            break;
        }
    }while($mysqli->next_result());
?>