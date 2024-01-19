<?php
        session_start();
        if (!isset($_SESSION['name']))
        {
            header("Location: ../index.php");
        }
        ini_set('display_errors', 'On');
ini_set('html_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chess</title>
    <link rel="stylesheet" href="../../css/chess_game_styles.css">
    <script src="https://kit.fontawesome.com/5fe1b9d82e.js" crossorigin="anonymous"></script>
    <script src="../../js/script.js"></script>
</head>

<body>
<?php
    $board = "rnbqkbnr/pp1ppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";

    function insertMatches() 
    {
        if (!(isset($_GET['state'])))
        {
            require("../Business/matchesBL.php");    
            $matchesBL = new MatchesBL();
            $title = $_POST["title"];
            $id_player1 = $_POST["player1"];
            $id_player2 = $_POST["player2"];
            $matchesBL->insert($title,$id_player1,$id_player2);

            require("../Business/statesBL.php");    
            $statesBL = new StatesBL();
            $statesBL->insert();
        }
        else
        {
            return;
        }
    }

    function obtainBoard() 
    {
        require("../Business/statesBL.php");    
        $statesBL = new StatesBL();
        $id_match = $_GET["id_match"];
        $statesData = $statesBL->obtain($id_match);
        $board = array();

        foreach ($statesData as $state)
        {
            array_push($board, $state->getBoard());
        }

        return $board;
    }
    
    function changeStates($board)
    {
        if (isset($_GET['state']))
        {
            $states = obtainBoard();
            $board = $states[$_GET['state']];
        }
        
        return $board;
    }

    $board = changeStates($board);
    
    function DrawChessGame($board)
    {
        $pieces = str_split($board);
        $numPieces = CountPieces($pieces);
        insertMatches();

        echo "<div class=\"dead-container\">";
        DrawDeadWhite($numPieces);
        echo "</div>";
        
        echo"<div class=\"container\">";
        DrawBoard();
        DrawPieces($pieces);
        echo "</div>";

        echo "<div class=\"dead-container\">";
        DrawDeadBlack($numPieces);
        echo "</div>";

        DrawInfo($board);
    }

    function DrawInfo($board)
    {
        require("../Infrastructure/apiDAL.php");
        $apiDAL = new apiDAL();
        $apiData = $apiDAL->obtain($board);

        if (isset($_GET['id_match']))
        {
            require("../Business/matchesBL.php");    
            $matchesBL = new MatchesBL();
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

            require("../Business/playersBL.php");    
            $playersBL = new PlayersBL();
            $playersData = $playersBL->obtain();
            $players = array();
        
            foreach ($playersData as $player)
            {
            array_push($players, $player->getName());
            }

            echo"<div class=\"info-container\">";
            echo "<h1 class=\"title\">".$title."</h1>";
            echo "<h1>Black: ".$players[$player_black - 1]." - ".$apiData["materialValueBlack"]."</h1>";
            echo "<h1>White: ".$players[$player_white - 1]." - ".$apiData["materialValueWhite"]."</h1>";
            echo "<h1>".$apiData["distanceMsg"]."</h1>";
            DrawHistoryButtons();
            echo "</div>";
        } 
        else
        {
            require("../Business/playersBL.php");    
            $playersBL = new PlayersBL();
            $playersData = $playersBL->obtain();
            $players = array();
            $id_player1 = $_POST["player1"];
            $id_player2 = $_POST["player2"];
            $title = $_POST["title"];
        
            foreach ($playersData as $player)
            {
                array_push($players, $player->getName());
            }

            echo"<div class=\"info-container\">";
            echo "<h1 class=\"title\">".$title."</h1>";
            echo "<h1>Black: ".$players[$id_player1 - 1]." - ".$apiData["materialValueBlack"]."</h1>";
            echo "<h1>White: ".$players[$id_player2 - 1]." - ".$apiData["materialValueWhite"]."</h1>";
            echo "<h1>".$apiData["distanceMsg"]."</h1>";
            echo "<a href=\"welcomeView.php\"><button><i class=\"fa-solid fa-house\"></i></button></a>";
            echo "</div>";
        }
    }

    function DrawHistoryButtons()
    {
        $current = $_GET['state'];
        
        if (isset($_GET['state']))
        {
            $statesBL = new StatesBL();
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
                    echo "<div class=\"black-squares\"></div>";
                else
                    echo "<div class=\"white-squares\"></div>";
            }
        }
        echo "</div>";
    }

    function DrawPieces($pieces)
    {
        echo "<div class=\"pieces-container\">";
        for ($i = 0; $i < count($pieces); $i++)
        {
            if ($pieces[$i] == 8 && $pieces[$i] != "/")
            {
                for ($j = 0; $j < 8; $j++)
                {
                    echo "<div class=\"piece\"></div>";
                }
            }
            else if ($pieces[$i] == 1 || $pieces[$i] == 2 || $pieces[$i] == 3 || $pieces[$i] == 4 || $pieces[$i] == 5 || $pieces[$i] == 6 || $pieces[$i] == 7 && $pieces[$i] != "/")
            {
                for ($j = 0; $j < $pieces[$i]; $j++)
                {
                    echo "<div class=\"piece\"></div>";
                }
            }
            else if ($pieces[$i] != "/")
            {
                echo "<div class=\"piece\"><img src=\"../../img/{$pieces[$i]}.png\" alt=\"\"></div>";
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
            echo "<div class=\"dead-piece\"><img src=\"../../img/P.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["R"] - $numPieces[1]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/R.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["N"] - $numPieces[2]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/N.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["B"] - $numPieces[3]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/B.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["Q"] - $numPieces[4]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/Q.png\" alt=\"\"></div>";
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
            echo "<div class=\"dead-piece\"><img src=\"../../img/p.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["r"] - $numPieces[6]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/r.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["n"] - $numPieces[7]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/n.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["b"] - $numPieces[8]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/b.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["q"] - $numPieces[9]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"../../img/q.png\" alt=\"\"></div>";
        }
    }

    DrawChessGame($board);
    ?>
</body>
</html>