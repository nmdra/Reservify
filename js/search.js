const searchInput = document.getElementById("hotelSearch");
const searchButton = document.querySelector("button");

// Add an input event listener to the search input
searchInput.addEventListener("input", searchHotels);

function searchHotels() {
    const searchValue = searchInput.value.toLowerCase();

    // Get all the hotel cards
    const hotelCards = document.querySelectorAll(".card");

    hotelCards.forEach(card => {
        // Get the hotel name from the card
        const hotelName = card.querySelector("h1").innerText.toLowerCase();

        if (hotelName.includes(searchValue)) {
            card.style.display = "flex"; // Display the card
        } else {
            card.style.display = "none"; // Hide the card
        }
    });
}