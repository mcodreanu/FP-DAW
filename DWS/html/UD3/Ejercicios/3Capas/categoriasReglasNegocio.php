<?php

require("categoriasAccesoDatos.php");

class CategoriasReglasNegocio
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


    function obtener()
    {
        $categoriasDAL = new CategoriasAccesoDatos();
        $rs = $categoriasDAL->obtener();
		$listaCategorias =  array();
        foreach ($rs as $categoria)
        {
            $oCategoriasReglasNegocio = new CategoriasReglasNegocio();
            $oCategoriasReglasNegocio->Init($categoria['ID'],$categoria['nombre']);
            array_push($listaCategorias,$oCategoriasReglasNegocio);
        }
        
        return $listaCategorias;
    }
}

