
<?php

require("Infrastructure/userDAL.php");

function test_alta_usuario()
{
    $u = new userDAL();
    return $u->insert('alex','jugador','passwordalex');
}


var_dump(test_alta_usuario());