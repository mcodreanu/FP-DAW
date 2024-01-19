<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
class apiDAL
{
/*$i = 0;
$boardTest = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";
while ($i<64)
{
	if ($i!=63)
	{
		$boardTest.="8/";
	}
	else
	{
		$boardTest.="EEEE_";
	}
	$i++;	
}
print("tablero");
var_dump($boardTest);*/

function obtain($board)
	{
		$url = "https://localhost:7246/ChessGame?board=".$board;
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
		
		return $x;
}
}