<?php

class StatesAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener($id_match)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
		$sanitized_match_id = mysqli_real_escape_string($conexion, $id_match);
		$consulta = mysqli_prepare($conexion, "SELECT ID, IDGame, board FROM T_Board_Status WHERE IDGame = ?");
		$consulta->bind_param("i", $sanitized_match_id);
        $consulta->execute();
        $result = $consulta->get_result();

		$states =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($states,$myrow);
        }
		
		return $states;
	}
}




















