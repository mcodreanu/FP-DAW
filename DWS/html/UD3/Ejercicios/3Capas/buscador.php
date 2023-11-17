<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
</head>
<body>
    <form action="peliculasVista.php" method="post">
        <label for="id_categoria">Elige la ID de la categoría:</label><br><br>
        <select name="id_categoria" id="id_categoria">
            <?php
                require("categoriasReglasNegocio.php");    

                $categoriasBL = new CategoriasReglasNegocio();
                $datosCategorias = $categoriasBL->obtener();

                foreach ($datosCategorias as $categoria)
                {
                    echo "<option value=\"{$categoria->getNombre()}\">{$categoria->getNombre()}</option>";
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar">
    </form>
</body>
</html>