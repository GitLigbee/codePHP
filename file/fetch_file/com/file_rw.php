<?php
$stmt = fopen('./rw.txt','r+');

echo ftell($stmt);
fwrite($stmt,'01234'."\n".'56789');
echo ' r '.ftell($stmt);
echo '<br>';

fseek($stmt,1);
fwrite($stmt,'ab');
fseek($stmt,1);

echo fgets($stmt,8);
echo '<br>';
echo fgets($stmt,8);

fclose($stmt);