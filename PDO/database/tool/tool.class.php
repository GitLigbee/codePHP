<?php
    class tool_sql{
        private $conn;
        private $localhost="localhost";
        private $user="root";
        private $passward="root";
        
        function tool_sql(){
            $this->conn=mysql_connect($this->localhost,$this->user,$this->passward);
            if(!$this->conn){
                die("链接失败".mysql_error());
            }
            mysql_select_db("phpsql");
            mysql_query("set names utf-8");
        }
        
        function dql($sql){
            $res=mysql_query($sql,$this->conn);
            while($row=mysql_fetch_row($res)){
                foreach($row as $val){
                    echo $val ;
                }
                echo "<br/>";
            }
            mysql_free_result($res);
        }
        
        function dml($sql){
            $res=mysql_query($sql,$this->conn);
            if(!$res){
                die("操作失败".mysql_error());
            }elseif(mysql_affected_rows($this->conn)>=0){
                echo "操作成功";
            }
        }
    }
?>