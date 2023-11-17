<?php

require("peliculasAccesoDatos.php");

class PeliculasReglasNegocio
{
    private $_ID;
    private $_Titulo;

	function __construct()
    {
    }

    function init($id,$titulo)
    {
        $this->_ID = $id;
        $this->_Titulo = $titulo;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getTitulo()
    {
        return $this->_Titulo;
    }


    function obtener($id_categoria)
    {
        $peliculasDAL = new PeliculasAccesoDatos();
        $rs = $peliculasDAL->obtener($id_categoria);
		$listaPeliculas =  array();
        foreach ($rs as $pelicula)
        {
            $oPeliculasReglasNegocio = new PeliculasReglasNegocio();
            $oPeliculasReglasNegocio->Init($pelicula['ID'],$pelicula['titulo']);
            array_push($listaPeliculas,$oPeliculasReglasNegocio);
        }
        
        return $listaPeliculas;
    }
}

