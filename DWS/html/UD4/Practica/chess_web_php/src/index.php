<?php
    require ("Business/userBL.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $userBL = new userBL();
        $profile = $userBL->verify($_POST['name'],$_POST['password']);
        
        try {
            if ($profile['name']==$_POST['name'])
            {
                session_start();
                $_SESSION['name'] = $profile['name'];
                $_SESSION['premium'] = $profile['premium'];
                header("Location: Views/welcomeView.php");
            }
            else
            {
                $error = true;
            }
        } catch (Throwable $th) {
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="shortcut icon" href="../img/favicon.svg" type="image/x-icon">
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
				<?php
        			session_start();
					if (!isset($_SESSION['name']))
					{
						echo "<div id=\"sub-menu\"><a href=\"Views/registerView.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-plus\"></i> Register</button></a><a href=\"index.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-right-to-bracket\"></i> Login</button></a></div><li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>";
					}
    			?>
			</ul>
		</nav>
	</header>

    <main id="user-content">
        <section class="user">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1>Login</h1>
                <label for = "name">Name:</label>
                <br>
                <input id="name" class="text" name = "name" type = "text">
                <br>
                <label for="password">Password:</label>
                <br>
                <input id="password" class="text" name = "password" type = "password" minlength="8">
                <br><br>
                <button class="glow-on-hover"><input class="createInput" type="submit" value="Login"></button>
            </form>

            <?php
                if (isset($error))
                {
                    print("<div>Incorrect username or password.</div>");
                }
            ?>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023-2024 <a href="Views/welcomeView.php">Chess Game</a></p>
	</footer>
</body>
</html>