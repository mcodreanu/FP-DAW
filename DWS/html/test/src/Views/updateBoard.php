<?php
// Retrieve the move parameters
$fromRow = $_GET['fromRow'];
$fromColumn = $_GET['fromColumn'];
$toRow = $_GET['toRow'];
$toColumn = $_GET['toColumn'];

$move = $apiDAL->move($board, $fromRow, $fromColumn, $toRow, $toColumn);

try {
    if ($move['isValid'] == true)
    {
        $board = $move['board'];
        $statesBL->insert($board);

        return $board;
    }  
} catch (\Throwable $th) {
    return $board;
}   

// Perform the move and update the board (modify this part based on your actual logic)
$initialFEN = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR"; // Example initial position
$updatedFEN = performMoveAndUpdateBoard($initialFEN, $fromRow, $fromColumn, $toRow, $toColumn);

// Return the updated FEN
header('Content-Type: application/json');
echo json_encode(['fen' => $updatedFEN]);
exit;
?>
