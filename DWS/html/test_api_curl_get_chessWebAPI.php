<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
$i = 0;
$boardTest = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";
print("tablero");
var_dump($boardTest);


$url = "https://localhost:7246/ChessGame?board=".$boardTest;
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
$x = json_decode($json,true);
var_dump($x);
?>
