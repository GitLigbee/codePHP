<?php
    $mysql=new mysqli("localhost","root","root","phpsql");
    if(!$mysql){
        die("操作失败".$mysqli->connect_error);
    }
    /*$sqls="insert into stu (name,passward,email,age) values('a',md5('213'),'faa@qq.com',12);";
    $sqls.="insert into stu (name,passward,email,age) values('d',md5('5435'),'af@qq.com',4);";
    $sqls.="insert into stu (name,passward,email,age) values('f',md5('4322'),'afjoj@qq.com',90)";*/
    
    $sqls="insert into lib (name,age) values('a',12);";
    $sqls.="insert into lib (name,age) values('d',4);";
    $sqls.="insert into lib (name,age) values('f',90)";

    $res=$mysql->multi_query($sqls);
    if(!$res){
        die("操作失败");    
    }
?>