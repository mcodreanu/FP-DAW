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

// Test Move
$(document).ready(function() {
    var selectedPiece = null;

    $(".piece").click(function() {
        var clickedPosition = $(this).data("piece-id");

        if (selectedPiece === null) {
            selectedPiece = clickedPosition;
            // Optionally, highlight the selected piece for user feedback
            $(this).addClass("selected");
        } else {
            var fromRow = Math.floor(selectedPiece / 8);
            var fromColumn = selectedPiece % 8;
            var toRow = Math.floor(clickedPosition / 8);
            var toColumn = clickedPosition % 8;

            $.ajax({
                type: "GET",
                url: "validateMove.php",
                data: {
                    fromRow: fromRow,
                    fromColumn: fromColumn,
                    toRow: toRow,
                    toColumn: toColumn
                },
                success: function(response) {
                    if (response.isValid) {
                        // Update the board on success
                        updateBoard();
                    } else {
                        alert("Invalid move! Please try again.");
                    }
                },
                error: function() {
                    alert("Error while validating the move. Please try again.");
                },
                complete: function() {
                    // Reset the selected piece after the move
                    selectedPiece = null;
                    // Optionally, remove the selection highlight
                    $(".piece").removeClass("selected");
                }
            });
        }
    });

    function updateBoard() {
        // Perform AJAX request to update the board in boardView.php
        $.ajax({
            type: "GET",
            url: "updateBoard.php", // Adjust the URL to your server-side script
            success: function(response) {
                // Assuming the response contains the updated board data
                // Update the board on the client side as needed
                $board = response.board;
                // You may need to implement the actual board update logic based on your requirements
                // For example, update the DOM elements representing the board
            },
            error: function() {
                alert("Error updating the board. Please try again.");
            }
        });
    }
});



