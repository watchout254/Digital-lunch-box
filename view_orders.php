<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Hide errors in production

$servername = "sql303.infinityfree.com";
    $username = "if0_37012884";
    $password = "3YzqZOmtfg"; // Replace with your actual password
    $dbname = "if0_37012884_orders_db";// replace with your database name

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

    <title>Digital Lunchbox | View Orders</title>
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
    .download-btn,
    .receipt-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .delete-btn:hover,
    .logout-btn:hover,
    .print-btn:hover,
    .download-btn:hover,
    .receipt-btn:hover {
        background-color: #c0392b;
    }

    .styled-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.3s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .styled-button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .styled-button:active {
        background-color: #004085;
        transform: translateY(0);
    }

    /* More existing styles */
    </style>
</head>

<body>
    <div class="container">
        <h1>Order List</h1>
        <!--<button class="logout-btn" onclick="logout()">Logout</button>-->
        <button class="print-btn" onclick="printOrders()">Print</button>
        <button class="download-btn" onclick="downloadOrders()">Download</button>
        <a href="admin.php" class="styled-button">Admin panel</a>
        <!--<span id="visitCounter" class="visit-counter">Visits: 0</span>-->
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
                        <td><?= htmlspecialchars($order['name']) ?></td>
                        <td><?= htmlspecialchars($order['phone']) ?></td>
                        <td><?= htmlspecialchars($order['food']) ?></td>
                        <td><?= htmlspecialchars($order['drink']) ?></td>
                        <td><?= htmlspecialchars($order['quantity']) ?></td>
                        <td><?= htmlspecialchars($order['delivery']) ?></td>
                        <td>
                            <input type="checkbox" <?= $order['delivered'] ? 'checked' : '' ?>
                                onclick="toggleDelivered(<?= $index ?>)">
                        </td>
                        <td><?= htmlspecialchars($order['total_amount']) ?></td>
                        <td><?= htmlspecialchars($order['order_date']) ?></td>
                        <td>

                            <button class="receipt-btn" onclick="generateReceipt(<?= $index ?>)">Generate
                                Receipt</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
        "Chicken Biryani + Guacamole": 480,
        "Pork & Fries": 450,
        "Arrowroots boiled": 150,
        "Sweetpotatoes": 100,
        "French toast": 170,
        "Spanish": 150,
        "Pancakes": 50,
        "Sausages/Smokies": 50,
        "Samosa": 70
    };
    const drinkPrices = {
        "Lemonade": 100,
        "Milkshake": 150,
        "Fresh juice": 120,
        "Mocktails": 180,
        "Tea": 100,
        "Brewed Coffee": 100,
        "White coffee": 200
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
                    const foodPrice = foodPrices[order.food] || 0;
                    const drinkPrice = drinkPrices[order.drink] || 0;
                    const totalAmount = (foodPrice + drinkPrice) * order.quantity;
                    let row = document.createElement('tr');
                    row.innerHTML = `
                          <td>${order.name}</td>
                          <td>${order.phone}</td>
                          <td>${order.food}</td>
                          <td>${order.drink}</td>
                          <td>${order.quantity}</td>
                          <td>${order.delivery}</td>
                          <td>
                              <input type="checkbox" ${order.delivered ? 'checked' : ''} onclick="toggleDelivered(${index})">
                          </td>
                          <td>${totalAmount}</td>
                          <td>${order.order_date || 'N/A'}</td>
                          <td>
                              <button class="delete-btn" onclick="deleteOrder(${index})">Delete</button>
                              <button class="receipt-btn" onclick="generateReceipt(${index})">Generate Receipt</button>
                          </td>
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
                    alert(data.message);
                    if (data.message === 'Order deleted successfully') {
                        loadOrders(); // Reload orders after successful deletion
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
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
        a.download = 'orders.php';
        a.click();
        URL.revokeObjectURL(url);
    }

    async function generateReceipt(index) {
        const {
            jsPDF
        } = window.jspdf;
        const orderList = document.getElementById('orderList');
        const row = orderList.children[index];
        const order = {
            name: row.children[0].innerText,
            phone: row.children[1].innerText,
            food: row.children[2].innerText,
            drink: row.children[3].innerText,
            quantity: row.children[4].innerText,
            delivery: row.children[5].innerText,
            total_amount: row.children[7].innerText,
            order_date: row.children[8].innerText
        };

        const doc = new jsPDF();

        doc.text(`Customer Name: ${order.name}`, 10, 10);
        doc.text(`Phone Number: ${order.phone}`, 10, 20);
        doc.text(`Food Item: ${order.food}`, 10, 30);
        doc.text(`Drink Item: ${order.drink}`, 10, 40);
        doc.text(`Quantity: ${order.quantity}`, 10, 50);
        doc.text(`Delivery Instructions: ${order.delivery}`, 10, 60);
        doc.text(`Total Amount: ${order.total_amount}`, 10, 70);
        doc.text(`Timestamp: ${order.order_date}`, 10, 80);

        doc.setFontSize(40);
        doc.setTextColor(255, 0, 0);
        doc.text('Paid', 150, 50, {
            angle: -45
        });

        doc.save('receipt.pdf');
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