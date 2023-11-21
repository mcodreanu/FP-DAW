<?php

require("directorAccesoDatos.php");

class DirectoresReglasNegocio
{
    private $_ID;
    private $_Nombre;

	function __construct()
    {
    }

    function init($id,$nombre)
    {
        $this->_ID = $id;
        $this->_Nombre = $nombre;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getNombre()
    {
        return $this->_Nombre;
    }

    function obtener($id_director)
    {
        $directoresDAL = new DirectoresAccesoDatos();
        $rs = $directoresDAL->obtener($id_director);
		$listaDirectores =  array();
        foreach ($rs as $directores)
        {
            $oDirectoresReglasNegocio = new DirectoresReglasNegocio();
            $oDirectoresReglasNegocio->Init($directores['ID'],$directores['nombre']);
            array_push($listaDirectores,$oDirectoresReglasNegocio);
        }
        
        return $listaDirectores;
    }
}

