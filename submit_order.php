<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$servername = "sql303.infinityfree.com";
$username = "if0_37012884";
$password = "3YzqZOmtfg"; // Replace with your actual password
$dbname = "if0_37012884_orders_db"; // Make sure this matches the database name in the SQL file

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = isset($_POST['name']) ? $_POST['name'] : null;
$phone = isset($_POST['tel']) ? $_POST['tel'] : null;
$delivery = isset($_POST['delivery']) ? $_POST['delivery'] : null;
$total_amount = isset($_POST['totalAmount']) ? $_POST['totalAmount'] : null;

$food_items = isset($_POST['food']) ? $_POST['food'] : [];
$food_quantities = isset($_POST['food_quantity']) ? $_POST['food_quantity'] : [];
$drink_items = isset($_POST['drink']) ? $_POST['drink'] : [];
$drink_quantities = isset($_POST['drink_quantity']) ? $_POST['drink_quantity'] : [];

// Debugging: Print received data
echo "Name: $name<br>";
echo "Phone: $phone<br>";
echo "Delivery: $delivery<br>";
echo "Total Amount: $total_amount<br>";
echo "Food Items: " . print_r($food_items, true) . "<br>";
echo "Food Quantities: " . print_r($food_quantities, true) . "<br>";
echo "Drink Items: " . print_r($drink_items, true) . "<br>";
echo "Drink Quantities: " . print_r($drink_quantities, true) . "<br>";

// Check if $name is null
if ($name === null) {
    die("Error: 'name' cannot be null");
}

// Start transaction
$conn->begin_transaction();

try {
    // Prepare statement for inserting orders
    $stmt = $conn->prepare("INSERT INTO orders (name, phone, delivery, total_amount) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param('ssss', $name, $phone, $delivery, $total_amount);
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }
    $order_id = $conn->insert_id; // Get the last inserted ID

    // Prepare statement for inserting order items
    $stmt_order_items = $conn->prepare("INSERT INTO order_items (order_id, food_item, drink_item, food_quantity, drink_quantity) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt_order_items) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    // Insert food items
    foreach ($food_items as $index => $food) {
        $food_quantity = isset($food_quantities[$index]) ? (int)$food_quantities[$index] : 1;
        $drink_item = null;
        $drink_quantity = 0;
        $stmt_order_items->bind_param('issii', $order_id, $food, $drink_item, $food_quantity, $drink_quantity);
        if (!$stmt_order_items->execute()) {
            throw new Exception("Execute failed: " . $stmt_order_items->error);
        }
    }

    // Insert drink items
    foreach ($drink_items as $index => $drink) {
        $food_item = null;
        $food_quantity = 0;
        $drink_quantity = isset($drink_quantities[$index]) ? (int)$drink_quantities[$index] : 1;
        $stmt_order_items->bind_param('issii', $order_id, $food_item, $drink, $food_quantity, $drink_quantity);
        if (!$stmt_order_items->execute()) {
            throw new Exception("Execute failed: " . $stmt_order_items->error);
        }
    }

    // Commit transaction
    $conn->commit();

    // Redirect to thank_you.php
    header("Location: thank_you.php");
    exit(); // Make sure to exit after the redirect
} catch (Exception $e) {
    // Rollback transaction if something goes wrong
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close statement and connection
if (isset($stmt)) $stmt->close();
if (isset($stmt_order_items)) $stmt_order_items->close();
$conn->close();
?>