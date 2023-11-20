<?php

class DatosPeliculasAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($id_pelicula)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'new_schema');
		$sanitized_pelicula_id = mysqli_real_escape_string($conexion, $id_pelicula);
		$consulta = mysqli_prepare($conexion, "SELECT * FROM T_Peliculas WHERE ID = ?");
		
		$consulta->bind_param("i", $sanitized_pelicula_id);
        $consulta->execute();
        $result = $consulta->get_result();

		$peliculas =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($peliculas,$myrow);
        }
		
		return $peliculas;
	}
}















