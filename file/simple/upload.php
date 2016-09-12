<?php
sleep(10);
print_r($_FILES);
echo '<pre>';
var_dump($_FILES);
/*$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
copy($tmp_name,'upload/'.$name);

echo $_FILES['file']['size'];*/
?>