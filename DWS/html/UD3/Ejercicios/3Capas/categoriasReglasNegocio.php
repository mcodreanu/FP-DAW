<?php

require("categoriasAccesoDatos.php");

class CategoriasReglasNegocio
{
    private $_Nombre;

	function __construct()
    {
    }

    function init($nombre)
    {
        $this->_Nombre = $nombre;
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
            $oCategoriasReglasNegocio->Init($categoria['nombre']);
            array_push($listaCategorias,$oCategoriasReglasNegocio);
        }
        
        return $listaCategorias;
    }
}

