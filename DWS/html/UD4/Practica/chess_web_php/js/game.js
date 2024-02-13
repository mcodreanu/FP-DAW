function startNewGame() {
    localStorage.setItem('isWhiteTurn', true);
    
    updateTurnIndicator();
}

// Move
$(document).ready(function() {
    var selectedPiece = null;
    var isWhiteTurn = localStorage.getItem('isWhiteTurn') === 'true';

    function updateTurnIndicator() {
        if (isWhiteTurn) {
            $(".turn-indicator").text("White's turn");
        } else {
            $(".turn-indicator").text("Black's turn");
        }
    }

    updateTurnIndicator();

    $(".piece").click(function() {
        var clickedPosition = $(this).data("piece-id");

        if (selectedPiece === null) {
            selectedPiece = clickedPosition;
            var fromColumn = Math.floor(selectedPiece / 8);
            var fromRow = selectedPiece % 8;

            $.ajax({
                type: "GET",
                url: "possibleMovements.php",
                data: {
                    fromColumn: fromColumn,
                    fromRow: fromRow,
                },
                success: function(response) {
                    if (isWhiteTurn)
                    {
                        if (response.piece.includes("WH"))
                        {
                            $.each(response.possibleMovements, function(key, value) {
                                if (value == 1)
                                {
                                    $(`.piece[data-piece-id="${key}"]`).addClass("valid-move");
                                    $(`.piece[data-piece-id="${key}"]`).append("<div class='dot'></div>");
                                }
                            })
                        }
                        else
                        {
                            selectedPiece = null;
                        }
                    }
                    else
                    {
                        if (response.piece.includes("BL"))
                        {
                            $.each(response.possibleMovements, function(key, value) {
                                if (value == 1)
                                {
                                    $(`.piece[data-piece-id="${key}"]`).addClass("valid-move");
                                    $(`.piece[data-piece-id="${key}"]`).append("<div class='dot'></div>");
                                }
                            })
                        }
                        else 
                        {
                            selectedPiece = null;
                        }
                    }
                },
                error: function(response) {
                    
                }
            });
        } else {
            var fromColumn = Math.floor(selectedPiece / 8);
            var fromRow = selectedPiece % 8;
            var toColumn = Math.floor(clickedPosition / 8);
            var toRow = clickedPosition % 8;

            $.ajax({
                type: "GET",
                url: "validateMove.php",
                data: {
                    fromColumn: fromColumn,
                    fromRow: fromRow,
                    toColumn: toColumn,
                    toRow: toRow
                },
                success: function(response) {
                    if (response.isValid) {
                        isWhiteTurn = !isWhiteTurn;
                        localStorage.setItem('isWhiteTurn', isWhiteTurn);
                        window.location = window.location.href;
                    } else {
                        selectedPiece = null;
                    }
                },
                error: function(response) {
                    
                },
                complete: function() {
                    selectedPiece = null;
                    $(".piece").removeClass("valid-move");
                }
            });
        }
    });
});




