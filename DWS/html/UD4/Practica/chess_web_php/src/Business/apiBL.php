<?php

require("../Infrastructure/apiDAL.php");

class apiBL
{

	function __construct()
    {
    }

    function obtain($board)
    {
        $apiDAL = new apiDAL();
        $res = $apiDAL->obtain($board);
        
        return $res;
        
    }
}

