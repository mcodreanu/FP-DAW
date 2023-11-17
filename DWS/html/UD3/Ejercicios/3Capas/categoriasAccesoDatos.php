<?php

class CategoriasAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener()
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'new_schema');
		$consulta = mysqli_prepare($conexion, "SELECT nombre FROM T_Categorias");
        $consulta->execute();
        $result = $consulta->get_result();

		$categorias =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($categorias,$myrow);
        }
		
		return $categorias;
	}
}




















