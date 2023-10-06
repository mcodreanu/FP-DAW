<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require ("calculadora.php");
function test_factorial()
{
    $calculadora = new Calculadora();
    $x = $calculadora->factorial(5);

    return $x;
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

    return $x;
}

echo "Test factorial de 5: " . test_factorial();
echo "<br>Test coeficiente binomial de n = 9 y k = 3: " . test_coeficienteBinomial();
echo "<br>Test conversión de binario a decimal de \"1101100\": " . test_binarioDecimal();
echo "<br>Test suma numeros pares de [2,3,6,8,9,10,23,24]: " . test_sumaNumerosPares();
echo "<br>Test palindromo de \"Isaac no ronca asi\": " . test_esPalindromo();