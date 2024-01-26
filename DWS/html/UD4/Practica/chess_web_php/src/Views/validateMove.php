<?php
session_start();

require("../Business/apiBL.php");
$apiBL = new ApiBL();
require("../Business/statesBL.php");
$statesBL = new StatesBL();

$fromColumn = $_GET['fromColumn'];
$fromRow = $_GET['fromRow'];
$toColumn = $_GET['toColumn'];
$toRow = $_GET['toRow'];

$statesData = $statesBL->obtainLastState();

foreach ($statesData as $state)
{
    $boardState = $state->getBoard();
}

$board = $boardState;

$response = $apiBL->move($board, $fromColumn, $fromRow, $toColumn, $toRow);

if ($response['isValid'] == true)
{
    $board = $response['board'];
    $statesBL->insert($board);
}

echo json_encode($response);