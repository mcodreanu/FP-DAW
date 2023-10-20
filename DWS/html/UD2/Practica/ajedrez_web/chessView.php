<?php
    echo "<style>";
    include('css/chess_game_styles.css');
    echo "</style>";

    $board = "ROBL,KNBL,BIBL,QUBL,KIBL,BIBL,KNBL,ROBL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,PABL,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,PAWH,ROWH,KNWH,BIWH,QUWH,KIWH,BIWH,KNWH,ROWH";

    function DrawChessGame($board)
    {
        echo"<div class=\"contenedor\">";
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

        $pieces = explode(",", $board);

        echo "<div class=\"pieces\">";
        for ($i = 0; $i < count($pieces); $i++)
        {
            echo "<div class=\"piece\"><img src=\"img/{$pieces[$i]}.png\" alt=\"\"></div>";
        }
        echo "</div>";
        echo "</div>";
    }

    echo DrawChessGame($board);