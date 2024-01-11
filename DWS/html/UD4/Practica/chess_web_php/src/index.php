<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../css/chess_menu_styles.css">
	<script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
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
				<li><a href="Views/new_gameView.php"><button class="glow-on-hover">New Game</button></a></li>
				<li><a href="Views/gameListView.php"><button class="glow-on-hover">Matches List</button></a></li>
				<?php
        			session_start();
					if (!isset($_SESSION['name']))
					{
						echo "<li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>
						<div id=\"sub-menu\"><a href=\"Views/registerView.php\"><button class=\"glow-on-hover user-buttons\">Register</button></a><a href=\"Views/loginView.php\"><button class=\"glow-on-hover user-buttons\">Login</button></a></div>";
					}
					else 
					{
						echo "<li><a href=\"Views/logout.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
    			?>
			</ul>
		</nav>
	</header>

    <main id="main-content">
		<h1 id="index-title">WELCOME TO CHESS!</h1>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="index.php">Chess Game</a></p>
	</footer>
</body>
</html>