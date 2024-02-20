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

			header("Location: ../index.php");
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess</title>
	<link rel="shortcut icon" href="../../img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/chess_menu_styles.css">
	<script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
</head>
<body>
<header id="main-header">
		<nav>
			<div class="logo">
				<a href="welcomeView.php">
					<h4>CHESS GAME</h4>
				</a>
			</div>
			<ul class="login-ul">
				<?php
        			session_start();
					if (!isset($_SESSION['name']))
					{
						echo "<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-plus\"></i> Register</button></a><a href=\"../index.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-right-to-bracket\"></i> Login</button></a></div><li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>";
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
		<p>&copy; 2023-2024 <a href="welcomeView.php">Chess Game</a></p>
	</footer>

	<script src="../../js/script.js"></script>
</body>
</html>