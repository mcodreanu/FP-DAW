<?php
    require ("../Business/userBL.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $userBL = new userBL();
        $profile = $userBL->verify($_POST['name'],$_POST['password']);
        $premium = $userBL->verifyPremium($_POST['name'],$_POST['password']);
        
        if ($profile===$_POST['name'])
        {
            session_start();
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['premium'] = $premium;
            header("Location: ../index.php");
        }
        else
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
						echo "<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-plus\"></i> Register</button></a><a href=\"loginView.php\"><button class=\"glow-on-hover user-buttons\"><i class=\"fa-solid fa-right-to-bracket\"></i> Login</button></a></div><li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>";
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
                <h1>Login</h1>
                <label for = "name">Name:</label>
                <br>
                <input id="name" class="text" name = "name" type = "text">
                <br>
                <label for = "password">Password:</label>
                <br>
                <input id = "password" class="text" name = "password" type = "password" min="8">
                <br><br>
                <button class="glow-on-hover"><input class="createInput" type="submit" value="Login"></button>
            </form>

            <?php
                if (isset($error))
                {
                    print("<div> Incorrect username or password. </div>");
                }
            ?>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="../index.php">Chess Game</a></p>
	</footer>
</body>
</html>