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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $food = $_POST['food'];
    $drink = $_POST['drink'];
    $quantity = $_POST['quantity'];
    $delivery = $_POST['delivery'];
    $totalAmount = $_POST['totalAmount'];

    $sql = "INSERT INTO orders (customer_name, phone_number, food_item, drink_item, quantity, total_amount, delivery_instructions)
            VALUES ('$name', '$tel', '$food', '$drink', $quantity, $totalAmount, '$delivery')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a thank you page or display a confirmation message
        header("Location: thank_you.html"); // Ensure this file exists
        exit();
    } else {
        // Display error message if something went wrong
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>