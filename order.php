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

// Product prices
$prices = [
    "Electric Racing Car" => 999,
    "Hover Ball" => 520,
    "RC Helicopter" => 270,
    "RC Drift Car" => 1870,
    "Dancing Octopus" => 710,
    "RC Plane" => 1799,
    "Dancing Frog" => 410,
    "B/O Girl" => 850,
    "B/O Frog" => 580,
    "Elephant Robot" => 699
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"] ?? "");
    $email = htmlspecialchars($_POST["email"] ?? "");
    $product = htmlspecialchars($_POST["product"] ?? "");

    $quantity = isset($_POST["quantity"])
        ? (int)$_POST["quantity"]
        : 1;

    // Never allow quantity below 1
    if ($quantity < 1) {
        $quantity = 1;
    }

    // Never allow quantity above 10
    if ($quantity > 10) {
        $quantity = 10;
    }

    // Get the actual price from our product list
    $price = $prices[$product] ?? 0;

    // Calculate total
    $total = $price * $quantity;

    if ($price > 0) {

        echo "<div class='success'>";

        echo "<h2>Order Received!</h2>";

        echo "<p>Thank you <b>$name</b> for your order.</p>";

        echo "<p><b>Product:</b> $product</p>";

        echo "<p><b>Price:</b> ₹" . number_format($price) . "</p>";

        echo "<p><b>Quantity:</b> $quantity</p>";

        echo "<p><b>Total:</b> ₹" . number_format($total) . "</p>";

        echo "<p>We will contact you at <b>$email</b>.</p>";

        echo "</div>";

    } else {

        echo "<div class='error'>";
        echo "<p>Invalid product selected.</p>";
        echo "</div>";
    }
}

?>

<form method="POST" onsubmit="return validateOrder()">

    <label>Name</label>
    <input
        type="text"
        name="name"
        id="name"
        required
    >

    <label>Email</label>
    <input
        type="email"
        name="email"
        id="email"
        required
    >

    <label>Select Product</label>

    <select name="product" id="product" required>

        <option value="">-- Select Toy --</option>

        <option value="Electric Racing Car">
            Electric Racing Car - ₹999
        </option>

        <option value="Hover Ball">
            Hover Ball - ₹520
        </option>

        <option value="RC Helicopter">
            RC Helicopter - ₹270
        </option>

        <option value="RC Drift Car">
            RC Drift Car - ₹1870
        </option>

        <option value="Dancing Octopus">
            Dancing Octopus - ₹710
        </option>

        <option value="RC Plane">
            RC Plane - ₹1799
        </option>

        <option value="Dancing Frog">
            Dancing Frog - ₹410
        </option>

        <option value="B/O Girl">
            B/O Girl - ₹850
        </option>

        <option value="B/O Frog">
            B/O Frog - ₹580
        </option>

        <option value="Elephant Robot">
            Elephant Robot - ₹699
        </option>

    </select>

    <label>Quantity</label>

    <input
        type="number"
        name="quantity"
        id="quantity"
        min="1"
        max="10"
        value="1"
        required
    >

    <button type="submit" class="btn">
        Place Order
    </button>

</form>

</section>

<footer>
    <p>© 2026 SD Traders | Electric Toys</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>
