<?php

require("statesAccesoDatos.php");

class StatesReglasNegocio
{
    private $_ID;
    private $_IDGame;
    private $_Board;

	function __construct()
    {
    }

    function init($id,$idgame,$board)
    {
        $this->_ID = $id;
        $this->_IDGame = $idgame;
        $this->_Board = $board;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getIDGame()
    {
        return $this->_IDGame;
    }

    function getBoard()
    {
        return $this->_Board;
    }

    function obtener($id_match)
    {
        $statesDAL = new StatesAccesoDatos();
        $rs = $statesDAL->obtener($id_match);
		$listaStates =  array();
        foreach ($rs as $states)
        {
            $oStatesReglasNegocio = new StatesReglasNegocio();
            $oStatesReglasNegocio->Init($states['ID'],$states['IDGame'], $states['board']);
            array_push($listaStates,$oStatesReglasNegocio);
        }
        
        return $listaStates;
    }
}
