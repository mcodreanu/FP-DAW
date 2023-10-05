<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<div> Curso de PHP - uso de excepciones.</div>

<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    try 
    {
        echo 500/0;
    }
    catch(DivisionByZeroError $e)
    {
        echo "ERROR: $e";
    } 
    catch(ErrorException $e) 
    {
        echo "ERROR: $e";
    }
?>
</body>
</html> 

