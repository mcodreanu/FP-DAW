<?php

class PeliculasAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($id_categoria)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'new_schema');
		$sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
		$consulta = mysqli_prepare($conexion, "SELECT TC.ID, titulo, nombre FROM T_Peliculas TP INNER JOIN T_Categorias TC ON TP.id_categoria = TC.ID WHERE TC.nombre LIKE ?");
		$consulta->bind_param("s", $sanitized_categoria_id);
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




















