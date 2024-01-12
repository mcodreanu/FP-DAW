<?php

class PlayersDAL
{
	
	function __construct()
    {
    }

	function obtain()
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "SELECT ID, name FROM T_Players");
        $consult->execute();
        $result = $consult->get_result();

		$players =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($players,$myrow);
        }
		
		return $players;
	}
}




















