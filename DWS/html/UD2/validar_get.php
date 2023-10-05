<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo de aplicaciones web en entorno servidor</title>
</head>
<body>
<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("Ejemplos/funciones_y_condiciones.php");

    $x = validarParametro("name");

    $mensaje = 'La letra: '.$x.' ';
    $mensaje_es_vocal = esVocal($x) ? 'es una vocal' : 'no es una vocal';
    echo $mensaje.$mensaje_es_vocal;

    function validarParametro($param_name)
    {
        $res = "-";
        $name = htmlspecialchars($_GET[$param_name]);

        if (isset($name))
            $res = $name;

        return $res;
    }
?>
</body>
</html>