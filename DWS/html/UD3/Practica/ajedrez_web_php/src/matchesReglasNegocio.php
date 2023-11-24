<?php

require("matchesAccesoDatos.php");

class MatchesReglasNegocio
{
    private $_ID;
    private $_Title;
    private $_White;
    private $_Black;
    private $_StartDate;
    private $_StartTime;
    private $_EndDate;
    private $_EndTime;
    private $_Winner;
    private $_State;

	function __construct()
    {
    }

    function init($id,$title,$white,$black,$startDate,$startTime,$endDate,$endTime,$winner,$state)
    {
        $this->_ID = $id;
        $this->_Title = $title;
        $this->_White = $white;
        $this->_Black = $black;
        $this->_StartDate = $startDate;
        $this->_StartTime = $startTime;
        $this->_EndDate = $endDate;
        $this->_EndTime = $endTime;
        $this->_Winner = $winner;
        $this->_State = $state;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getTitle()
    {
        return $this->_Title;
    }

    function getWhite()
    {
        return $this->_White;
    }

    function getBlack()
    {
        return $this->_Black;
    }

    function getStartDate()
    {
        return $this->_StartDate;
    }

    function getStartTime()
    {
        return $this->_StartTime;
    }

    function getEndDate()
    {
        return $this->_EndDate;
    }

    function getEndTime()
    {
        return $this->_EndTime;
    }

    function getWinner()
    {
        return $this->_Winner;
    }

    function getState()
    {
        return $this->_State;
    }


    function insertar($title,$id_player1,$id_player2)
    {
        $matchesDAL = new MatchesAccesoDatos();
        $matchesDAL->insertar($title,$id_player1,$id_player2);
    }

    function obtener()
    {
        $matchesDAL = new MatchesAccesoDatos();
        $rs = $matchesDAL->obtener();
		$listaMatches =  array();
        foreach ($rs as $matches)
        {
            $oMatchesReglasNegocio = new MatchesReglasNegocio();
            $oMatchesReglasNegocio->Init($matches['ID'],$matches['title'], $matches['white'],$matches['black'],$matches['startDate'],$matches['startTime'],$matches['endDate'],$matches['endTime'],$matches['winner'],$matches['state']);
            array_push($listaMatches,$oMatchesReglasNegocio);
        }
        
        return $listaMatches;
    }
}
