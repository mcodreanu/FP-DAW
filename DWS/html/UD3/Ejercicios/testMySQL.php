<?php
    $conexion = mysqli_connect('localhost','root','12345');
    if (mysqli_connect_errno())
    {
        echo 'Error al conectar a MySQL: '. mysqli_connect_error();
    }
    mysqli_select_db($conexion, 'new_schema');
    $id_categoria = $_GET['id_categoria'];
    $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
    $consulta = mysqli_prepare($conexion, "SELECT titulo FROM T_Peliculas WHERE id_categoria = ?");
    $consulta->bind_param("i", $sanitized_categoria_id);
    $consulta->execute();

    $result = $consulta->get_result();

    while ($myrow = $result->fetch_assoc()) 
    {
        echo $myrow['titulo'] . " / ";
    }