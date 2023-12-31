<?php
    echo "<style>";
    include('css/chess_game_styles.css');
    echo "</style>";

    $board = "r1bk3r/p2pBpNp/n4n2/1p1NP2P/6P1/3P4/P1P1K3/q5b1";

    function DrawChessGame($board)
    {
        $pieces = str_split($board);
        $numPieces = CountPieces($pieces);

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
                echo "<div class=\"piece\"><img src=\"img/{$pieces[$i]}.png\" alt=\"\"></div>";
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
            echo "<div class=\"dead-piece\"><img src=\"img/P.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["R"] - $numPieces[1]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/R.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["N"] - $numPieces[2]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/N.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["B"] - $numPieces[3]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/B.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_white["Q"] - $numPieces[4]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/Q.png\" alt=\"\"></div>";
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
            echo "<div class=\"dead-piece\"><img src=\"img/p.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["r"] - $numPieces[6]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/r.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["n"] - $numPieces[7]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/n.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["b"] - $numPieces[8]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/b.png\" alt=\"\"></div>";
        }

        for ($i = 0; $i < ($dead_pieces_black["q"] - $numPieces[9]); $i++)
        {
            echo "<div class=\"dead-piece\"><img src=\"img/q.png\" alt=\"\"></div>";
        }
    }

    DrawChessGame($board);