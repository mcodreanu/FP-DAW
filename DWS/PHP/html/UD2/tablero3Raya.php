
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero 3 Raya</title>
    <style>
        hr {
            margin: 0 6px;
            width: 10%;
        }
    </style>
</head>
<body>
    <?php
        $matriz = array (
            array("X","0","0"),
            array("0","X","0"),
            array("X","0","X")
        );

        $max_filas = count($matriz);

        echo "<table><hr>";
        for ($fila = 0; $fila < $max_filas; $fila++)
        {
            echo "<tr>";
            $max_columnas_fila = count($matriz[$fila]);
            for ($columna = 0; $columna < $max_columnas_fila; $columna++)
            {
                echo "<td>| ".$matriz[$fila][$columna]." |</td>";
            }
            echo "</tr>";
        }
        echo "</table><hr>";
    ?>
</body>
</html>