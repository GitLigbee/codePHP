<?php
    require_once "tool.class.php";
    $tool = new tool_sql();
    $sql="select * from stu";
    $sql1="delete from stu where age=12";
    $tool->dql($sql);
    $tool->dml($sql1);
?>