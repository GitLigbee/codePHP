<?php
    if(isset($_GET['user'])){
        echo "hello".$_GET['user'];    
    }
    if(isset($_POST['user'])){
        echo "hello".$_POST['user'];
    }

?>