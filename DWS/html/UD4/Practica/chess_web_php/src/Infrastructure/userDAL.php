<?php
class UserDAL
{
	
	function __construct()
    {
    }

	function insert($name,$email,$password,$premium)
	{
		$conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conection, 'chess_game');
		$consult = mysqli_prepare($conection, "INSERT INTO T_Players(name,email,password,premium) VALUES (?,?,?,?);");
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $consult->bind_param("ssss",$name,$email,$hash,$premium);
        $res = $consult->execute();
        
		return $res;
	}

    function verify($name,$password)
    {
        $conection = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conection, 'chess_game');
        $consult = mysqli_prepare($conection, "SELECT name,email,password,premium FROM T_Players WHERE name = ?;");
        $sanitized_name = mysqli_real_escape_string($conection, $name);       
        $consult->bind_param("s", $sanitized_name);
        $consult->execute();
        $res = $consult->get_result();


        if ($res->num_rows==0)
        {
            return 'NOT_FOUND';
        }

        if ($res->num_rows>1)
        {
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['password'];
        if (password_verify($password, $x))
        {
            return $myrow;
        } 
        else 
        {
            return 'NOT_FOUND';
        }
    }
}




















