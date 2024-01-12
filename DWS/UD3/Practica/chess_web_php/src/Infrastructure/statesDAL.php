<?php

class StatesDAL
{
	
	function __construct()
    {
    }

	function obtain($id_match)
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$sanitized_match_id = mysqli_real_escape_string($conection, $id_match);
		$consult = mysqli_prepare($conection, "SELECT ID, IDGame, board FROM T_Board_Status WHERE IDGame = ?");
		$consult->bind_param("i", $sanitized_match_id);
        $consult->execute();
        $result = $consult->get_result();

		$states =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($states,$myrow);
        }
		
		return $states;
	}

	function insert()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$insert = mysqli_prepare($conection, "INSERT INTO T_Board_Status (IDGame, board) VALUES ((SELECT ID FROM T_Matches ORDER BY ID DESC LIMIT 1), \"rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR\")");
        $insert->execute();
	}
}




















