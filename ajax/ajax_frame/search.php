<?php
    header("Content-type:text/html;charset=utf-8");
    $data = array();
    $word = $_POST['word'];
    $mysqli = new mysqli("localhost","root","root","phpsql");
    $sql = "select type_name from tdb_goods_types where type_name like '%$word%'";

    $res = $mysqli->query($sql);

    while($row = $res->fetch_assoc()){
        $data[] = $row;
    }

    $mysqli->close();
    $res->free();
    echo urldecode(json_encode(urlencode($data)));
//    echo json_encode($data);
?>