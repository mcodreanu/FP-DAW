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
		<nav>
			<div class="logo">
				<a href="welcomeView.php">
					<h4>CHESS GAME</h4>
				</a>
			</div>
			<ul class="nav-links">
				<?php
					if (!isset($_SESSION['name']))
					{
						echo "<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-plus\"></i> Register</button></a><a href=\"../index.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-right-to-bracket\"></i> Login</button></a></div><li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>";
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
			<div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div>
		</nav>
	</header>

    <main id="main-content">
		<h1 id="index-title">WELCOME TO CHESS!</h1>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023-2024 <a href="welcomeView.php">Chess Game</a></p>
	</footer>

	<script src="../../js/script.js"></script>
</body>
</html>