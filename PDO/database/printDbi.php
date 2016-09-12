<?php
    function printdbi($sql_name){
        $mysqli=new mysqli("localhost","root","root","phpsql");
        if(!$mysqli){
            echo "连接失败".$mysqli->connect_error;
        }
        
        $sql="select * from $sql_name";
        $res=$mysqli->query($sql);
        /*
        echo $res->num_rows;
        echo $res->field_count;
        */
        echo "<table>";
        
            echo "<tr>";
                while($field=$res->fetch_field()){
                    echo "<td>$field->name<td/>";
                }
            echo "<tr/>";
            while($row=$res->fetch_row()){
                echo "<tr>";
                    foreach($row as $val){
                        echo "<td>$val<td/>";
                    }
                echo "<tr/>";
                
            }
        echo "<table/>";
        $res->free();
        $mysqli->close();
    }
    printdbi("stu");
?>