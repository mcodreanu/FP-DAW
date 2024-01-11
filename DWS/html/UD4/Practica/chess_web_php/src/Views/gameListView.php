<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../../css/chess_menu_styles.css">
    <script src="../../js/script.js"></script>
    <script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['name']))
        {
            header("Location: loginView.php");
        }
        else if ($_SESSION['premium'] == "no")
        {
            header("Location: ../index.php");
        }
    ?>

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
						echo "<li><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-user\"></i></button></li>
						<div id=\"sub-menu\"><a href=\"registerView.php\"><button class=\"glow-on-hover user-buttons\">Register</button></a><a href=\"loginView.php\"><button class=\"glow-on-hover user-buttons\">Login</button></a></div>";
					}
					else if ($_SESSION['premium'] == "yes")
					{
						echo "<li><p>Premium</p></li><li><a href=\"new_gameView.php\"><button class=\"glow-on-hover\">New Game</button></a></li><li><a href=\"gameListView.php\"><button class=\"glow-on-hover\">Matches List</button></a></li><li><a href=\"logout.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
					else
					{
						echo "<li><a href=\"new_gameView.php\"><button class=\"glow-on-hover\">New Game</button></a></li><li><a href=\"logout.php\"><button id=\"user-menu\" class=\"glow-on-hover user-button\"><i class=\"fa-solid fa-sign-out\"></i></button></a>";
					}
    			?>
			</ul>
		</nav>
	</header>

    <main id="list-view-content">
        <section id="table-section">
            <h1>Matches List</h1>
            <div id="constrainer">
                <div class="scrolltable">
                    <table id="matches" class="matches-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Start Date</th>
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
                                require("../Business/matchesBL.php");    
                                $matchesBL = new MatchesBL();

                                require("../Business/playersBL.php");    
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

                                if (isset($_POST["date"]) && $_POST["date"] == "startDate")
                                {
                                    $matchesData = $matchesBL->obtainFilteredStartDate();
                                }
                                else if (isset($_POST["date"]) && $_POST["date"] == "endDate")
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

        <section id="filter-section">
            <div id = "filters">
                <form action="gameListView.php" id="filter-form" method="post">
                    <label class="radio" for="startDate">
                        <input type="radio" name="date" id="startDate" value="startDate"/> Start Date
                    </label>
                    <label class="radio" for="endDate">
                        <input type="radio" name="date" id="endDate" value="endDate"/> End Date
                    </label>
                    <div>
                        <input class="filter-btn" type="submit" value="Filter">
                        <input class="filter-btn" type="submit" value="Reset">
                    </div>
                </form>

                <select id="filter">
                    <option disabled selected value="none">Select a state</option>
                    <option>En curso</option>
                    <option>Jaque mate</option>
                    <option>Tablas</option>
                </select>
            </div>
        </section>
	</main>

    <footer id="main-footer">
		<p>&copy; 2023 <a href="../index.php">Chess Game</a></p>
	</footer>
</body>
</html>