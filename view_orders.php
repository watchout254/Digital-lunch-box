<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Hide errors in production

$servername = "sql110.infinityfree.com";
$username = "if0_37112273";
$password = "r9I7cRHi88Xz93"; // Replace with your actual password
$dbname = "if0_37112273_lunchbox";

// Set the default timezone to Africa/Nairobi
date_default_timezone_set('Africa/Nairobi');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders and their items
$sql = "SELECT o.id, o.name, o.phone, o.delivery, o.total_amount, o.order_date,
               GROUP_CONCAT(CONCAT(oi.food_item, ' (', oi.food_quantity, ')') SEPARATOR ', ') AS food_items,
               GROUP_CONCAT(CONCAT(oi.drink_item, ' (', oi.drink_quantity, ')') SEPARATOR ', ') AS drink_items
        FROM orders o
        LEFT JOIN order_items oi ON o.id = oi.order_id
        GROUP BY o.id";

$result = $conn->query($sql);

$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert order_date to the desired timezone and format
        $row['order_date'] = date('Y-m-d H:i:s', strtotime($row['order_date']));
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Order List</h1>
        <button class="print-btn" onclick="printOrders()">Print</button>

        <a href="admin.php" class="styled-button">Admin panel</a>
        <div class="search-container">
            <input type="text" id="searchInput" onkeyup="searchOrders()" placeholder="Search for orders...">
        </div>
        <div class="status-filter">
            <label><input type="radio" name="statusFilter" value="all" checked onchange="filterOrders(this)">
                All</label>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tel</th>
                        <th>Food Items</th>
                        <th>Drink Items</th>
                        <th>Delivery</th>
                        <th>Total Amount</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="orderList">
                    <?php foreach ($orders as $order): ?>
                    <tr data-id="<?= htmlspecialchars($order['id']) ?>">
                        <td><?= htmlspecialchars($order['name']) ?></td>
                        <td><?= htmlspecialchars($order['phone']) ?></td>
                        <td><?= htmlspecialchars($order['food_items']) ?></td>
                        <td><?= htmlspecialchars($order['drink_items']) ?></td>
                        <td><?= htmlspecialchars($order['delivery']) ?></td>
                        <td><?= htmlspecialchars($order['total_amount']) ?></td>
                        <td><?= htmlspecialchars($order['order_date']) ?></td>
                        <td>

                            <button class="receipt-btn" onclick="generateReceipt(<?= $order['id'] ?>)">Generate
                                Receipt</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function printOrders() {
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

    function generateReceipt(orderId) {
        const {
            jsPDF
        } = window.jspdf;
        const row = document.querySelector(`#orderList tr[data-id="${orderId}"]`);
        const order = {
            name: row.children[0].innerText,
            phone: row.children[1].innerText,
            food: row.children[2].innerText,
            drink: row.children[3].innerText,
            delivery: row.children[4].innerText,
            total_amount: row.children[5].innerText,
            order_date: row.children[6].innerText
        };

        const doc = new jsPDF();
        doc.text(`Customer Name: ${order.name}`, 10, 10);
        doc.text(`Phone Number: ${order.phone}`, 10, 20);
        doc.text(`Food Items: ${order.food}`, 10, 30);
        doc.text(`Drink Items: ${order.drink}`, 10, 40);
        doc.text(`Delivery Instructions: ${order.delivery}`, 10, 50);
        doc.text(`Total Amount: ${order.total_amount}`, 10, 60);
        doc.text(`Order Date: ${order.order_date}`, 10, 70);

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
            let match = false;
            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(input)) {
                    match = true;
                }
            });
            row.style.display = match ? '' : 'none';
        });
    }

    function filterOrders(radio) {
        const value = radio.value;
        const rows = document.querySelectorAll('#orderList tr');
        rows.forEach(row => {
            if (value === 'all') {
                row.style.display = '';
            } else {
                const delivery = row.children[6].textContent;
                row.style.display = delivery.toLowerCase() === value ? '' : 'none';
            }
        });
    }

    function deleteOrder(orderId) {
        if (confirm('Are you sure you want to delete this order?')) {
            fetch('delete_order.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: orderId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.message === "Order deleted successfully") {
                        document.querySelector(`tr[data-id="${orderId}"]`).remove();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    }
    </script>
</body>

</html>