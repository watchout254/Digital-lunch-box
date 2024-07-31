<?php
// submit_order.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "sql303.infinityfree.com";
    $username = "if0_37012884";
    $password = "3YzqZOmtfg"; // Replace with your actual password
    $dbname = "if0_37012884_orders_db";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Sanitize and get POST data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['tel']);
    $food = mysqli_real_escape_string($conn, $_POST['food']);
    $drink = mysqli_real_escape_string($conn, $_POST['drink']);
    $quantity = intval($_POST['quantity']);
    $delivery = mysqli_real_escape_string($conn, $_POST['delivery']);
    $total_amount = floatval($_POST['totalAmount']);
    
    // Insert order into database
    $sql = "INSERT INTO orders (name, phone, food, drink, quantity, delivery, total_amount)
            VALUES ('$name', '$phone', '$food', '$drink', $quantity, '$delivery', $total_amount)";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to thank_you.php
        header("Location: thank_you.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>