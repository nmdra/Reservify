// Get a reference to the navigation bar element
const navBar = document.getElementById("navBar");

// Define a scroll event listener
window.addEventListener("scroll", function () {
    // Adjust the scroll position threshold as needed
    if (window.scrollY > 100) {
        // When scrolling down, change the background color to transparent
        navBar.style.backgroundColor = "var(--black)";
    } else {
        // When scrolling up, revert to the initial background color
        navBar.style.backgroundColor = "transparent";
    }
});