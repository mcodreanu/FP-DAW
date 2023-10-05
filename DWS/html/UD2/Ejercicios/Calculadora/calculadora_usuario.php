<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require ("calculadora.php");
function test_factorial_1()
{
    $calculadora = new Calculadora();
    $x = $calculadora->factorial(0);

    return ($x == 1);
}

function test_coeficienteBinomial()
{
    $calculadora = new Calculadora();
    $x = $calculadora->coeficienteBinomial(9, 3);

    return $x;
}

function test_binarioDecimal()
{
    $calculadora = new Calculadora();
    $x = $calculadora->convierteBinarioDecimal("1101100");

    return $x;
}

function test_sumaNumerosPares()
{
    $calculadora = new Calculadora();
    $x = $calculadora->sumaNumerosPares([2,3,6,8,9,10,23,24]);

    return $x;
}

function test_esPalindromo()
{
    $calculadora = new Calculadora();
    $x = $calculadora->esPalindromo("Isaac no ronca asi");

    if ($x)
    {
        echo "True";
    }
    else
    {
        echo "False";
    }

    return $x;
}

echo test_esPalindromo();