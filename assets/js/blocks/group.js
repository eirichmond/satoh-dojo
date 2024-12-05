wp.domReady(() => {
	// Add your custom JavaScript code for the group-navigation block variation here
	// Function to add class on scroll
	function handleScroll() {

		if (window.scrollY > 40) {
			// 100px from the top
			document.body.classList.add("scrolled");
		} else {
			document.body.classList.remove("scrolled");
		}
	}

	// Listen for the scroll event
	window.addEventListener("scroll", handleScroll);
});

// Wait for the DOM to fully load
document.addEventListener("DOMContentLoaded", function () {
});
