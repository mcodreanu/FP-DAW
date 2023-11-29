<?php

require("../Infraestructura/playersDAL.php");

class PlayersBL
{
    private $_ID;
    private $_Name;

	function __construct()
    {
    }

    function init($id,$name)
    {
        $this->_ID = $id;
        $this->_Name = $name;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getName()
    {
        return $this->_Name;
    }


    function obtain()
    {
        $playersDAL = new PlayersDAL();
        $rs = $playersDAL->obtain();
		$playersList =  array();
        foreach ($rs as $players)
        {
            $oPlayersBL = new PlayersBL();
            $oPlayersBL->Init($players['ID'],$players['name']);
            array_push($playersList,$oPlayersBL);
        }
        
        return $playersList;
    }
}
