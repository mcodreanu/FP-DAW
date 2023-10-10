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
    $vocales = ["a", "e", "i", "o", "u"];

    for ($i = 0; $i < count($vocales); $i++)
    {
        $frases = $frases.cambiarVocales($frase, $vocales[$i]).",";
    }

    $frases = explode(",", $frases);

    unset($frases[5]);

    return $frases;
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

    echo implode("<br>", $res);

    if ($res == $frases)
    {
        echo "<br><br>Test: Correcto";
    }
    else
    {
        echo "<br><br>Test: Incorrecto";
    }
}

echo test($frase);