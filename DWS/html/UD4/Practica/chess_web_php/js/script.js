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
	})
});

function navSlide() {
    const burger = document.querySelector(".burger");
    const nav = document.querySelector(".nav-links");
    const navLinks = document.querySelectorAll(".nav-links li");
    
    burger.addEventListener("click", () => {
        nav.classList.toggle("nav-active");
        
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = ""
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }
        });
        burger.classList.toggle("toggle");
    });
    
}

navSlide();