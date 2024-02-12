<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess</title>
    <link rel="shortcut icon" href="../../img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/chess_menu_styles.css">
    <script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['name']))
        {
            header("Location: ../index.php");
        }
    ?>

    <header id="main-header">
        <a id="logo-header" href="index.php">
			<span class="site-name">CHESS</span>
			<span class="site-desc">GAME</span>
		</a>

		<nav>
			<ul>
                <?php
        			session_start();
                    if (isset($_SESSION["visits"]))
                    $_SESSION["visits"] = 0;
                
					if (!isset($_SESSION['name']))
					{
						echo "<li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>
						<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\">Register</button></a><a href=\"../index.php\"><button class=\"glow-on-hover user-buttons\">Login</button></a></div>";
					}
					else if ($_SESSION['premium'] == "yes")
					{
						echo "<li><p><i class=\"fa-solid fa-star\"></i> Premium</p></li><li><a href=\"new_gameView.php\"><button class=\"glow-on-hover\">New Game</button></a></li><li><a href=\"gameListView.php\"><button class=\"glow-on-hover\">Matches List</button></a></li><li><a href=\"logout.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
					else
					{
						echo "<li><a href=\"new_gameView.php\"><button class=\"glow-on-hover\">New Game</button></a></li><li><a href=\"logout.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
    			?>
			</ul>
		</nav>
	</header>

    <main id="new-game-content">
        <section class="create-game">
            <form action="boardView.php" method="post">
                <h1>Create Match</h1>
                <p>Player 1 (BLACK)</p>
                <select name="player1" id="player1">
                    <?php
                        require("../Business/playersBL.php");    
                        $playersBL = new PlayersBL();
                        $playersData = $playersBL->obtain();
    
                        foreach ($playersData as $player)
                        {
                            echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                        }
                    ?>
                </select>
                <p>Player 2 (WHITE)</p>
                <select name="player2" id="player2">
                    <?php
                        foreach ($playersData as $player)
                        {
                            echo "<option value=\"{$player->getID()}\">{$player->getName()}</option>";
                        }
                    ?>
                </select>
                <br>
                <label for="title">Title</label>
                <br>
                <input type="text" class="text" id="title" name="title" maxlength="50" required>
                <br><br>
                <button class="glow-on-hover"><input class="createInput" type="submit" value="Create"></button>
            </form>
        </section>
    </main>

    <footer id="main-footer">
		<p>&copy; 2023-2024 <a href="welcomeView.php">Chess Game</a></p>
	</footer>

    <script src="../../js/script.js"></script>
</body>
</html>