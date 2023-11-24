<?php

class MatchesAccesoDatos
{
	
	function __construct()
    {
    }

	function insertar($title,$id_player1,$id_player2)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
		$sanitized_title = mysqli_real_escape_string($conexion,$title);
		$sanitized_player1_id = mysqli_real_escape_string($conexion, $id_player1);
        $sanitized_player2_id = mysqli_real_escape_string($conexion, $id_player2);
		$insert = mysqli_prepare($conexion, "INSERT INTO T_Matches (title,white,black,startDate) VALUES (?,?,?,NOW())");
		$insert->bind_param("sii", $sanitized_title, $sanitized_player1_id, $sanitized_player2_id);
        $insert->execute();
	}

	function obtener()
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'chess_game');
		$consulta = mysqli_prepare($conexion, "SELECT ID, title, white, black, DATE_FORMAT(startDate, '%d/%m/%Y') AS startDate, DATE_FORMAT(startDate, '%H:%i:%s') AS startTime, state, winner, DATE_FORMAT(endDate, '%d/%m/%Y') AS endDate, DATE_FORMAT(endDate, '%H:%i:%s') AS endTime FROM T_Matches");
        $consulta->execute();
        $result = $consulta->get_result();

		$matches =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($matches,$myrow);
        }
		
		return $matches;
	}
}




















