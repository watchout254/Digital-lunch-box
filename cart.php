<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">

    <title>Digital Lunchbox | Cart</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    .cart-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item img {
        max-width: 100px;
        border-radius: 4px;
    }

    .cart-item-details {
        flex: 1;
        margin-left: 20px;
    }

    .cart-item-name {
        font-size: 1.2em;
        margin: 0;
    }

    .cart-item-price {
        color: #333;
    }

    .cart-item-quantity {
        margin-top: 5px;
        color: #666;
    }

    .cart-item-remove {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .cart-item-remove:hover {
        background-color: #c82333;
    }

    .checkout-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1.2em;
        margin-top: 20px;
        display: block;
        width: 100%;
        text-align: center;
    }

    .checkout-btn:hover {
        background-color: #218838;
    }
    </style>
</head>

<body>
    <div class="container">
        <a class="nav-link custom-nav-link" id="nav-link5" href="index.php">Home </a>
        <h1>Your Cart</h1>
        <div id="cart-items">
            <!-- Cart items will be dynamically inserted here -->
        </div>
        <button class="checkout-btn" onclick="checkout()">Order Now</button>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const cartItemsContainer = document.getElementById("cart-items");
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Function to display cart items
        function displayCart() {
            cartItemsContainer.innerHTML = ''; // Clear the container

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
                return;
            }

            cart.forEach(item => {
                const cartItem = document.createElement("div");
                cartItem.className = "cart-item";

                cartItem.innerHTML = `
                        <img src="https://via.placeholder.com/100" alt="${item.name}"> <!-- Placeholder image -->
                        <div class="cart-item-details">
                            <p class="cart-item-name">${item.name}</p>
                            <p class="cart-item-price">KES ${item.price}</p>
                            <p class="cart-item-quantity">Quantity: ${item.quantity}</p>
                        </div>
                        <button class="cart-item-remove" onclick="removeFromCart('${item.name}')">Remove</button>
                    `;

                cartItemsContainer.appendChild(cartItem);
            });
        }



        // Function to remove item from cart
        window.removeFromCart = function(name) {
            cart = cart.filter(item => item.name !== name);
            localStorage.setItem('cart', JSON.stringify(cart));
            displayCart();
        }

        // Function to proceed to checkout
        window.checkout = function() {
            window.location.href = 'order.php'; // Replace with your checkout page
        }

        displayCart();
    });
    </script>
</body>

</html>