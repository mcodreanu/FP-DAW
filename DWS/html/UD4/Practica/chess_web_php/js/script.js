// Filter table based on select 
const filterOptions = () => {
	const option = document.querySelector("#filter").value;
	const selection = option.replace('&', '')
	const rows = document.querySelectorAll("tbody tr");
	
	rows.forEach(row => {
		let td = row.querySelector("td:nth-child(5)");
		let filter = td.innerText.replace('&', '');
		if (filter === selection) {
			row.className = 'show'
		} else if (selection === "None") {
			row.className = 'show';
		} else {
			row.className = 'hidden'
		}
		console.log(rows);
	});
};

window.addEventListener("DOMContentLoaded", (event) => {
    const el = document.getElementById("filter");
    if (el) {
      el.addEventListener("change", filterOptions);
    }
});

// User submenu
window.addEventListener("DOMContentLoaded", (event) => {
    const el = document.getElementById("user-menu");
    el.addEventListener("click", (e) => {
		const subMenu = document.getElementById("sub-menu");
    	subMenu.classList.toggle("open");
		console.log("hola");
	})
});

// Move
$(document).ready(function() {
    var selectedPiece = null;

    $(".piece").click(function() {
        var clickedPosition = $(this).data("piece-id");

        if (selectedPiece === null) {
            selectedPiece = clickedPosition;
            highlightValidMoves(selectedPiece);
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
                        alert("Invalid move! Please try again.");
                    }
                },
                error: function(response) {
                    alert("Error while validating the move. Please try again.");
                },
                complete: function() {
                    selectedPiece = null;
                    removeHighlight();
                }
            });
        }
    });

    function highlightValidMoves(pieceId) {
        $(".piece").removeClass("valid-move invalid-move");
    
        var row = Math.floor(pieceId / 8);
        var col = pieceId % 8;
        var pieceColor = getPieceColor(pieceId); 
    
        for (var i = 0; i < 8; i++) {
            if (i !== col) {
                var position = row * 8 + i;
                addDotIfValidMove(position, pieceColor);
            }
        }

        for (var j = 0; j < 8; j++) {
            if (j !== row) {
                var position = j * 8 + col;
                addDotIfValidMove(position, pieceColor);
            }
        }
    }
    
    function addDotIfValidMove(position, selectedPieceColor) {
        var $piece = $(`.piece[data-piece-id="${position}"]`);
        
        if ($piece.length) { 
            var pieceColor = getPieceColor(position);
    
            if (pieceColor !== selectedPieceColor) {
                $piece.addClass("valid-move");
                $piece.append("<div class='dot'></div>");
            } else {
                $piece.addClass("invalid-move");
            }
        }
    }

    function getPieceColor(position) {
        var $piece = $(`.piece[data-piece-id="${position}"]`);
    
        var pieceImage = $piece.find('img').attr('src');
        
        if (pieceImage && pieceImage.endsWith('.png')) {

            var lastChar = pieceImage.charAt(pieceImage.length - 5);
            
            if (lastChar === lastChar.toUpperCase()) {
                return 'white';
            } else {
                return 'black';
            }
        } else {

            return undefined;
        }
    }

    function removeHighlight() {
        $(".piece").removeClass("valid-move invalid-move");
    }
});





