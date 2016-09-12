<?php
$str = '1+2-3/4*5';
$pattern = '#[+-/*]#';
$res = preg_split($pattern,$str);
print_r($res);