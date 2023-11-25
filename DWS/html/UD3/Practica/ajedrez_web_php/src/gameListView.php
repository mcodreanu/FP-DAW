<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../css/chess_menu_styles.css">
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
				<li><a href="new_gameView.php"><button class="glow-on-hover">New Game</button></a></li>
				<li><a href="gameListView.php"><button class="glow-on-hover">Matches List</button></a></li>
			</ul>
		</nav>
	</header>

    <main id="list-view-content">
        <section>
            <h1>Matches List</h1>
            <div>
            <table id="matches-table">
                <thead id>
                    <tr>
                        <th>ID</th>
                        <th><a href="javascript:SortTable(0,'T');">Title</a></th>
                        <th><a href="javascript:SortTable(3,'D','dmy');">Start Date</a></th>
                        <th>Start Time</th>
                        <th>State</th>
                        <th>Winner</th>
                        <th><a href="javascript:SortTable(3,'D','dmy');">End Date</a></th>
                        <th>End Time</th>
                        <th>White Pieces</th>
                        <th>Black Pieces</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require("matchesReglasNegocio.php");    
                    $matchesBL = new MatchesReglasNegocio();
                    $datosMatches = $matchesBL->obtener();
    
                    foreach ($datosMatches as $matches)
                    {
                        echo "<tr>
                        <td>{$matches->getID()}</td>
                        <td><a href=\"\">{$matches->getTitle()}</a></td>
                        <td>{$matches->getStartDate()}</td>
                        <td>{$matches->getStartTime()}</td>
                        <td>{$matches->getState()}</td>
                        <td>{$matches->getWinner()}</td>
                        <td>{$matches->getEndDate()}</td>
                        <td>{$matches->getEndTime()}</td>
                        <td>{$matches->getWhite()}</td>
                        <td>{$matches->getBlack()}</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            </div>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="#">Chess Game</a></p>
	</footer>
</body>
</html>