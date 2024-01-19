<?php
$url = "https://localhost:7089/Factorial?x=3";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$json = curl_exec($ch);
//var_dump($response);
if (!$json)
{
	echo curl_error($ch);
}
curl_close($ch);
var_dump($json);
$x = json_decode($json,true);
var_dump($x);
print($x["result"]);
?>
