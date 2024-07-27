<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Hide errors in production

$servername = "localhost";
$username = "root"; // replace with your MySQL username
$password = ""; // replace with your MySQL password
$dbname = "orders_db"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

$orders = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Digital Lunchbox Admin</title>
    <style>
    /* Existing styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        font-size: 2rem;
    }

    .delete-btn,
    .logout-btn,
    .print-btn,
    .download-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .delete-btn:hover,
    .logout-btn:hover,
    .print-btn:hover,
    .download-btn:hover {
        background-color: #c0392b;
    }

    /* More existing styles */
    </style>
</head>

<body>
    <div class="container">
        <h1>Order List</h1>
        <button class="logout-btn" onclick="logout()">Logout</button>
        <button class="print-btn" onclick="printOrders()">Print</button>
        <button class="download-btn" onclick="downloadOrders()">Download</button>
        <span id="visitCounter" class="visit-counter">Visits: 0</span>
        <div id="visitorInfo" class="visitor-info"></div>
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchOrders()" placeholder="Search for orders...">
        </div>
        <div class="status-filter">
            <label><input type="radio" name="statusFilter" value="all" checked onchange="filterOrders(this)">
                All</label>
            <label><input type="radio" name="statusFilter" value="delivered" onchange="filterOrders(this)">
                Delivered</label>
            <label><input type="radio" name="statusFilter" value="pending" onchange="filterOrders(this)">
                Pending</label>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tel</th>
                        <th>Food Item</th>
                        <th>Drink</th>
                        <th>Quantity</th>
                        <th>Delivery</th>
                        <th>Delivered</th>
                        <th>Amount to be Paid</th> <!-- New column -->
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="orderList">
                    <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['customer_name']) ?></td>
                        <td><?= htmlspecialchars($order['phone_number']) ?></td>
                        <td><?= htmlspecialchars($order['food_item']) ?></td>
                        <td><?= htmlspecialchars($order['drink_item']) ?></td>
                        <td><?= htmlspecialchars($order['quantity']) ?></td>
                        <td><?= htmlspecialchars($order['delivery_instructions']) ?></td>
                        <td>
                            <input type="checkbox" <?= $order['delivered'] ? 'checked' : '' ?>
                                onclick="toggleDelivered(<?= $index ?>)">
                        </td>
                        <td><?= htmlspecialchars($order['total_amount']) ?></td>
                        <td><?= htmlspecialchars($order['timestamp']) ?></td>
                        <td><button class="delete-btn" onclick="deleteOrder(<?= $index ?>)">Delete</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="chart-container">
            <canvas id="mostSoldFoodChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="mostSoldDrinkChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="mostSoldChart"></canvas>
        </div>
    </div>

    <div class="container" id="receiptContainer" style="display: none;">
        <h1>Receipt</h1>
        <div id="receiptDetails">
            <!-- Receipt details will be inserted here -->
        </div>
        <button class="print-btn" onclick="printReceipt()">Print Receipt</button>
        <button class="back-btn" onclick="showOrderList()">Back to Orders</button>
    </div>

    <div id="watermark" class="watermark">Digital Lunchbox Admin</div>

    <script>
    // JavaScript code (same as before, with minor adjustments)
    const correctPassword = 'Daniel24#';
    const foodPrices = {
        "Kienyeji + Fish wet fry with cornmeal/rice": 500,
        "Beef dry fry with pasta": 400,
        "Githeri + Potatoes + Diced Avocado": 350,
        "Marinated Chicken with vegetable rice": 450,
        "Swahili Pilau with Guacamole": 420,
        "Chicken Biryani + Guacamole": 480
    };
    const drinkPrices = {
        "Lemonade": 100,
        "Milkshake": 150,
        "Fresh juice": 120,
        "Mocktails": 180
    };

    function login() {
        const password = document.getElementById('password').value;
        if (password === correctPassword) {
            document.getElementById('loginContainer').style.display = 'none';
            document.getElementById('orderContainer').style.display = 'block';
            recordVisit();
            loadOrders();
            updateVisitCounter();
            showVisitorInfo();
            renderMostSoldCharts(); // Call the function to render charts
        } else {
            alert('Incorrect password. Please try again.');
        }
    }

    function logout() {
        document.getElementById('orderContainer').style.display = 'none';
        document.getElementById('loginContainer').style.display = 'flex';
        document.getElementById('password').value = '';
    }

    function loadOrders() {
        fetch('view_orders.php') // Fetch from PHP script
            .then(response => response.json())
            .then(orders => {
                const orderList = document.getElementById('orderList');
                orderList.innerHTML = '';
                orders.forEach((order, index) => {
                    const foodPrice = foodPrices[order.food_item] || 0;
                    const drinkPrice = drinkPrices[order.drink_item] || 0;
                    const totalAmount = (foodPrice + drinkPrice) * order.quantity;
                    let row = document.createElement('tr');
                    row.innerHTML = `
              <td>${order.customer_name}</td>
              <td>${order.phone_number}</td>
              <td>${order.food_item}</td>
              <td>${order.drink_item}</td>
              <td>${order.quantity}</td>
              <td>${order.delivery_instructions}</td>
              <td>
                <input type="checkbox" ${order.delivered ? 'checked' : ''} onclick="toggleDelivered(${index})">
              </td>
              <td>${totalAmount}</td>
              <td>${order.timestamp || 'N/A'}</td>
              <td><button class="delete-btn" onclick="deleteOrder(${index})">Delete</button></td>
            `;
                    orderList.appendChild(row);
                });
            });
    }

    function saveOrder(order) {
        fetch('view_orders.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(order)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                loadOrders();
            });
    }

    function deleteOrder(index) {
        if (confirm('Are you sure you want to delete this order?')) {
            fetch('view_orders.php', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        index
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    loadOrders();
                });
        }
    }

    function toggleDelivered(index) {
        const orderList = document.getElementById('orderList');
        const row = orderList.children[index];
        const checkbox = row.querySelector('input[type="checkbox"]');
        const delivered = checkbox.checked;
        fetch('view_orders.php', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    index,
                    delivered
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            });
    }

    function printOrders() {
        window.print();
    }

    function printReceipt() {
        window.print();
    }

    function downloadOrders() {
        const orders = document.getElementById('orderList').innerHTML;
        const blob = new Blob([orders], {
            type: 'text/html'
        });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'orders.html';
        a.click();
        URL.revokeObjectURL(url);
    }

    function renderMostSoldCharts() {
        // Add Chart.js code for rendering most sold food and drink charts here
    }

    function updateVisitCounter() {
        fetch('view_orders.php', {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('visitCounter').innerText = `Visits: ${data.visits}`;
            });
    }

    function showVisitorInfo() {
        fetch('view_orders.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('visitorInfo').innerText = `Last Visit: ${data.lastVisit}`;
            });
    }

    function searchOrders() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#orderList tr');
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const match = Array.from(cells).some(cell => cell.innerText.toLowerCase().includes(input));
            row.style.display = match ? '' : 'none';
        });
    }

    function filterOrders(radio) {
        const filter = radio.value;
        const rows = document.querySelectorAll('#orderList tr');
        rows.forEach(row => {
            const delivered = row.querySelector('input[type="checkbox"]').checked;
            if (filter === 'all' || (filter === 'delivered' && delivered) || (filter === 'pending' && !
                    delivered)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    </script>
</body>

</html>