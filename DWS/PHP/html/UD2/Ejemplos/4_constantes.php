<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
    <p>
    <?php
        define("MAX_VALUE",10);

        echo "el valor de la constante MAX_VALUE es: ".MAX_VALUE."<br>";


        const MIN_VALUE = 1;

        echo "el valor de la constante MIN_VALUE es: ".MIN_VALUE."<br>";

        //Abre la siguiente página y lee sobre cuando podemos usar define o cuando const
        //https://www.php.net/manual/en/language.constants.syntax.php

        //Aquí lo explica con ejemplos:
        //https://www.tutorialspoint.com/compare-define-vs-const-in-php

    ?>
    </p>
</body>
</html> 