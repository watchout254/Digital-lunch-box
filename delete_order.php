<?php
$servername = "sql303.infinityfree.com";
$username = "if0_37012884";
$password = "3YzqZOmtfg";
$dbname = "if0_37012884_orders_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the raw POST data
$data = file_get_contents("php://input");
$request = json_decode($data, true);

// Check if index is set in the request
if (isset($request['index']) && is_numeric($request['index'])) {
    $index = (int)$request['index'];

    // Fetch all orders
    $sql = "SELECT id FROM orders ORDER BY id ASC";
    $result = $conn->query($sql);

    if ($result) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);

        // Check if the index is valid
        if (isset($orders[$index])) {
            $orderId = $orders[$index]['id'];

            // Delete the order from the database
            $deleteSql = "DELETE FROM orders WHERE id = ?";
            $stmt = $conn->prepare($deleteSql);
            $stmt->bind_param("i", $orderId);

            if ($stmt->execute()) {
                $response = ["message" => "Order deleted successfully"];
            } else {
                $response = ["message" => "Error deleting order: " . $stmt->error];
            }

            $stmt->close();
        } else {
            $response = ["message" => "Order not found"];
        }
    } else {
        $response = ["message" => "Failed to fetch orders: " . $conn->error];
    }
} else {
    $response = ["message" => "Invalid request"];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>