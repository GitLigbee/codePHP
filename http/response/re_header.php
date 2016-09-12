<?php
$cache = 'Expires:'.gmdate('D, d M Y H:i:s',time()+15).' GMT';
header($cache);
echo date('s');
//echo $cache;
?>
<hr>
<a href='re_header.php'>self</a>