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

foreach ($statesData as $state) {
    $boardState = $state->getBoard();
}

$board = $boardState;

$data = $apiBL->move($board, $fromColumn, $fromRow, $toColumn, $toRow);

if ($data['isValid'] == true) {
    $board = $data['board'];
    $statesBL->insert($board);

    $response['isValid'] = $data['isValid'];
    $response['validMovePositions'] = getValidMovePositionsForRook($board, $fromColumn, $fromRow);
}

header('Content-Type: application/json');
echo json_encode($response);

function getValidMovePositionsForRook($board, $fromColumn, $fromRow) {

    $validMovePositions = array();

    for ($col = 0; $col < 8; $col++) {
        if ($col != $fromColumn) {
            $validMovePositions[] = $fromRow * 8 + $col;
        }
    }

    for ($row = 0; $row < 8; $row++) {
        if ($row != $fromRow) {
            $validMovePositions[] = $row * 8 + $fromColumn;
        }
    }

    return $validMovePositions;
}
