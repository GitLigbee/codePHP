<?php
$curl = curl_init();
$url = 'www.hotel.wsq.com';

curl_setopt($curl,CURLOPT_URL,$url);

curl_exec($curl);
curl_close($curl);