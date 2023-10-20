<?php
    echo "<style>";
    include('css/chess_game_styles.css');
    echo "</style>";

    echo"<div class=\"contenedor black-squares\">";
    for ($i = 0; $i < 8; $i++) 
    {
        for ($j = 0; $j < 8; $j++)
        {
            if (($i + $j) % 2 == 0)
                echo "<div class=\"black-squares\"><img src=\"img/bpawn.png\" alt=\"\"></div>";
            else
                echo "<div class=\"white-squares\"><img src=\"img/bpawn.png\" alt=\"\"></div>";
        }
    }
    echo "</div>";