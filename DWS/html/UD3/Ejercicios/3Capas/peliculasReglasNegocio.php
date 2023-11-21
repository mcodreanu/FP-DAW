<?php

require("peliculasAccesoDatos.php");

class PeliculasReglasNegocio
{
    private $_ID;
    private $_Titulo;
    private $_Director;

	function __construct()
    {
    }

    function init($id,$titulo,$director)
    {
        $this->_ID = $id;
        $this->_Titulo = $titulo;
        $this->_Director = $director;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getTitulo()
    {
        return $this->_Titulo;
    }

    function getDirector()
    {
        return $this->_Director;
    }


    function obtener($id_categoria)
    {
        $peliculasDAL = new PeliculasAccesoDatos();
        $rs = $peliculasDAL->obtener($id_categoria);
		$listaPeliculas =  array();
        foreach ($rs as $pelicula)
        {
            $oPeliculasReglasNegocio = new PeliculasReglasNegocio();
            $oPeliculasReglasNegocio->Init($pelicula['ID'],$pelicula['titulo'],$pelicula['id_director']);
            array_push($listaPeliculas,$oPeliculasReglasNegocio);
        }
        
        return $listaPeliculas;
    }
}

