<?php
session_start();

require("../Business/apiBL.php");
$apiBL = new ApiBL();
require("../Business/statesBL.php");
$statesBL = new StatesBL();

// Get the parameters from the AJAX request
$fromRow = $_GET['fromRow'];
$fromColumn = $_GET['fromColumn'];
$toRow = $_GET['toRow'];
$toColumn = $_GET['toColumn'];

// Retrieve the current board state
$board = $statesBL->obtainLastStateJSON(); // Implement this function based on your existing code

// Log the move parameters
error_log("Making AJAX request with parameters: $fromRow $fromColumn $toRow $toColumn");

// Validate the move using your ApiBL class
$response = $apiBL->move($board["board"], $fromRow, $fromColumn, $toRow, $toColumn);

// Log the API response
error_log("API Response: " . json_encode($response));

// Return the validation result as JSON
echo json_encode(['isValid' => $response['isValid']]);
