<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../css/chess_menu_styles.css">
</head>
<body>
    <header id="main-header">
		<a id="logo-header" href="#">
			<span class="site-name">CHESS</span>
			<span class="site-desc">GAME</span>
		</a>

		<nav>
			<ul>
				<li><a href="new_gameView.php">Nueva partida</a></li>
				<li><a href="gameListView.php">Lista de partidas</a></li>
			</ul>
		</nav>
	</header>

    <section id="new-game-content">
        <form action="boardView.php" method="post">
            <h1>Crear partida</h1>
            <p>Jugador 1</p>
            <select name="player1" id="player1">
                <?php
                    require("playersReglasNegocio.php");    

                    $playersBL = new PlayersReglasNegocio();
                    $datosPlayers = $playersBL->obtener();
    
                    foreach ($datosPlayers as $player)
                    {
                        echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                    }
                ?>
            </select>
            <p>Jugador 2</p>
            <select name="player1" id="player1">
                <?php
                    foreach ($datosPlayers as $player)
                    {
                        echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                    }
                ?>
            </select>
            <br><br>
            <label for="">Título</label>
            <br>
            <input type="text">
            <br><br>
            <input type="submit" value="Aceptar">
        </form>
    </section>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="#">Chess Game</a></p>
	</footer>
</body>
</html>