// Move
$(document).ready(function() {
    var selectedPiece = null;

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
                    console.log(response.piece);
                    console.log(response.turno);
                    if (response.turno % 2 != 0)
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
                    alert("Error while getting possible movements.");
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
                        window.location = window.location.href;
                    } else {
                        selectedPiece = null;
                    }
                },
                error: function(response) {
                    alert("Error while validating the move. Please try again.");
                },
                complete: function() {
                    selectedPiece = null;
                    $(".piece").removeClass("valid-move");
                }
            });
        }
    });
});




