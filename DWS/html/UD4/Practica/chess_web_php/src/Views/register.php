<?php
require("../Infrastructure/userDAL.php");

if (isset($_POST['premium']))
{
    $premium = "si";
}
else
{
    $premium = "no";
}

$u = new userDAL();
$u->insert($_POST['name'],$_POST['email'],$_POST['password'],$premium);

header("Location: loginView.php");