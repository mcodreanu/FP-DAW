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

    $frase = strtolower($frase);

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
    $frases = "";

    for ($i = 0; $i < 5; $i++)
    {
        $vocales = ["a", "e", "i", "o", "u"];

        $frases = $frases.cambiarVocales($frase, $vocales[$i]).",";
    }

    return explode(",", $frases);
}

function test ($frase)
{
    echo $frase."<br>";

    $frases = array("al sapa na sa lava al paa...",
    "el sepe ne se leve el pee...",
    "il sipi ni si livi il pii...",
    "ol sopo no so lovo ol poo...",
    "ul supu nu su luvu ul puu...");
    $res = escribirFrases($frase);

    for ($i = 0; $i < count($res); $i++)
    {
        echo $res[$i]."<br>";
    }
}

echo test($frase);