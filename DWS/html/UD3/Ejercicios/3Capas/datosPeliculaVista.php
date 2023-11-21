<!doctype html>
<html>
<head>
    <style>
        h1 {
            text-align: center;
        }

        div {
            margin: 0 auto;
            border: 1px solid black;
            text-align: center;
            padding: 0 0 10px 0;
            width: 1100px;
        }
    </style>
</head>

<body>
    <?php
        require("datosPeliculaReglasNegocio.php");
        $id_pelicula = $_GET["id_pelicula"];
        $peliculasBL = new DatosPeliculasReglasNegocio();
        $datosPeliculas = $peliculasBL->obtener($id_pelicula);

        require("directorReglasNegocio.php");
        $id_director = $_GET["id_director"];
        $directoresBL = new DirectoresReglasNegocio();
        $datosDirectores = $directoresBL->obtener($id_director);
        
        foreach ($datosPeliculas as $pelicula)
        {
            echo "<h1>".$pelicula->getTitulo()."</h1>";
            echo "<div><h3>Año: </h3>".$pelicula->getAnyo()."</div>";
            echo "<div><h3>Duración (min): </h3>".$pelicula->getDuracion()."</div>";
            echo "<div><h3>Sinopsis: </h3>".$pelicula->getSinopsis()."</div>";
            echo "<div><h3>Votos: </h3>".$pelicula->getVotos()."</div>";
        }

        foreach ($datosDirectores as $director)
        {
            echo "<div><h3>Director: </h3>".$director->getNombre()."</div>";
        }
    ?>
</body>

</html>