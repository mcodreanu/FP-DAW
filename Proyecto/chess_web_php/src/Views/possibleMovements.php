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

$data = $apiBL->move($board, $fromRow, $fromColumn, 0, 0);

$possibleMovements = $apiBL->obtainPossibleMovements($board, $fromRow, $fromColumn);

$response["possibleMovements"] = $possibleMovements;
$response["turno"] = $_SESSION["visits"];
$response["piece"] = $data["piece"];

header('Content-Type: application/json');
echo json_encode($response);
