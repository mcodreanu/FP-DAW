<!doctype html>
<html>
<head>

</head>

<body>
    <?php
        require("datosPeliculasReglasNegocio.php");
        $id_pelicula = $_GET["id_pelicula"];
        $peliculasBL = new DatosPeliculasReglasNegocio();
        $datosPeliculas = $peliculasBL->obtener($id_pelicula);
        
        foreach ($datosPeliculas as $pelicula)
        {
            echo "<div><a href=\"datosPelicula.php?id_pelicula = {$pelicula->getID()}\">{$pelicula->getTitulo()}</a></div>";
        }

    ?>
</body>

</html>