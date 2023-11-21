<!doctype html>
<html>
<head>

</head>
    <style>
        h1 {
            text-align: center;
        }

        div {
            margin: 0 auto;
            border: 1px solid black;
            text-align: center;
            padding: 20px;
            width: 1100px;
        }

        a {
            text-decoration: none;
        }
    </style>
<body>
    <h1> Listado de peliculas </h1>
    <?php
        require("peliculasReglasNegocio.php");
        $id_categoria = $_POST["id_categoria"];
        $peliculasBL = new PeliculasReglasNegocio();
        $datosPeliculas = $peliculasBL->obtener($id_categoria);
        
        foreach ($datosPeliculas as $pelicula)
        {
            echo "<div><a href=\"datosPeliculaVista.php?id_pelicula={$pelicula->getID()}&id_director={$pelicula->getDirector()}\">{$pelicula->getTitulo()}</a></div>";
        }
    ?>
</body>

</html>