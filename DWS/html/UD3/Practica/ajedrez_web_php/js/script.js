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
		} else {
			row.className = 'hidden'
		}
	});
};

window.addEventListener("DOMContentLoaded", (event) => {
    const el = document.getElementById("filter");
    if (el) {
      el.addEventListener("change", filterOptions);
    }
});

// Sort by date
$(document).ready(function () {
	$('#matches thead').on('click', 'th', function () {
		$(this).attr('data-order', ($(this).attr('data-order') === 'desc' ? 'asc' : 'desc'));
		if ($(this).hasClass(".dateTh")) {
			sorttable(this, $('#matches thead th').index(this), true);
		} else {
			sorttable(this, $('#matches thead th').index(this), false);
		}
	});
});

function sorttable(header, index, isDate) {
	var tbody = $('table tbody');
	var order = $(header).attr('data-order');
	tbody.find('tr').sort(function (a, b) {
		var tda = $(a).find('td:eq(' + index + ')').text();
		var tdb = $(b).find('td:eq(' + index + ')').text();
		if (isDate) {
			tda = toDate(tda);
			tdb = toDate(tdb);
		}
		return (order === 'asc' ? (tda > tdb ? 1 : tda < tdb ? -1 : 0) : (tda < tdb ? 1 : tda > tdb ? -1 : 0));
	}).appendTo(tbody);
}

function toDate(d) {
  return new Date(d)
}
