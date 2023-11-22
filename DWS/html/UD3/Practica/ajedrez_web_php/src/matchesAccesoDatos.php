<?php

class PeliculasAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($id_player1,$id_player2)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
		$sanitized_player1_id = mysqli_real_escape_string($conexion, $id_player1);
        $sanitized_player2_id = mysqli_real_escape_string($conexion, $id_player2);
		$insert = mysqli_prepare($conexion, "INSERT INTO T_Games ()");
		$insert->bind_param("i", $sanitized_categoria_id);
        $insert->execute();
	}
}




















