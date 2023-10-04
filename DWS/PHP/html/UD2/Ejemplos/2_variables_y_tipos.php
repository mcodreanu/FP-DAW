<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<p>
<?php
    $numero_entero = 5;
    $numero_flotante = 6.5;
    $cadena = "Hi!";
    
    echo gettype($numero_entero)." ".$numero_entero . "<br>";
    echo gettype($numero_flotante)." ".$numero_flotante . "<br>";
    echo gettype($cadena)." ".$cadena . "<br>";

    //PREGUNTA
    //¿Qué otros tipos existen en PHP?
    //Prueba por ejemploe el tipo booleano.

    $prueba_variable_no_inicializada = $numero_entero * $x;
    echo $prueba_variable_no_inicializada;
    //¿Que ha pasado? 
    //Cómo la variable $x no estaba inicialiada ha cogido el valor por defecto de 0
    //Consejo: inicializar las variables al principio.

?>
</p>
</body>
</html> 