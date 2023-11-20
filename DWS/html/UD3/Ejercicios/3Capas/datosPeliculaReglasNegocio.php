<?php

require("datosPeliculaAccesoDatos.php");

class DatosPeliculasReglasNegocio
{
    private $_ID;
    private $_Titulo;
    private $_Anyo;
    private $_Duracion;
    private $_Sinopsis;
    private $_Imagen;
    private $_Votos;

	function __construct()
    {
    }

    function init($id,$titulo,$anyo,$duracion,$sinopsis,$imagen,$votos)
    {
        $this->_ID = $id;
        $this->_Titulo = $titulo;
        $this->_Anyo = $anyo;
        $this->_Duracion = $duracion;
        $this->_Sinopsis = $sinopsis;
        $this->_Imagen = $imagen;
        $this->_Votos = $votos;
    }

    function getID()
    {
        return $this->_ID;
    }

    function getTitulo()
    {
        return $this->_Titulo;
    }

    function getAnyo()
    {
        return $this->_Anyo;
    }

    function getDuracion()
    {
        return $this->_Duracion;
    }

    function getSinopsis()
    {
        return $this->_Sinopsis;
    }

    function getImagen()
    {
        return $this->_Imagen;
    }

    function getVotos()
    {
        return $this->_Votos;
    }

    function obtener($id_pelicula)
    {
        $datosPeliculasDAL = new DatosPeliculasAccesoDatos();
        $rs = $datosPeliculasDAL->obtener($id_pelicula);
		$listaDatosPeliculas =  array();
        foreach ($rs as $datosPelicula)
        {
            $oDatosPeliculasReglasNegocio = new DatosPeliculasReglasNegocio();
            $oDatosPeliculasReglasNegocio->Init($datosPelicula['ID'],$datosPelicula['titulo'],$datosPelicula['año'],$datosPelicula['duracion'],$datosPelicula['sinopsis'],$datosPelicula['imagen'],$datosPelicula['votos']);
            array_push($listaDatosPeliculas,$oDatosPeliculasReglasNegocio);
        }
        
        return $listaDatosPeliculas;
    }
}

