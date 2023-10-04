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

echo test_factorial_1();