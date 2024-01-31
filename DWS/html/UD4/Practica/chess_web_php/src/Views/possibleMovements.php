<?php
session_start();

require("../Business/apiBL.php");
$apiBL = new ApiBL();
require("../Business/statesBL.php");
$statesBL = new StatesBL();

$fromColumn = $_GET['fromColumn'];
$fromRow = $_GET['fromRow'];

$statesData = $statesBL->obtainLastState();

foreach ($statesData as $state) {
    $boardState = $state->getBoard();
}

$board = $boardState;

$possibleMovements = $apiBL->obtainPossibleMovements($board, $fromColumn, $fromRow);

$response["possibleMovements"] = $possibleMovements;

header('Content-Type: application/json');
echo json_encode($response);
