<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

class Calculadora
{
    function __construct()
    {

    }

    function factorial($num)
    {
        $res = -1;

        if ($num==0)
        {
            $res = 1;
        }
        else
        {
            if ($num>0)
            {
                $res = $num;
                while ($num>1)
                {
                    $res = $res * ($num - 1);
                    $num--;
                }
            }
        }
        return $res;
    }

    function coeficienteBinomial($n, $k)
    {
        return $this->factorial($n)/$this->factorial($k)*$this->factorial($n-$k);
    }

    function convierteBinarioDecimal($cadenaBits)
    {

    }

    function sumaNumerosPares($array)
    {

    }

    function esPalindromo($cadena)
    {

    }
}