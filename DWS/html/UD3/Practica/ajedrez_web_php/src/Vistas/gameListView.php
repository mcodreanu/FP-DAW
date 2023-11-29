<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../../css/chess_menu_styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
			</ul>
		</nav>
	</header>

    <main id="list-view-content">
        <section>
            <h1>Matches List</h1>
            <select id="filter">
                <option disabled selected value="none">Select a state</option>
                <option>None</option>
                <option>En curso</option>
                <option>Jaque mate</option>
                <option>Tablas</option>
            </select>

            <div id="constrainer">
                <div class="scrolltable">
                    <table id="matches" class="matches-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="dateTh">Start Date</th>
                                <th>Start Time</th>
                                <th>State</th>
                                <th>Winner</th>
                                <th>End Date</th>
                                <th>End Time</th>
                                <th>White Pieces</th>
                                <th>Black Pieces</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require("../Negocio/matchesBL.php");    
                                $matchesBL = new MatchesBL();
                                $matchesData = $matchesBL->obtain();
                    
                                foreach ($matchesData as $match)
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
		<p>&copy; 2023 <a href="../index.php">Chess Game</a></p>
	</footer>
</body>
</html>