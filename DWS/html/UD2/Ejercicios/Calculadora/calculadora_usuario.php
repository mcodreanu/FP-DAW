<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require ("calculadora.php");
function test_factorial_1()
{
    $calculadora = new Calculadora();
    $x = $calculadora->factorial(5);

    return ($x==120);
}

function test_coeficienteBinomial()
{
    $calculadora = new Calculadora();
    $x = $calculadora->coeficienteBinomial(9, 3);

    return ($x==84);
}

function test_binarioDecimal()
{
    $calculadora = new Calculadora();
    $x = $calculadora->convierteBinarioDecimal("1101100");

    return ($x==108);
}

function test_sumaNumerosPares()
{
    $calculadora = new Calculadora();
    $x = $calculadora->sumaNumerosPares(array(2,3,6,8,9,10,23,24));

    return ($x==50);
}

function test_esPalindromo()
{
    $calculadora = new Calculadora();
    $x = $calculadora->esPalindromo("Isaac no ronca asi");

    return ($x==1);
}


echo "Test factorial de 5 = 120: " . test_factorial_1();
echo "<br>Test coeficiente binomial de \"n = 9 y k = 3\" = 84: " . test_coeficienteBinomial();
echo "<br>Test binario a decimal de \"1101100\" = 108: " . test_binarioDecimal();
echo "<br>Test suma numeros pares de \"2,3,6,8,9,10,23,24\" = 50: " . test_sumaNumerosPares();
echo "<br>Test palindromo de \"Isaac no ronca asi\" = 1: " . test_esPalindromo();