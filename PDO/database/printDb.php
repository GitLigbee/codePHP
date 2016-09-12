<?php
    function printDb($sqlname){
        
        $conn=mysql_connect("localhost","root","root");
        if(!$conn){
            die("链接失败".mysql_error());
        }
        mysql_select_db("phpsql");
        mysql_query("set names utf8");
        $sql="select * from $sqlname";
//        $sql="desc $sqlname";
        $res=mysql_query($sql,$conn);
        
        $rows=mysql_affected_rows($conn);
        $colums=mysql_num_fields($res);
        
        echo "<table><tr>";
            for($i=0;$i<$colums;$i++){
            $fname=mysql_field_name($res,$i);
            echo "<td>$fname<td/>";
        }
        echo "<td/>";
        while($row=mysql_fetch_row($res)){
            echo "<tr>";
            for($i=0;$i<$colums;$i++){
                echo "<td>$row[$i]<td/>";
            }
            echo "<tr/>";
        }
        echo "<table/>";
    }
    printDb("stu");
?>