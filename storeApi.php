<?php
header('Content-Type: application/json'); // Ensure JSON response

// Enable error reporting for debugging (can remove or comment out in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'ausdb';

// Create a new database connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check the database connection
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Query to fetch products
$sql = "SELECT id,product_name, description, image, colours, size, price FROM products";

$result = $conn->query($sql);

if (!$result) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to fetch products: ' . $conn->error]);
    $conn->close();
    exit();
}

// Fetch products into an array
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Close the database connection
$conn->close();

// Output the products as JSON
echo json_encode($products);
