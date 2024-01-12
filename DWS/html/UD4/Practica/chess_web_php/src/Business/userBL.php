<?php

require("Infrastructure/userDAL.php");

class userBL
{

	function __construct()
    {
    }
    function verify($name,$password)
    {
        $usersDAL = new userDAL();
        $res = $usersDAL->verify($name,$password);
        
        return $res;
        
    }
}

