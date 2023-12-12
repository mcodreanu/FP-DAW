<?php

require("../Infraestructura/matchesDAL.php");

class MatchesBL
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


    function insert($title,$id_player1,$id_player2)
    {
        $matchesDAL = new MatchesDAL();
        $matchesDAL->insert($title,$id_player1,$id_player2);
    }

    function obtain()
    {
        $matchesDAL = new MatchesDAL();
        $rs = $matchesDAL->obtain();
		$matchesList =  array();
        foreach ($rs as $matches)
        {
            $oMatchesBL = new MatchesBL();
            $oMatchesBL->Init($matches['ID'],$matches['title'], $matches['white'],$matches['black'],$matches['startDate'],$matches['startTime'],$matches['endDate'],$matches['endTime'],$matches['winner'],$matches['state']);
            array_push($matchesList,$oMatchesBL);
        }
        
        return $matchesList;
    }

    function obtainFilteredStartDate()
    {
        $matchesDAL = new MatchesDAL();
        $rs = $matchesDAL->obtainFilteredStartDate();
		$matchesList =  array();
        foreach ($rs as $matches)
        {
            $oMatchesBL = new MatchesBL();
            $oMatchesBL->Init($matches['ID'],$matches['title'], $matches['white'],$matches['black'],$matches['startDate'],$matches['startTime'],$matches['endDate'],$matches['endTime'],$matches['winner'],$matches['state']);
            array_push($matchesList,$oMatchesBL);
        }
        
        return $matchesList;
    }

    function obtainFilteredEndDate()
    {
        $matchesDAL = new MatchesDAL();
        $rs = $matchesDAL->obtainFilteredEndDate();
		$matchesList =  array();
        foreach ($rs as $matches)
        {
            $oMatchesBL = new MatchesBL();
            $oMatchesBL->Init($matches['ID'],$matches['title'], $matches['white'],$matches['black'],$matches['startDate'],$matches['startTime'],$matches['endDate'],$matches['endTime'],$matches['winner'],$matches['state']);
            array_push($matchesList,$oMatchesBL);
        }
        
        return $matchesList;
    }
}
