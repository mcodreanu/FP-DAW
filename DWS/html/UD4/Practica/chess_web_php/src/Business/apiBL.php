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

    function move($board, $fromRow, $fromColumn, $toRow, $toColumn)
    {
        $apiDAL = new ApiDAL();
        $res = $apiDAL->move($board, $fromRow, $fromColumn, $toRow, $toColumn);
        
        return $res;
    }
}

