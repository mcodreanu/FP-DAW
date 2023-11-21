<?php

class DirectoresAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($id_director)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'new_schema');
		$sanitized_director_id = mysqli_real_escape_string($conexion, $id_director);
		$consulta = mysqli_prepare($conexion, "SELECT ID,nombre FROM T_Directores WHERE ID = ?");
		
		$consulta->bind_param("i", $sanitized_director_id);
        $consulta->execute();
        $result = $consulta->get_result();

		$directores =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($directores,$myrow);
        }
		
		return $directores;
	}
}















