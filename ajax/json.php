<?php

    $mysqli = new mysqli("localhost","root","root","phpsql");
    $sql = "select * from stu";
    $res = $mysqli->query($sql);
    while($row=$res->fetch_assoc()){
        $data[]=$row;
    }
    $res->free();
    $mysqli->close();
    echo json_encode($data);
?>