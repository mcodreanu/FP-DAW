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

var_dump($premium);

$userDAL = new userDAL();
$userDAL->insert($_POST['name'],$_POST['email'],$_POST['password'],$premium);

header("Location: loginView.php");