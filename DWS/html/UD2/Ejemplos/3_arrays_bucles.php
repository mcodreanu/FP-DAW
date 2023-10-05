<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Desarrollo de aplicaciones web en entorno servidor</title> 
</head>
<body>
<div> Curso de PHP - Bucles y arrays</div>
    <?php
        $personas = ["Carlos", "Oscar", "Jose"];
    ?>

    <ul>
        <?php

            foreach ($personas as $persona)
            {
                echo "<li>$persona</li>";
            }

            $contador = count($personas);

            for ($i = 0; $i < $contador; $i++) 
            {
                echo "<li>".$personas[$i]."</li>";
            }

            $i = 0;
            while ($i < $contador) 
            {
                echo "<li>".$personas[$i]."</li>";
                $i++;  
            }
        ?>
    </ul>
</body>
</html> 