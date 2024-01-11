<?php
	require("../Infrastructure/userDAL.php");

	if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
		try {
			if (isset($_POST['premium']))
			{
				$premium = "yes";
			}
			else
			{
				$premium = "no";
			}

			$userDAL = new userDAL();
			$userDAL->insert($_POST['name'],$_POST['email'],$_POST['password'],$premium);

			header("Location: loginView.php");
		}
		catch (Exception $e)
		{
			$error = true;
		}
	}	
?>

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
				<?php
        			session_start();
					if (!isset($_SESSION['name']))
					{
						echo "<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\">Register</button></a><a href=\"loginView.php\"><button class=\"glow-on-hover user-buttons\">Login</button></a></div><li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>";
					}
					else 
					{
						echo "<li><a href=\"logout.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
    			?>
			</ul>
		</nav>
	</header>

    <main id="user-content">
        <section class="user">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1>Register</h1>
                <label for="name">Name:</label>
				<br>
                <input id="name" class="text" name="name" type="text" required>
                <br>
                <label for="email" required>Email:</label>
				<br>
                <input id="email" class="text" name="email" type="email">
                <br>
                <label for="password">Password:</label>
				<br>
                <input id="password" class="text" name="password" type="password" minlength="8" required>
                <br>
				<div class="checkbox-wrapper-4">
					<input class="inp-cbx" id="premium" name="premium" type="checkbox"/>
					<label class="cbx" for="premium">
						<span>
							<svg width="12px" height="10px">
								<use xlink:href="#check-4"></use>
							</svg>
						</span>
						<span>Premium</span>
					</label>
					<svg class="inline-svg">
						<symbol id="check-4" viewbox="0 0 12 10">
						<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
						</symbol>
					</svg>
				</div>
                <button class="glow-on-hover"><input class="createInput" type="submit" value="Register"></button>
            </form>
			<?php
                if (isset($error))
                {
                    print("<div>Name already exists.</div>");
                }
            ?>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="../index.php">Chess Game</a></p>
	</footer>
</body>
</html>