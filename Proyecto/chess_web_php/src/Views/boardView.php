<?php
    session_start();
    if (!isset($_SESSION['name']))
    {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess</title>
    <link rel="shortcut icon" href="../../img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../css/chess_game_styles.css">
    <script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
<?php
    require("../Business/statesBL.php");
    $statesBL = new StatesBL();
    require("../Business/apiBL.php");
    $apiBL = new ApiBL();
    require("../Business/matchesBL.php");    
    $matchesBL = new MatchesBL();
    require("../Business/playersBL.php");    
    $playersBL = new PlayersBL();
    
    function obtainBoard($statesBL, $apiBL) 
    {
        if (isset($_GET['state']))
        {    
            $id_match = $_GET["id_match"];
            $statesData = $statesBL->obtain($id_match);
            $board = array();

            foreach ($statesData as $state)
            {
                array_push($board, $state->getBoard());
            }
        }
        else
        {
            if (!isset($_SESSION["visits"]) || $_SESSION["visits"] == 0)
            {
                $board = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";
                $apiBL->resetGameState();
            }
            else
            {
                $statesData = $statesBL->obtainLastState();

                foreach ($statesData as $state)
                {
                    $board = $state->getBoard();
                }
            }
        }    

        return $board;
    }

    $board = obtainBoard($statesBL, $apiBL);

    function insertMatches($board, $statesBL, $matchesBL) 
    {
        if (!(isset($_GET['state'])))
        {
            if (!isset($_SESSION["visits"]))
            $_SESSION["visits"] = 0;
            $_SESSION["visits"] = $_SESSION["visits"] + 1;

            if ($_SESSION["visits"] == 1)
            {
                $title = $_POST["title"];
                $id_player1 = $_POST["player1"];
                $id_player2 = $_POST["player2"];
                $matchesBL->insert($title,$id_player1,$id_player2);

                $statesBL->insert($board);
            }
            else
            {
                return;
            }
        }
        else
        {
            return;
        }
    }
    
    function changeStates($board, $statesBL)
    {
        if (isset($_GET['state']))
        {
            $states = obtainBoard($statesBL);
            $board = $states[$_GET['state']];
        }
        
        return $board;
    }

    $board = changeStates($board, $statesBL);
    
    function DrawChessGame($board, $apiBL, $statesBL, $matchesBL, $playersBL)
    {
        $pieces = str_split($board);
        $numPieces = CountPieces($pieces);

        insertMatches($board, $statesBL, $matchesBL);

        echo "<div class=\"container\">";
        echo "<div class=\"game-container\">";
        echo "<div class=\"dead-container\">";
        DrawDeadWhite($numPieces);
        echo "</div>";
        
        echo"<div class=\"board-container\">";
        DrawBoard();
        DrawPieces($pieces);
        echo "</div>";

        echo "<div class=\"dead-container\">";
        DrawDeadBlack($numPieces);
        echo "</div>";
        echo "</div>";
        echo "<div class=\"info-container\">";
        DrawInfo($board, $apiBL, $matchesBL, $playersBL, $statesBL);
        echo "</div>";
        echo "</div>";
    }

    function DrawInfo($board, $apiBL, $matchesBL, $playersBL, $statesBL)
    {
        $score = $apiBL->obtainScore($board);

        if (isset($_GET['id_match']))
        {
            $matchesData = $matchesBL->obtain();
            $player_white = 0;
            $player_black = 0;
            $title = "";

            foreach ($matchesData as $match)
            {
                if ($_GET['id_match'] == $match->getID())
                {
                    $title = $match->getTitle();
                    $player_white = $match->getWhite();
                    $player_black = $match->getBlack();
                }
            }

            $playersData = $playersBL->obtain();
            $players = array();
        
            foreach ($playersData as $player)
            {
            array_push($players, $player->getName());
            }

            echo"<div class=\"info-board\">";
            echo "<h1 class=\"title\">".$title."</h1>";
            echo "<div class=\"info\"><h1>Black: ".$players[$player_black - 1]."&nbsp;&nbsp;&nbsp;&nbsp;".$score["materialValueBlack"]."</h1>";
            echo "<h1>White: ".$players[$player_white - 1]."&nbsp;&nbsp;&nbsp;&nbsp;".$score["materialValueWhite"]."</h1>";
            echo "<h1>".$score["distanceMsg"]."</h1></div>";
            DrawHistoryButtons($statesBL);
            echo "</div>";
        } 
        else
        {
            if (isset($_POST["player1"]) && isset($_POST["player2"]) && isset($_POST["title"]))
            {
                $id_player1 = $_POST["player1"];
                $id_player2 = $_POST["player2"];
                $title = $_POST["title"];

                $_SESSION['player1_name'] = $id_player1;
                $_SESSION['player2_name'] = $id_player2;
                $_SESSION['title'] = $title;
            }

            $playersData = $playersBL->obtain();
            $players = array();
        
            foreach ($playersData as $player)
            {
                array_push($players, $player->getName());
            }

            echo"<div class=\"info-board\">";
            echo"<div id=\"choice-container\">";
            echo"<select name=\"choices\" id=\"choices\">
                    <option value=\"1\">Queen</option>
                    <option value=\"2\">Rook</option>
                    <option value=\"3\">Knight</option>
                    <option value=\"4\">Bishop</option>
                </select>";
            echo"</div>";
            echo "<h1 class=\"title\">".$_SESSION['title']."</h1>";
            echo "<h1 class=\"turn-indicator\"></h1>";
            echo "<div class=\"info\"><h1>Black: ".$players[$_SESSION['player1_name'] - 1]."&nbsp;&nbsp;&nbsp;&nbsp;".$score["materialValueBlack"]."</h1>";
            echo "<h1>White: ".$players[$_SESSION['player2_name'] - 1]."&nbsp;&nbsp;&nbsp;&nbsp;".$score["materialValueWhite"]."</h1>";
            echo "<h1>".$score["distanceMsg"]."</h1></div>";
            echo "<a href=\"welcomeView.php\"><button><i class=\"fa-solid fa-house\"></i></button></a>";
            echo "</div>";
        }
    }
    function DrawHistoryButtons($statesBL)
    {
        $current = $_GET['state'];
        
        if (isset($_GET['state']))
        {
            $id_match = $_GET["id_match"];
            $statesData = $statesBL->obtain($id_match);
            $id_game = 0;
            $states = array();

            foreach ($statesData as $state)
            {
                $id_game = $state->getIDGame();
                array_push($states, $state->getID());
            }

            $next = $current + 1;
            $prev = $current - 1;
            $first = 0;
            $last = count($states) - 1;

            if ($prev == -1) 
            {
                $prev = 0;
            }

            if ($next == count($states))
            {
                $next = count($states) - 1;
            }

            echo "<a href=\"?id_match={$id_game}&state={$first}\"><button><i class=\"fa-solid fa-angles-left\"></i></button></a>
                <a href=\"?id_match={$id_game}&state={$prev}\"><button><i class=\"fa-solid fa-angle-left\"></i></button></a>
                <a href=\"?id_match={$id_game}&state={$next}\"><button><i class=\"fa-solid fa-angle-right\"></i></button></a>
                <a href=\"?id_match={$id_game}&state={$last}\"><button><i class=\"fa-solid fa-angles-right\"></i></button></a>
                <a href=\"gameListView.php\"><button><i class=\"fa-solid fa-house\"></i></button></a>";
        }   
    }

    function DrawBoard()
    {
        echo "<div class=\"board\">";
        for ($i = 0; $i < 8; $i++) 
        {
            for ($j = 0; $j < 8; $j++)
            {
                if (($i + $j) % 2 == 0)
                    echo "<div class=\"white-squares\"></div>";
                else
                    echo "<div class=\"black-squares\"></div>";   
            }
        }
        echo "</div>";
    }

    function DrawPieces($pieces)
    {
        $pos = 0;
        echo "<div class=\"pieces-container\">";
        for ($i = 0; $i < count($pieces); $i++)
        {
            if ($pieces[$i] == 8 && $pieces[$i] != "/")
            {
                for ($j = 0; $j < 8; $j++)
                {
                    echo "<div class=\"piece\" data-piece-id=\"{$pos}\"></div>";
                    $pos++;
                }
            }
            else if ($pieces[$i] == 1 || $pieces[$i] == 2 || $pieces[$i] == 3 || $pieces[$i] == 4 || $pieces[$i] == 5 || $pieces[$i] == 6 || $pieces[$i] == 7 && $pieces[$i] != "/")
            {
                for ($j = 0; $j < $pieces[$i]; $j++)
                {
                    echo "<div class=\"piece\" data-piece-id=\"{$pos}\"></div>";
                    $pos++;
                }
            }
            else if ($pieces[$i] != "/" && strtoupper($pieces[$i]) == $pieces[$i])
            {
                echo "<div class=\"piece\" data-piece-id=\"{$pos}\"><img src=\"../../img/White/{$pieces[$i]}.svg\" alt=\"\"></div>";
                $pos++;
            }
            else if ($pieces[$i] != "/" && strtolower($pieces[$i]) == $pieces[$i])
            {
                echo "<div class=\"piece\" data-piece-id=\"{$pos}\"><img src=\"../../img/Black/{$pieces[$i]}.svg\" alt=\"\"></div>";
                $pos++;
            }
        }
        echo "</div>";
    }

    function CountPieces($pieces)
    {
        $numPieces = array(
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0
            );
    
            for ($i = 0; $i < count($pieces); $i++)
            {
                switch ($pieces[$i])
                {
                    case "P":
                        $numPieces[0]++;
                        break;
                    case "R":
                        $numPieces[1]++;
                        break;
                    case "N":
                        $numPieces[2]++;
                        break;
                    case "B":
                        $numPieces[3]++;
                        break;
                    case "Q":
                        $numPieces[4]++;
                        break;
                    case "p":
                        $numPieces[5]++;
                        break;
                    case "r":
                        $numPieces[6]++;
                        break;
                    case "n":
                        $numPieces[7]++;
                        break;
                    case "b":
                        $numPieces[8]++;
                        break;
                    case "q":
                        $numPieces[9]++;
                        break;
                }
            }

        return $numPieces;
    }

    function DrawDeadWhite($numPieces)
    {
        $dead_pieces_white = array(
            "P" => 8,
            "R" => 2,
            "N" => 2,
            "B" => 2,
            "Q" => 1
        );

        for ($i = 0; $i < ($dead_pieces_white["P"] - $numPieces[0]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/White/P.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["R"] - $numPieces[1]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/White/R.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["N"] - $numPieces[2]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/White/N.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["B"] - $numPieces[3]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/White/B.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["Q"] - $numPieces[4]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/White/Q.svg\" alt=\"\"></div>";
        }
    }

    function DrawDeadBlack($numPieces)
    {
        $dead_pieces_black = array(
            "p" => 8,
            "r" => 2,
            "n" => 2,
            "b" => 2,
            "q" => 1
        );

        for ($i = 0; $i < ($dead_pieces_black["p"] - $numPieces[5]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/Black/p.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["r"] - $numPieces[6]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/Black/r.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["n"] - $numPieces[7]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/Black/n.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["b"] - $numPieces[8]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/Black/b.svg\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["q"] - $numPieces[9]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/Black/q.svg\" alt=\"\"></div>";
        }
    }

    DrawChessGame($board, $apiBL, $statesBL, $matchesBL, $playersBL);
    ?>


    <script src="../../js/game.js"></script>
</body>
</html>