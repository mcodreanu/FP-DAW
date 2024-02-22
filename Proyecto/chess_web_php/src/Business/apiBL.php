<?php

require("../Infrastructure/apiDAL.php");

class ApiBL
{

	function __construct()
    {
    }

    function obtainScore($board)
    {
        $apiDAL = new ApiDAL();
        $res = $apiDAL->obtainScore($board);
        
        return $res; 
    }

    function move($board, $fromColumn, $fromRow, $toColumn, $toRow)
    {
        $apiDAL = new ApiDAL();
        $res = $apiDAL->move($board, $fromColumn, $fromRow, $toColumn, $toRow);
        
        return $res;
    }

    function obtainPossibleMovements($board, $fromColumn, $fromRow)
    {
        $apiDAL = new ApiDAL();
        $res = $apiDAL->obtainPossibleMovements($board, $fromColumn, $fromRow);
        
        return $res;
    }

    function resetGameState()
    {
        $apiDAL = new ApiDAL();
        $apiDAL->resetGameState();
    }
}

