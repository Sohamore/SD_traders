// cart.js
document.addEventListener("DOMContentLoaded", function() {
  // --- Add to Cart buttons (shop.html) ---
  const buttons = document.querySelectorAll(".add-to-cart");
  if (buttons.length > 0) {
    buttons.forEach(btn => {
      btn.addEventListener("click", () => {
        let name = btn.getAttribute("data-name");
        let price = parseFloat(btn.getAttribute("data-price"));

        // Get existing cart or create new
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Add item
        cart.push({ name, price });

        // Save back to localStorage
        localStorage.setItem("cart", JSON.stringify(cart));

        // Feedback
        alert(`${name} added to cart!`);
      });
    });
  }

  // --- Cart Page rendering (cart.html) ---
  const cartItemsDiv = document.getElementById("cartItems");
  const totalPriceDiv = document.getElementById("totalPrice");
  const clearCartBtn = document.getElementById("clearCart");

  if (cartItemsDiv) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function renderCart() {
      cartItemsDiv.innerHTML = "";
      let totalPrice = 0;

      if (cart.length === 0) {
        cartItemsDiv.innerHTML = "<p>Your cart is empty.</p>";
        totalPriceDiv.textContent = "";
        return;
      }

      cart.forEach((item, index) => {
        cartItemsDiv.innerHTML += `
          <div class="cart-item">
            <p>${item.name} - ₹${item.price}</p>
            <button onclick="removeItem(${index})">Remove</button>
          </div>
        `;
        totalPrice += item.price;
      });

      totalPriceDiv.textContent = "Total: ₹" + totalPrice;
    }

    // Attach removeItem globally
    window.removeItem = function(index) {
      cart.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(cart));
      renderCart();
    };

    // Clear cart
    if (clearCartBtn) {
      clearCartBtn.addEventListener("click", () => {
        localStorage.removeItem("cart");
        cart = [];
        renderCart();
      });
    }

    // Initial render
    renderCart();
  }
});