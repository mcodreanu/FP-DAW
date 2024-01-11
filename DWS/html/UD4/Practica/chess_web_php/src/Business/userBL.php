<?php

require("../Infrastructure/userDAL.php");

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

    function verifyPremium($name,$password)
    {
        $usersDAL = new userDAL();
        $res = $usersDAL->verifyPremium($name,$password);
        
        return $res;
        
    }
}

