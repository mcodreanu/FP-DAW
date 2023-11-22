<?php

require("playersAccesoDatos.php");

class PlayersReglasNegocio
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


    function obtener()
    {
        $playersDAL = new PlayersAccesoDatos();
        $rs = $playersDAL->obtener();
		$listaPlayers =  array();
        foreach ($rs as $players)
        {
            $oPlayersReglasNegocio = new PlayersReglasNegocio();
            $oPlayersReglasNegocio->Init($players['ID'],$players['name']);
            array_push($listaPlayers,$oPlayersReglasNegocio);
        }
        
        return $listaPlayers;
    }
}
