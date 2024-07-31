<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Digital Lunchbox | Order Page</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 1.75rem;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin: 10px 0 5px;
        font-weight: bold;
        color: #555;
    }

    input,
    select,
    button {
        padding: 12px;
        margin: 5px 0 20px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input:focus,
    select:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 1.1rem;
    }

    button:hover {
        background-color: #0056b3;
    }

    .nav-link {
        display: block;
        margin-bottom: 20px;
        color: #007bff;
        text-align: center;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .nav-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    p {
        text-align: center;
        color: #777;
        font-size: 0.9rem;
    }

    .total-amount {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        color: #333;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        input,
        select,
        button {
            padding: 10px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .container {
            padding: 10px;
        }

        input,
        select,
        button {
            padding: 8px;
            font-size: 0.8rem;
        }

        h1 {
            font-size: 1.5rem;
        }

        .nav-link {
            font-size: 1rem;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Digital Lunchbox Order Food</h1>
        <a class="nav-link" id="nav-link5" href="index.php">Home</a>
        <form id="orderForm" action="submit_order.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="tel">Phone Number:</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="food">Food Item:</label>
            <select id="food" name="food" required>
                <option value="" data-price="0" disabled selected>Select a food item</option>
                <option value="" data-price="">None</option>
                <option value="Kienyeji + Fish wet fry with cornmeal/rice" data-price="500">Kienyeji + Fish wet fry with
                    cornmeal/rice - KES 500</option>
                <option value="Beef dry fry with pasta" data-price="400">Beef dry fry with pasta - KES 400</option>
                <option value="Githeri + Potatoes + Diced Avocado" data-price="350">Githeri + Potatoes + Diced Avocado -
                    KES 350</option>
                <option value="Marinated Chicken with vegetable rice" data-price="450">Marinated Chicken with vegetable
                    rice - KES 450</option>
                <option value="Swahili Pilau with Guacamole" data-price="420">Swahili Pilau with Guacamole - KES 420
                </option>
                <option value="Chicken Biryani + Guacamole" data-price="480">Chicken Biryani + Guacamole - KES 480
                </option>
                <option value="Arrowroots boiled" data-price="150">Arrowroots boiled - KES 150</option>
                <option value="Pork & Fries" data-price="450">Pork & Fries - 450</option>
                <option value="Sweetpotatoes" data-price="100">Sweetpotatoes - KES 100</option>
                <option value="French toast" data-price="170">French Toast - KES 170</option>
                <option value="Spanish" data-price="150">Spanish - KES 150</option>
                <option value="Pancakes" data-price="50">Pancakes - KES 50</option>
                <option value="Sausages" data-price="50">Sausages/smokies - KES 50</option>
                <option value="Samosa" data-price="70">Samosa- KES 70</option>
            </select>

            <label for="drink">Drink:</label>
            <select id="drink" name="drink">
                <option value="" data-price="0" disabled selected>Select a drink</option>
                <option value="" data-price="">None</option>
                <option value="Lemonade" data-price="100">Lemonade - KES 100</option>
                <option value="Milkshake" data-price="150">Milkshake - KES 150</option>
                <option value="Juice" data-price="120">Fresh juice - KES 120</option>
                <option value="Mocktail" data-price="180">Mocktails - KES 180</option>
                <option value="Tea" data-price="100">Tea - KES 100</option>
                <option value="Brewed coffee" data-price="100">Brewed Coffee - KES 100</option>
                <option value="White coffee" data-price="200">White coffee - KES 200</option>
            </select>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <label for="delivery">Delivery Instructions:</label>
            <input type="text" id="delivery" name="delivery" required>

            <input type="hidden" id="totalAmount" name="totalAmount">
            <button type="submit">Order Now</button>

            <div class="total-amount" id="totalAmountDisplay">Total Amount: KES 0</div>
            <p><b>After delivery be sure to call us and let us know your feedback. Thank you.</b></p>
        </form>
    </div>

    <script>
    const orderForm = document.getElementById('orderForm');
    const totalAmountElem = document.getElementById('totalAmountDisplay');
    const foodSelect = document.getElementById('food');
    const drinkSelect = document.getElementById('drink');
    const quantityInput = document.getElementById('quantity');
    const totalAmountInput = document.getElementById('totalAmount');

    function updateTotalAmount() {
        const foodPrice = parseFloat(foodSelect.selectedOptions[0].getAttribute('data-price')) || 0;
        const drinkPrice = parseFloat(drinkSelect.selectedOptions[0].getAttribute('data-price')) || 0;
        const quantity = parseInt(quantityInput.value) || 1;
        const totalAmount = (foodPrice + drinkPrice) * quantity;
        totalAmountElem.textContent = `Total Amount: KES ${totalAmount}`;
        totalAmountInput.value = totalAmount;
    }

    foodSelect.addEventListener('change', updateTotalAmount);
    drinkSelect.addEventListener('change', updateTotalAmount);
    quantityInput.addEventListener('input', updateTotalAmount);

    orderForm.addEventListener('submit', function(e) {
        updateTotalAmount();
    });

    window.onload = updateTotalAmount;
    </script>
</body>

</html>