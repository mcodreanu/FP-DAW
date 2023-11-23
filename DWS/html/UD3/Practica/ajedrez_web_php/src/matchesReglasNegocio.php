<?php

require("matchesAccesoDatos.php");

class MatchesReglasNegocio
{
    private $_Title;
    private $_White;
    private $_Black;

	function __construct()
    {
    }

    function init($title,$white,$black)
    {
        $this->_Title = $title;
        $this->_White = $white;
        $this->_Black = $black;
    }


    function insertar($title,$id_player1,$id_player2)
    {
        $matchesDAL = new MatchesAccesoDatos();
        $matchesDAL->insertar($title,$id_player1,$id_player2);
    }
}
