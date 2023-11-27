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
            <select id="filter">
                <option disabled selected value="none">Select a state</option>
                <option>En curso</option>
                <option>Jaque mate</option>
                <option>Tablas</option>
            </select>

            <div id="constrainer">
                <div class="scrolltable">
                    <table class="matches-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><a href="javascript:SortTable(0,'T');">Title</a></th>
                                <th><a href="javascript:SortTable(3,'D','dmy');">Start Date</a></th>
                                <th>Start Time</th>
                                <th>State</th>
                                <th>Winner</th>
                                <th><a href="javascript:SortTable(4,'D','dmy');">End Date</a></th>
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
                    
                                foreach ($datosMatches as $match)
                                {
                                    echo "<tr>
                                    <td>{$match->getID()}</td>
                                    <td><a href=\"boardView.php?id_match={$match->getID()}&state=0\">{$match->getTitle()}</a></td>
                                    <td>{$match->getStartDate()}</td>
                                    <td>{$match->getStartTime()}</td>
                                    <td>{$match->getState()}</td>
                                    <td>{$match->getWinner()}</td>
                                    <td>{$match->getEndDate()}</td>
                                    <td>{$match->getEndTime()}</td>
                                    <td>{$match->getWhite()}</td>
                                    <td>{$match->getBlack()}</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="#">Chess Game</a></p>
	</footer>
</body>
</html>