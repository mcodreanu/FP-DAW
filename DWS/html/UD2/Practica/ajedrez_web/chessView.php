<?php
    echo "<style>";
    include('css/chess_game_styles.css');
    echo "</style>";

    $board = "r,n,b,q,k,b,n,r,p,p,p,p,p,p,p,p,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,P,P,P,P,P,P,P,P,R,N,B,Q,K,B,N,R";

    function DrawChessGame($board)
    {
        $pieces = explode(",", $board);
        $dead_pieces_white = array("0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","P","P","P","P","P","P","P","P","R","N","B","Q","K","B","N","R");
        $dead_pieces_black = array("r","n","b","q","k","b","n","r","p","p","p","p","p","p","p","p","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","R");
        
        echo "<div class=\"dead-container\">";
        for ($i = 0; $i < count($dead_pieces_white); $i++)
        {
            if ($dead_pieces_white[$i] != $pieces[$i] && $dead_pieces_white[$i] != "0")
                echo "<div class=\"piece\"><img src=\"img/{$dead_pieces_white[$i]}.png\" alt=\"\"></div>";
        }
        echo "</div>";

        echo"<div class=\"container\">";
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

        echo "<div class=\"pieces\">";
        for ($i = 0; $i < count($pieces); $i++)
        {
            echo "<div class=\"piece\"><img src=\"img/{$pieces[$i]}.png\" alt=\"\"></div>";
        }
        echo "</div>";
        echo "</div>";
        
        echo "<div class=\"dead-container\">";
        for ($i = 0; $i < count($dead_pieces_black); $i++)
        {
            if ($dead_pieces_black[$i] != $pieces[$i] && $dead_pieces_black[$i] != "0")
                echo "<div class=\"piece\"><img src=\"img/{$dead_pieces_black[$i]}.png\" alt=\"\"></div>";
        }
        echo "</div>";
    }

    DrawChessGame($board);