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

            <div id = "filters">
                <p>Filters</p>
                <form action="gameListView.php" id="filter-form" method="post">
                    <label for = "startDate">
                        <input type="radio" name="date" id="startDate" value="startDate"/>
                            Start Date
                    </label>
                    <label for = "endDate">
                        <input type="radio" name="date" id="endDate" value="endDate"/>
                            End Date
                    </label>
                    <input class="filter-btn" type="submit" value="Filter">
                    <input class="filter-btn" type="submit" value="Reset">
                </form>

                <select id="filter">
                    <option disabled selected value="none">Select a state</option>
                    <option>None</option>
                    <option>En curso</option>
                    <option>Jaque mate</option>
                    <option>Tablas</option>
                </select>
            </div>

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
                                $filter = $_POST["date"];

                                require("../Negocio/playersBL.php");    
                                $playersBL = new PlayersBL();
                                $playersData = $playersBL->obtain();
                                $players = array();

                                function array_push_assoc($array, $key, $value){
                                    $array[$key] = $value;
                                    return $array;
                                 }
    
                                foreach ($playersData as $player)
                                {
                                    $players = array_push_assoc($players, $player->getID(), $player->getName());
                                }

                                if (isset($filter) && $filter == "startDate")
                                {
                                    $matchesData = $matchesBL->obtainFilteredStartDate();
                                }
                                else if (isset($filter) && $filter == "endDate")
                                {
                                    $matchesData = $matchesBL->obtainFilteredEndDate();
                                }
                                else
                                {
                                    $matchesData = $matchesBL->obtain();
                                }

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
                                    <td>{$players[$match->getWhite()]}</td>
                                    <td>{$players[$match->getBlack()]}</td>
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