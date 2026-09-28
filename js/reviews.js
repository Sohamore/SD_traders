document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector("form");

  form.addEventListener("submit", function(event) {
    let name = document.getElementById("name").value.trim();
    let rating = document.getElementById("rating").value.trim();
    let message = document.getElementById("message").value.trim();

    // Validation checks
    if (name === "" || rating === "" || message === "") {
      alert("Please fill in all fields.");
      event.preventDefault();
    } else if (isNaN(rating) || rating < 1 || rating > 5) {
      alert("Rating must be a number between 1 and 5.");
      event.preventDefault();
    } else if (message.length < 5) {
      alert("Review message should be at least 5 characters long.");
      event.preventDefault();
    }
  });
});