<?php

require("../Infraestructura/statesDAL.php");

class StatesBL
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

    function obtain($id_match)
    {
        $statesDAL = new StatesDAL();
        $rs = $statesDAL->obtain($id_match);
		$listaStates =  array();
        foreach ($rs as $states)
        {
            $oStatesReglasNegocio = new StatesBL();
            $oStatesReglasNegocio->Init($states['ID'],$states['IDGame'], $states['board']);
            array_push($listaStates,$oStatesReglasNegocio);
        }
        
        return $listaStates;
    }
}
