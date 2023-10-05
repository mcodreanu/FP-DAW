<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<div> Curso de PHP - uso de require. Funciones. Poniéndolo todo junto.</div>



<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);
    
    require("funciones_y_condiciones.php"); //si no existe se genera un "FATAL ERROR" que no puede ser capturado por un try
    $letra = "a";
    $mensaje = 'La letra: '.$letra.' ';
    $mensaje_es_vocal = esVocal($letra) ? 'es una vocal' : 'no es una vocal';
    echo $mensaje.$mensaje_es_vocal;
?>
</body>
</html> 

