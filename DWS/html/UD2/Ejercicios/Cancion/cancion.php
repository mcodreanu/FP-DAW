<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

$frase = validarParametro("frase");

function validarParametro($param_name)
{
    $res = "-";
    $name = htmlspecialchars($_GET[$param_name]);

    if (isset($name))
        $res = $name;

    return $res;
}

function cambiarVocales ($frase, $vocal)
{
    for ($i = 0; $i < strlen($frase); $i++)
    {
        if ($frase[$i] == "a" || $frase[$i] == "e" || $frase[$i] == "i" || $frase[$i] == "o" || $frase[$i] == "u")
        {
            $frase[$i] = $vocal;
        }
    }
    
    return $frase;
}

function escribirFrases ($frase)
{
    echo $frase;

    for ($i = 0; $i < 5; $i++)
    {
        $vocales = ["a", "e", "i", "o", "u"];

        $frases = cambiarVocales($frase, $vocales[$i]);

        echo "<br>".$frases;
    }
}

echo escribirFrases($frase);