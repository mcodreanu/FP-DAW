<?php
class MatchesDAL
{
	function __construct()
    {
    }

	function insert($title,$id_player1,$id_player2)
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$sanitized_title = mysqli_real_escape_string($conection,$title);
		$sanitized_player1_id = mysqli_real_escape_string($conection, $id_player1);
        $sanitized_player2_id = mysqli_real_escape_string($conection, $id_player2);
		$insert = mysqli_prepare($conection, "INSERT INTO T_Matches (title,white,black,startDate) VALUES (?,?,?,NOW())");
		$insert->bind_param("sii", $sanitized_title, $sanitized_player1_id, $sanitized_player2_id);
        $insert->execute();
	}

	function obtain()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "SELECT ID, title, white, black, DATE_FORMAT(startDate, '%d/%m/%Y') AS startDate, DATE_FORMAT(startDate, '%H:%i:%s') AS startTime, state, winner, DATE_FORMAT(endDate, '%d/%m/%Y') AS endDate, DATE_FORMAT(endDate, '%H:%i:%s') AS endTime FROM T_Matches");
        $consult->execute();
        $result = $consult->get_result();

		$matches =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($matches,$myrow);
        }
		
		return $matches;
	}

	function obtainFilteredStartDate()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "SELECT ID, title, white, black, DATE_FORMAT(startDate, '%d/%m/%Y') AS startDate, DATE_FORMAT(startDate, '%H:%i:%s') AS startTime, state, winner, DATE_FORMAT(endDate, '%d/%m/%Y') AS endDate, DATE_FORMAT(endDate, '%H:%i:%s') AS endTime FROM T_Matches ORDER BY startDate");
        $consult->execute();
        $result = $consult->get_result();
		$matches =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($matches,$myrow);
        }
		
		return $matches;
	}

	function obtainFilteredEndDate()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "SELECT ID, title, white, black, DATE_FORMAT(startDate, '%d/%m/%Y') AS startDate, DATE_FORMAT(startDate, '%H:%i:%s') AS startTime, state, winner, DATE_FORMAT(endDate, '%d/%m/%Y') AS endDate, DATE_FORMAT(endDate, '%H:%i:%s') AS endTime FROM T_Matches ORDER BY endDate");
        $consult->execute();
        $result = $consult->get_result();
		$matches =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($matches,$myrow);
        }
		
		return $matches;
	}
}




















