<?php
    $conn=mysql_connect("127.0.0.1","root","root");
if(!$conn){
    die("链接失败".mysql_error());
}
mysql_select_db("phpsql");
$sql="select * from stu";
$resource=mysql_query($sql,$conn);

while($row=mysql_fetch_row($resource)){
    foreach($row as $val){
        echo $val ;
    }
    echo "<br/>";
}
mysql_free_result($resource);
?>