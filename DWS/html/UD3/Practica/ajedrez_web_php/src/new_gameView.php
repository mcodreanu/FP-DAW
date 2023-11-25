<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../css/chess_menu_styles.css">
</head>
<body>
    <header id="main-header">
		<a id="logo-header" href="index.php">
			<span class="site-name">CHESS</span>
			<span class="site-desc">GAME</span>
		</a>

		<nav>
			<ul>
                <li><a href="new_gameView.php"><button class="glow-on-hover">New Game</button></a></li>
				<li><a href="gameListView.php"><button class="glow-on-hover">Matches List</button></a></li>
			</ul>
		</nav>
	</header>

    <main id="new-game-content">
        <section class="create-game">
            <form action="boardView.php" method="post">
                <h1>Create Match</h1>
                <p>Player 1</p>
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
                <p>Player 2</p>
                <select name="player2" id="player2">
                <?php
                    foreach ($datosPlayers as $player)
                    {
                        echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                    }
                ?>
                </select>
                <br>
                <label for="title">Title</label>
                <br>
                <input type="text" id="title" name="title">
                <br><br>
                <button class="glow-on-hover"><input class="createInput" type="submit" value="Create"></button>
            </form>
        </section>
    </main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="#">Chess Game</a></p>
	</footer>
</body>
</html>