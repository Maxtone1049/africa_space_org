<?php
header('Content-Type: application/json'); // Ensure JSON response

// Enable error reporting for debugging (can remove or comment out in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection (change credentials as per your setup)
$servername = "localhost"; // or your database host
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "ausdb"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to escape input data for security
function sanitize_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Get the JSON input from the Flutterwave callback
$data = json_decode(file_get_contents('php://input'), true);

// Check if data exists
if ($data) {
    // Sanitize and store data
    $item_name = sanitize_input($data['item_name']);
    $item_price = sanitize_input($data['item_price']);
    $item_quantity = sanitize_input($data['item_quantity']);
    $subtotal = sanitize_input($data['subtotal']);
    $item_image = sanitize_input($data['item_image']);
    $item_size = sanitize_input($data['item_size']);
    $first_name = sanitize_input($data['first_name']);
    $last_name = sanitize_input($data['last_name']);
    $email = sanitize_input($data['email']);
    $country = sanitize_input($data['country']);
    $address = sanitize_input($data['address']);
    $city = sanitize_input($data['city']);
    $postal_code = sanitize_input($data['postal_code']);
    $phone = sanitize_input($data['phone']);
    $total_amount = sanitize_input($data['total_amount']);
    $tx_ref = sanitize_input($data['tx_ref']);
    $status = sanitize_input($data['status']);
    $order_date = date('Y-m-d H:i:s'); // Use the current timestamp

    // Insert the data into the database
    $sql = "INSERT INTO user_orders (item_name, item_price, item_quantity, subtotal, item_image, item_size, 
            first_name, last_name, email, country, address, city, postal_code, phone, total_amount, 
            tx_ref, status, order_date) 
            VALUES ('$item_name', '$item_price', '$item_quantity', '$subtotal', '$item_image', '$item_size',
            '$first_name', '$last_name', '$email', '$country', '$address', '$city', '$postal_code', 
            '$phone', '$total_amount', '$tx_ref', '$status', '$order_date')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Payment data saved successfully.", "status" => "success"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error, "status" => "error"]);
    }
} else {
    echo json_encode(["message" => "Invalid or missing data.", "status" => "error"]);
}

// Close the database connection
$conn->close();
?>
