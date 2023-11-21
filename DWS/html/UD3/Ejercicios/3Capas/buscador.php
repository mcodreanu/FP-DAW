<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
</head>
<body>
    <form action="peliculasVista.php" method="post">
        <h2>Elige la categoría:</h2>
        <select name="id_categoria" id="id_categoria">
            <?php
                require("categoriasReglasNegocio.php");    

                $categoriasBL = new CategoriasReglasNegocio();
                $datosCategorias = $categoriasBL->obtener();

                foreach ($datosCategorias as $categoria)
                {
                    echo "<option value=\"{$categoria->getID()}\">{$categoria->getNombre()}</option>";
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar">
    </form>
</body>
</html>