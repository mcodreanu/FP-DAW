<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>

<div>
    <?php

    function obtenerInformacion($variable)
    {
        $cadena='[ ';
        foreach($variable as $key=>$val)
        {
            $cadena.=$key.'=>'.$val.",<br>";
        }

        $cadena.=']';
        return $cadena;
    }
    ?>
</div>
<?php
//+Tarea con solución: ¿Cómo mostrar uno de los valores de una de las variables?
echo 'Variable $_SERVER[]'. $_SERVER["HTTP_USER_AGENT"]."<br>";
//-
echo 'Variable $_SERVER'. obtenerInformacion($_SERVER);
?>

<!-- Prueba a ejecutar el script con otra de las variables superglobales
$_GLOBALS
$_GET
$_POST
$_REQUEST
$_ENV
...
Investiga si hay más.
-->

</body>
</html>

