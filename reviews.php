<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews | SD Traders</title>
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
    <h1>Review Submitted</h1>
</section>

<section class="form-container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"] ?? "");
    $rating = htmlspecialchars($_POST["rating"] ?? "");
    $message = htmlspecialchars($_POST["message"] ?? "");

    echo "<div class='card'>";
    echo "<h2>Thank You!</h2>";
    echo "<p>Thank you <b>$name</b> for sharing your review.</p>";
    echo "<p>Your rating: $rating / 5</p>";
    echo "<p>Your review: $message</p>";
    echo "</div>";
} else {
    echo "<p>Please submit the review form first.</p>";
}
?>
    <a href="reviews.html" class="btn">Return to Reviews</a>
</section>

<footer>
    <p>© 2026 SD Traders | Electric Toys</p>
</footer>

</body>
</html>