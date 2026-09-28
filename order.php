<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order | SD Traders</title>
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
    <h1>Place Your Order</h1>
</section>

<section class="form-container">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $product = htmlspecialchars($_POST["product"]);
    $quantity = htmlspecialchars($_POST["quantity"]);

    echo "<div class='success'>";
    echo "<h2>Order Received!</h2>";
    echo "<p>Thank you <b>$name</b> for your order.</p>";
    echo "<p>Product: $product</p>";
    echo "<p>Quantity: $quantity</p>";
    echo "<p>We will contact you at $email.</p>";
    echo "</div>";
}
?>

<form method="POST" onsubmit="return validateOrder()">
    <label>Name</label>
    <input type="text" name="name" id="name" required>

    <label>Email</label>
    <input type="email" name="email" id="email" required>

    <label>Select Product</label>
    <select name="product" id="product" required>
        <option value="">-- Select Toy --</option>
        <option>Electric Racing Car</option>
        <option>Hover Ball</option>
        <option>RC Helicopter</option>
        <option>RC Drift Car</option>
        <option>Smart Robot</option>
        <option>Electric Bike</option>
    </select>

    <label>Quantity</label>
    <input type="number" name="quantity" id="quantity" min="1" max="10" required>

    <button type="submit" class="btn">Place Order</button>
</form>

</section>

<footer>
    <p>© 2026 SD Traders | Electric Toys</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>