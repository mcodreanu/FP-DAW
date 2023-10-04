<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<div> Curso PHP </div>

<div>
    <?php

    //TODO Qué mejorarías de este código?
    $x = validarParametroName();

    echo "Hello ".$x."!!!";

    $str = "This is some <b>bold</b> text.";
    // echo htmlspecialchars($str);
    echo $str;



      function validarParametroName()
      {

        $res = "-";
        $name = htmlspecialchars($_GET["name"]);

        if (isset($name))
            $res = $name;

        return $res;
      } 
    ?>
</div>

</body>
</html>

