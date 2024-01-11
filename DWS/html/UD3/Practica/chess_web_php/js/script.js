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

// Test Move
let state = false
let currentPiece;
let currentCell;

let cells = document.getElementsByClassName("piece"); 

window.addEventListener("DOMContentLoaded", (event) => {
    const el = document.getElementsByClassName("piece");
    if (el) {
		for (var i = 0; i < cells.length; i++) { 
			cells[i].onclick = function(){
				getCell(this);
			};
		 }
    }
});

function getCell(that) {
    if(!state) { 
        state = true; 
        currentPiece = that.innerHTML;
        currentCell = that;
    }
    else {
        that.innerHTML = currentPiece;
        currentCell.innerHTML = "";
        state = false; 
    }
}