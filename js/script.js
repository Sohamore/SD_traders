function validateOrder() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let productElem = document.getElementById("product");
    let product = productElem ? productElem.value : "";
    let quantity = parseInt(document.getElementById("quantity").value) || 1;

    if (name === "") {
        alert("Please enter your name.");
        return false;
    }

    if (email === "") {
        alert("Please enter your email.");
        return false;
    }

    if (!product) {
        alert("Please select a product.");
        return false;
    }

    if (quantity < 1) {
        alert("Quantity must be at least 1.");
        return false;
    }

    const prices = {
        "Electric Racing Car": 1499,
        "Hover Ball": 520,
        "RC Helicopter": 1799,
        "RC Drift Car": 1870,
        "Smart Robot": 999,
        "Electric Bike": 2499
    };
    let price = prices[product] || 1200;

    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let existing = cart.find(item => item.name.toLowerCase() === product.toLowerCase());
    if (existing) {
        existing.quantity += quantity;
        existing.customerName = name;
        existing.customerEmail = email;
    } else {
        cart.push({
            customerName: name,
            customerEmail: email,
            name: product,
            price: price,
            quantity: quantity
        });
    }
    localStorage.setItem("cart", JSON.stringify(cart));

    alert("✅ Order placed! Opening Cart to review your order.");
    window.location.href = "cart.html";
    return false;
}

function addToCart(name, price) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let existing = cart.find(item => item.name.toLowerCase() === name.toLowerCase());
    if (existing) {
        existing.quantity += 1;
    } else {
        cart.push({ name: name, price: price, quantity: 1 });
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    alert(`"${name}" has been added to your shopping cart!`);
}

function autoFillOrderForm() {
    const params = new URLSearchParams(window.location.search);
    const productParam = params.get('product');
    const quantityParam = params.get('quantity');

    if (productParam) {
        const selectElem = document.getElementById('product');
        if (selectElem) {
            let matched = false;
            for (let opt of selectElem.options) {
                if (opt.value.toLowerCase() === productParam.toLowerCase() || opt.text.toLowerCase() === productParam.toLowerCase()) {
                    opt.selected = true;
                    matched = true;
                    break;
                }
            }
            if (!matched) {
                let newOpt = document.createElement("option");
                newOpt.value = productParam;
                newOpt.text = productParam;
                newOpt.selected = true;
                selectElem.add(newOpt);
            }
        }
    }

    if (quantityParam) {
        const quantityInput = document.getElementById('quantity');
        if (quantityInput) {
            quantityInput.value = quantityParam;
        }
    }
}

window.onload = function() {
    autoFillOrderForm();
};