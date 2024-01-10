<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../../css/chess_menu_styles.css">
	<script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
	<script src="../../js/script.js"></script>
</head>
<body>
    <header id="main-header">
		<a id="logo-header" href="../index.php">
			<span class="site-name">CHESS</span>
			<span class="site-desc">GAME</span>
		</a>

		<nav>
			<ul>
				<li><a href="new_gameView.php"><button class="glow-on-hover">New Game</button></a></li>
				<li><a href="gameListView.php"><button class="glow-on-hover">Matches List</button></a></li>
				<?php
        			session_start();
					if (!isset($_SESSION['name']))
					{
						echo "<li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>
						<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\">Register</button></a><a href=\"loginView.php\"><button class=\"glow-on-hover user-buttons\">Login</button></a></div>";
					}
					else 
					{
						echo "<li><a href=\"logoutView.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
    			?>
			</ul>
		</nav>
	</header>

    <main id="user-content">
        <section class="user">
            <form method = "POST" action="register.php">
                <h1>Register</h1>
                <label for = "name">Name: </label>
                <input id="name" name = "name" type = "text">
                <br>
                <label for = "email">Email: </label>
                <input id="email" name = "email" type = "email">
                <br>
                <label for = "password">Password: </label>
                <input id = "password" name = "password" type = "password" min="8">
                <br>
                <label for="premium">Premium:</label>
                <input id="premium" name="premium" type="checkbox">
                <br>
                <button class="glow-on-hover"><input class="createInput" type="submit" value="Register"></button>
            </form>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="../index.php">Chess Game</a></p>
	</footer>
</body>
</html>