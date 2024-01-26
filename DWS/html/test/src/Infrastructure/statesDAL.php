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

	function obtainLastState()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "SELECT ID, IDGame, board FROM T_Board_Status ORDER BY ID DESC LIMIT 1");
        $consult->execute();
        $result = $consult->get_result();

		$state = $result->fetch_assoc();

        return $state ? [$state] : [];
	}

	function obtainLastStateJSON()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "SELECT board FROM T_Board_Status ORDER BY ID DESC LIMIT 1");
        $consult->execute();
        $result = $consult->get_result();

		$board = $result->fetch_assoc();

        if ($board !== false) {
            $response = array(
                'success' => true,
                'board' => $board['board']
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Failed to obtain board state from the database.'
            );
        }

		header('Content-Type: application/json');
        echo json_encode($response);
        exit;
	}

	function insert($board)
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$sanitized_board = mysqli_real_escape_string($conection, $board);
		$insert = mysqli_prepare($conection, "INSERT INTO T_Board_Status (IDGame, board) VALUES ((SELECT ID FROM T_Matches ORDER BY ID DESC LIMIT 1), ?)");
		$insert->bind_param("s", $sanitized_board);
        $insert->execute();
	}
}




















