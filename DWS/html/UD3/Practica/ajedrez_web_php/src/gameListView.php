<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../css/chess_menu_styles.css">
    <script src="../js/script.js"></script>
</head>
<body>
<header id="main-header">
		<a id="logo-header" href="index.php">
			<span class="site-name">CHESS</span>
			<span class="site-desc">GAME</span>
		</a>

		<nav>
			<ul>
				<li><button class="glow-on-hover"><a href="new_gameView.php">Nueva partida</a></button></li>
				<li><button class="glow-on-hover"><a href="gameListView.php">Lista de partidas</a></button></li>
			</ul>
		</nav>
	</header>

    <main id="list-view-content">
        <section>
            <h1>Lista Partidas</h1>
            <div>
            <table id="myTable2" class="resize-table-font">
                <thead>
                    <tr>
                        <th class="sortable">ID</th>
                        <th>Descripción</th>
                        <th>Fecha inicio</th>
                        <th>Hora inicio</th>
                        <th>Estado</th>
                        <th>Ganador</th>
                        <th>Fecha fin</th>
                        <th>Hora fin</th>
                        <th>Piezas Blancas</th>
                        <th>Piezas Negras</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require("matchesReglasNegocio.php");    
                    $matchesBL = new MatchesReglasNegocio();
                    $datosMatches = $matchesBL->obtener();
    
                    foreach ($datosMatches as $matches)
                    {
                        echo "<tr>
                        <td>{$matches->getID()}</td>
                        <td><a href=\"\">{$matches->getTitle()}</a></td>
                        <td>{$matches->getStartDate()}</td>
                        <td>{$matches->getStartTime()}</td>
                        <td>{$matches->getState()}</td>
                        <td>{$matches->getWinner()}</td>
                        <td>{$matches->getEndDate()}</td>
                        <td>{$matches->getEndTime()}</td>
                        <td>{$matches->getWhite()}</td>
                        <td>{$matches->getBlack()}</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            </div>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="#">Chess Game</a></p>
	</footer>
</body>
</html>