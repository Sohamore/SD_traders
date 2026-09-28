<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback | SD Traders</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="logo">⚡ SD TRADERS</div>
    <nav>
        <a href="index.html">Home</a>
        <a href="about.html">About Us</a>
        <a href="products.html">Products</a>
        <a href="gallery.html">Gallery</a>
        <a href="cart.html">Cart</a>
        <a href="reviews.html">Reviews</a>
        <a href="order.php">Order</a>
        <a href="feedback.php">Feedback</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<section class="page-title">
    <h1>Customer Feedback</h1>
</section>

<section class="form-container">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $message = htmlspecialchars($_POST["message"]);

    echo "<div class='success'>";
    echo "<h2>Thank You!</h2>";
    echo "<p>Thank you <b>$name</b> for your feedback.</p>";
    echo "<p>Your rating: $rating / 5</p>";
    echo "<p>Your feedback: $message</p>";
    echo "</div>";
}
?>

<form method="POST">
    <label>Your Name</label>
    <input type="text" name="name" required>

    <label>Rating</label>
    <select name="rating" required>
        <option value="">Select Rating</option>
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
    </select>

    <label>Your Feedback</label>
    <textarea name="message" rows="6" required></textarea>

    <button type="submit" class="btn">Submit Feedback</button>
</form>

</section>

<footer>
    <p>© 2026 SD Traders | Electric Toys</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>