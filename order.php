<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Digital Lunchbox | Order Page</title>
    
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .container {
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

    .total-amount {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        color: #333;
    }

    .item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .item select,
    .item input {
        flex: 1;
    }

    button[type="button"] {
        margin-bottom: 20px;
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

        .item {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>
    <div class="container">
    <img src="logo.png" alt="Digital Lunchbox Logo" style="height: 100px; width: auto;">
        <h1>Digital Lunchbox Order Food</h1>
        
        <a class="nav-link" href="index.php">Home</a>
        <form id="orderForm" action="submit_order.php" method="POST" enctype="application/x-www-form-urlencoded">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required aria-required="true">

            <label for="tel">Phone Number:</label>
            <input type="tel" id="tel" name="tel" required aria-required="true">

            <label for="food">Food Items:</label>
            <div id="foodItems">
                <div class="item">
                    <select class="food-select" name="food[]" data-price="0" aria-label="Select a food item">
                        <option value="" data-price="0" disabled selected>Select a food item</option>
                        <option value="Kienyeji + Fish" data-price="500">Kienyeji + Fish - KES 500</option>
                        <option value="Beef Pasta" data-price="400">Beef Pasta - KES 400</option>
                        <option value="Githeri + Potatoes" data-price="350">Githeri + Potatoes - KES 350</option>
                        <option value="Marinated Chicken" data-price="450">Marinated Chicken - KES 450</option>
                    </select>
                    <input type="number" class="food-quantity" name="food_quantity[]" min="1" value="1"
                        aria-label="Quantity">
                </div>
            </div>
            <button type="button" onclick="addFoodItem()">Add Another Food Item</button>

            <label for="drink">Drinks:</label>
            <div id="drinkItems">
                <div class="item">
                    <select class="drink-select" name="drink[]" data-price="0" aria-label="Select a drink">
                        <option value="" data-price="0" disabled selected>Select a drink</option>
                        <option value="Lemonade" data-price="100">Lemonade - KES 100</option>
                        <option value="Milkshake" data-price="150">Milkshake - KES 150</option>
                        <option value="Juice" data-price="120">Juice - KES 120</option>
                        <option value="Vanilla" data-price="300">Vanilla - KES 300</option>
                        <option value="Strawberry" data-price="300">Strawberry - KES 300</option>
                        <option value="Oreo" data-price="400">Oreo- KES 400</option>
                        <option value="Chocolate" data-price="300">Chocolate - KES 300</option>
                        <option value="Blueberry" data-price="300">Blueberry - KES 300</option>
                        <option value="Iced Coffee" data-price="300">Iced Coffee - KES 300</option>
                        <option value="Peach" data-price="400">Peach- KES 400</option>
                        <option value="Mocha" data-price="300">Mocha- KES 300</option>
                        <option value="Pina Colada" data-price="400">Pina Colada - KES 400</option>
                    </select>
                    <input type="number" class="drink-quantity" name="drink_quantity[]" min="1" value="1"
                        aria-label="Quantity">
                </div>
            </div>
            <button type="button" onclick="addDrinkItem()">Add Another Drink Item</button>

            <label for="delivery">Delivery Instructions:</label>
            <input type="text" id="delivery" name="delivery" required aria-required="true">

            <input type="hidden" id="totalAmount" name="totalAmount">
            <button type="submit">Order Now</button>
            <button type="reset">Reset Form</button>

            <div class="total-amount" id="totalAmountDisplay">Total Amount: KES 0</div>
            <p><b>After delivery, please call us with feedback. Thank you!</b></p>
        </form>
    </div>

    <script>
    function updateTotalAmount() {
        const foodItems = document.querySelectorAll('.food-select');
        const foodQuantities = document.querySelectorAll('.food-quantity');
        const drinkItems = document.querySelectorAll('.drink-select');
        const drinkQuantities = document.querySelectorAll('.drink-quantity');
        let totalAmount = 0;

        foodItems.forEach((foodSelect, index) => {
            const foodPrice = parseFloat(foodSelect.selectedOptions[0].getAttribute('data-price')) || 0;
            const quantity = parseInt(foodQuantities[index].value) || 1;
            totalAmount += foodPrice * quantity;
        });

        drinkItems.forEach((drinkSelect, index) => {
            const drinkPrice = parseFloat(drinkSelect.selectedOptions[0].getAttribute('data-price')) || 0;
            const quantity = parseInt(drinkQuantities[index].value) || 1;
            totalAmount += drinkPrice * quantity;
        });

        document.getElementById('totalAmountDisplay').textContent = `Total Amount: KES ${totalAmount}`;
        document.getElementById('totalAmount').value = totalAmount;
    }

    function addFoodItem() {
        const foodItemsDiv = document.getElementById('foodItems');
        const newItem = document.createElement('div');
        newItem.classList.add('item');
        newItem.innerHTML = `
                <select class="food-select" name="food[]" data-price="0" aria-label="Select a food item">
                    <option value="" data-price="0" disabled selected>Select a food item</option>
                    <option value="Kienyeji + Fish" data-price="500">Kienyeji + Fish - KES 500</option>
                    <option value="Beef Pasta" data-price="400">Beef Pasta - KES 400</option>
                    <option value="Githeri + Potatoes" data-price="350">Githeri + Potatoes - KES 350</option>
                    <option value="Marinated Chicken" data-price="450">Marinated Chicken - KES 450</option>
                </select>
                <input type="number" class="food-quantity" name="food_quantity[]" min="1" value="1" aria-label="Quantity">
            `;
        foodItemsDiv.appendChild(newItem);
        updateTotalAmount();
    }

    function addDrinkItem() {
        const drinkItemsDiv = document.getElementById('drinkItems');
        const newItem = document.createElement('div');
        newItem.classList.add('item');
        newItem.innerHTML = `
                <select class="drink-select" name="drink[]" data-price="0" aria-label="Select a drink">
                    <option value="" data-price="0" disabled selected>Select a drink</option>
                    <option value="Lemonade" data-price="100">Lemonade - KES 100</option>
                    <option value="Milkshake" data-price="150">Milkshake - KES 150</option>
                    <option value="Juice" data-price="120">Juice - KES 120</option>
                    <option value="Mocktail" data-price="180">Mocktail - KES 180</option>
                    <option value="Vanilla" data-price="300">Vanilla - KES 300</option>
                    <option value="Strawberry" data-price="300">Strawberry - KES 300</option>
                    <option value="Oreo" data-price="300">Oreo - KES 400</option>
                    <option value="Chocolate" data-price="300">Chocolate - KES 300</option>
                    <option value="Blueberry" data-price="300">Blueberry - KES 300</option>
                    <option value="Iced coffee" data-price="300">Iced coffee - KES 300</option>
                    <option value="Peach" data-price="300">Peach - KES 400</option>
                    <option value="Mocha" data-price="300">Mocha - KES 300</option>
                    <option value="Pina Colada" data-price="400">Pina Colada - KES 400</option>
                </select>
                <input type="number" class="drink-quantity" name="drink_quantity[]" min="1" value="1" aria-label="Quantity">
            `;
        drinkItemsDiv.appendChild(newItem);
        updateTotalAmount();
    }

    document.querySelectorAll('.food-select, .food-quantity, .drink-select, .drink-quantity').forEach(element => {
        element.addEventListener('change', updateTotalAmount);
    });
    </script>
</body>

</html>