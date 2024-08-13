<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Digital Lunchbox Admin</title>
    <style>
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

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.1);
    }

    .login-box {
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 300px;
        width: 100%;
    }

    .login-box input {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        font-size: 1rem;
    }

    .login-box button {
        padding: 10px;
        width: 100%;
        background-color: #3498db;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .login-box button:hover {
        background-color: #2980b9;
    }

    @media (max-width: 600px) {
        .container {
            margin: 20px auto;
            padding: 10px;
        }

        table,
        th,
        td {
            font-size: 0.9rem;
            padding: 8px;
        }
    }

    @media (max-width: 400px) {
        .login-box {
            padding: 10px;
        }

        .login-box input,
        .login-box button {
            padding: 8px;
            font-size: 0.9rem;
        }
    }

    .watermark {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 999;
        font-size: 5rem;
        color: rgba(0, 0, 0, 0.1);
        pointer-events: none;
    }

    .visit-counter {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #3498db;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .visitor-info {
        margin-top: 10px;
        font-size: 0.8rem;
        color: #555;
    }

    .search-container {
        margin-bottom: 20px;
    }

    .search-container input[type=text] {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        font-size: 1rem;
        box-sizing: border-box;
    }

    .status-filter {
        margin-bottom: 20px;
    }

    .status-filter label {
        margin-right: 10px;
    }

    .chart-container {
        margin-top: 20px;
        max-width: 600px;
        margin: auto;
    }

    /* Styles for receipt */
    #receiptContainer {
        display: none;
    }

    #receiptDetails {
        margin-bottom: 20px;
    }

    .print-btn,
    .back-btn {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="login-container" id="loginContainer">
        <div class="login-box">
            <h1>Digital Lunchbox Admin</h1>
            <input type="password" id="password" placeholder="Enter password" />
            <button onclick="login()">Login</button>
            <a class="nav-link" id="nav-link5" href="home.php">Home</a>
        </div>
    </div>

    <div class="container" id="orderContainer" style="display: none;">
        <h1>Admin Panel</h1>
        <button class="logout-btn" onclick="logout()">Logout</button>

        <a href="view_orders.php" class="styled-button">View orders</a>

    </div>


    <div id="watermark" class="watermark">Digital Lunchbox Admin</div>

    <script>
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
        fetch('http://localhost:3000/api/orders')
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
              <td>${order.tel}</td>
              <td>${order.food}</td>
              <td>${order.drink}</td>
              <td>${order.quantity}</td>
              <td>${order.delivery}</td>
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
        fetch('http://localhost:3000/api/orders', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(order)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Order saved:', data);
                loadOrders();
            })
            .catch(error => {
                console.error('Error saving order:', error);
            });
    }


    function toggleDelivered(index) {
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        orders[index].delivered = !orders[index].delivered;
        localStorage.setItem('orders', JSON.stringify(orders));
        loadOrders();
        renderMostSoldCharts(); // Re-render charts after updating orders
    }

    function deleteOrder(index) {
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        orders.splice(index, 1);
        localStorage.setItem('orders', JSON.stringify(orders));
        loadOrders();
        renderMostSoldCharts(); // Re-render charts after deleting order
    }

    function printOrders() {
        window.print();
    }

    function downloadOrders() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();
        doc.text("Order List", 10, 10);
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        orders.forEach((order, index) => {
            const foodPrice = foodPrices[order.food] || 0;
            const drinkPrice = drinkPrices[order.drink] || 0;
            const totalAmount = (foodPrice + drinkPrice) * order.quantity;
            doc.text(`Order ${index + 1}: ${JSON.stringify(order)} | Amount: ${totalAmount}`, 10, 20 + (index *
                10));
        });
        doc.save('orders.pdf');
    }

    function searchOrders() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#orderList tr');
        rows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            let found = false;
            for (let i = 0; i < cells.length; i++) {
                if (cells[i].innerText.toLowerCase().includes(input)) {
                    found = true;
                    break;
                }
            }
            row.style.display = found ? '' : 'none';
        });
    }

    function filterOrders(radio) {
        const status = radio.value;
        const rows = document.querySelectorAll('#orderList tr');
        rows.forEach(row => {
            const delivered = row.querySelector('input[type=checkbox]').checked;
            if (status === 'all' || (status === 'delivered' && delivered) || (status === 'pending' && !
                    delivered)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function recordVisit() {
        let visits = parseInt(localStorage.getItem('visits')) || 0;
        localStorage.setItem('visits', visits + 1);
    }

    function updateVisitCounter() {
        const visits = localStorage.getItem('visits') || 0;
        document.getElementById('visitCounter').innerText = `Visits: ${visits}`;
    }

    function showVisitorInfo() {
        const date = new Date();
        const visitorInfo = `Last visit: ${date.toLocaleDateString()} ${date.toLocaleTimeString()}`;
        document.getElementById('visitorInfo').innerText = visitorInfo;
    }

    function renderMostSoldCharts() {
        let orders = JSON.parse(localStorage.getItem('orders')) || [];

        let foodCounts = {};
        let drinkCounts = {};

        orders.forEach(order => {
            if (order.food) {
                foodCounts[order.food] = (foodCounts[order.food] || 0) + order.quantity;
            }
            if (order.drink) {
                drinkCounts[order.drink] = (drinkCounts[order.drink] || 0) + order.quantity;
            }
        });

        const mostSoldFoodCtx = document.getElementById('mostSoldFoodChart').getContext('2d');
        const mostSoldDrinkCtx = document.getElementById('mostSoldDrinkChart').getContext('2d');
        const mostSoldChartCtx = document.getElementById('mostSoldChart').getContext('2d');

        const foodLabels = Object.keys(foodCounts);
        const foodData = Object.values(foodCounts);

        const drinkLabels = Object.keys(drinkCounts);
        const drinkData = Object.values(drinkCounts);

        // Render food chart
        new Chart(mostSoldFoodCtx, {
            type: 'bar',
            data: {
                labels: foodLabels,
                datasets: [{
                    label: 'Most Sold Food Items',
                    data: foodData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Render drink chart
        new Chart(mostSoldDrinkCtx, {
            type: 'bar',
            data: {
                labels: drinkLabels,
                datasets: [{
                    label: 'Most Sold Drinks',
                    data: drinkData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Combine food and drink data for the third chart
        const allItems = [...Object.entries(foodCounts), ...Object.entries(drinkCounts)];
        const allLabels = allItems.map(item => item[0]);
        const allData = allItems.map(item => item[1]);

        // Render combined chart
        new Chart(mostSoldChartCtx, {
            type: 'bar',
            data: {
                labels: allLabels,
                datasets: [{
                    label: 'Most Sold Items (Food + Drink)',
                    data: allData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function generateReceipt(index) {
        let orders = JSON.parse(localStorage.getItem('orders')) || [];
        const order = orders[index];
        const foodPrice = foodPrices[order.food] || 0;
        const drinkPrice = drinkPrices[order.drink] || 0;
        const totalAmount = (foodPrice + drinkPrice) * order.quantity;

        const receiptDetails = `
        <h3>Digital Lunchbox Receipt</h3>
        <p><strong><b>NAME:</b></strong> ${order.name}</p>
        <p><strong><b>PHONE:</b></strong> ${order.tel}</p>
        <p><strong><b>FOOD ITEM:</b></strong> ${order.food}</p>
        <p><strong><b>DRINK:</b></strong> ${order.drink}</p>
        <p><strong><b>QUANTITY:</b></strong> ${order.quantity}</p>
        <p><strong><b>DELIVERY:</b></strong> ${order.delivery}</p>
        <p><strong><b>AMOUNT PAID:</b></strong> KES ${totalAmount}</p>
        <p><strong><b>DATE & TIME:</b></strong> ${order.timestamp || 'N/A'}</p>
        <p><strong>All Rights Reserved &copy; 2024, Digital Lunchbox &trade;</strong></p>
      `;
        document.getElementById('receiptDetails').innerHTML = receiptDetails;
        document.getElementById('orderContainer').style.display = 'none';
        document.getElementById('receiptContainer').style.display = 'block';
    }

    function printReceipt() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        // Create a watermark image
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        canvas.width = 210; // A4 size width in mm
        canvas.height = 297; // A4 size height in mm

        ctx.fillStyle = 'rgba(139, 0, 0, 0.1)'; // Red color with transparency
        ctx.font = 'bold 48px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate(-Math.PI / 4);
        ctx.fillText('PAID', 0, 0);

        const watermarkImage = canvas.toDataURL('image/png');

        // Add watermark to PDF
        doc.addImage(watermarkImage, 'PNG', 0, 0, 210, 297, undefined, 'FAST');

        // Center align text
        doc.setFontSize(12);
        doc.setFont("helvetica", "bold");
        doc.text("Digital Lunchbox Receipt", 105, 30, {
            align: "center"
        });

        const receiptDetails = document.getElementById('receiptDetails').innerText.split('\n');
        let yPosition = 40;
        receiptDetails.forEach(line => {
            doc.setFontSize(12);
            doc.setFont("helvetica", "normal");
            doc.text(line, 105, yPosition, {
                align: "center"
            });
            yPosition += 10;
        });

        doc.setFontSize(10);
        doc.setFont("helvetica", "bold");
        doc.text("All Rights Reserved © 2024, Digital Lunchbox ™", 105, yPosition + 10, {
            align: "center"
        });

        doc.save('clientreceipt.pdf');
    }



    function showOrderList() {
        document.getElementById('receiptContainer').style.display = 'none';
        document.getElementById('orderContainer').style.display = 'block';
    }
    </script>
</body>

</html>