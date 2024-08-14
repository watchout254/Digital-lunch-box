<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists and password matches
    $sql = "SELECT id FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        echo "Incorrect username or password.";
    }

    $stmt->close();
}

$conn->close();
?>