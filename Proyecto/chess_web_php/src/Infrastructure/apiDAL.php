<?php
class ApiDAL
{
	function obtainScore($board)
	{
		$url = "https://localhost:7246/ChessGame?board=".$board;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$json = curl_exec($ch);

		if (!$json)
		{
			echo curl_error($ch);
		}

		curl_close($ch);
		$x = json_decode($json,true);
		return $x;
	}

	function move($board, $fromColumn, $fromRow, $toColumn, $toRow)
	{
		$url = "https://localhost:7246/Movement?board=".$board."&fromColumn=".$fromColumn."&fromRow=".$fromRow."&toColumn=".$toColumn."&toRow=".$toRow;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$json = curl_exec($ch);

		if (!$json)
		{
			echo curl_error($ch);
		}

		curl_close($ch);
		$x = json_decode($json,true);
		return $x;
	}

	function obtainPossibleMovements($board, $fromColumn, $fromRow)
	{
		$url = "https://localhost:7246/PossibleMovements?board=".$board."&fromColumn=".$fromColumn."&fromRow=".$fromRow;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$json = curl_exec($ch);

		if (!$json)
		{
			echo curl_error($ch);
		}

		curl_close($ch);
		$x = json_decode($json,true);
		return $x;
	}

	function resetGameState()
	{
		$url = "https://localhost:7246/GameState";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,4);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$json = curl_exec($ch);

		if (!$json)
		{
			echo curl_error($ch);
		}

		curl_close($ch);
		$x = json_decode($json,true);
		return $x;
	}
}