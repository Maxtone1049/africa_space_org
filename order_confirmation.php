<?php
// order_confirmation.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ausdb";

$conn = new mysqli($servername, $username, $password, $dbname);
include('email.php');


// Sanitize POST data
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
$first_name = isset($_POST['first_name']) ? mysqli_real_escape_string($conn, $_POST['first_name']) : '';
$last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($conn, $_POST['last_name']) : '';
$address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
$city = isset($_POST['city']) ? mysqli_real_escape_string($conn, $_POST['city']) : '';
$postalCode = isset($_POST['postalCode']) ? mysqli_real_escape_string($conn, $_POST['postalCode']) : '';
$phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
$amount = isset($_POST['amount']) ? mysqli_real_escape_string($conn, $_POST['amount']) : '';
$country = isset($_POST['country']) ? mysqli_real_escape_string($conn, $_POST['country']) : '';
$items = isset($_POST['items']) ? json_decode($_POST['items'], true) : [];
$tx_ref = isset($_POST['tx_ref']) ? mysqli_real_escape_string($conn, $_POST['tx_ref']) : '';
$status = isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';

// Ensure required fields are not empty
if (empty($email) || empty($first_name) || empty($tx_ref)) {
    echo "Missing required fields!";
    echo "\n Here's the Email".$email;
    echo "\n Here's the Transaction Reference".$tx_ref;
    exit;
}

// Insert into order table
$order_sql = "INSERT INTO orders (tx_ref, status, first_name, last_name, email, address, city, postal_code, phone,total_amount, country)
VALUES ('$tx_ref', '$status', '$first_name', '$last_name', '$email', '$address', '$city', '$postalCode', '$phone', '$amount', '$country')";

if ($conn->query($order_sql) === TRUE) {
    $order_id = $conn->insert_id;

    // Insert each item into the order_items table
    foreach ($items as $item) {
        $item_id = isset($item['id']) ? mysqli_real_escape_string($conn, $item['id']) : '';
        $item_name = isset($item['name']) ? mysqli_real_escape_string($conn, $item['name']) : '';
        $item_quantity = isset($item['quantity']) ? mysqli_real_escape_string($conn, $item['quantity']) : '';
        $item_price = isset($item['price']) ? mysqli_real_escape_string($conn, $item['price']) : '';
        $item_image = isset($item['image']) ? mysqli_real_escape_string($conn, $item['image']) : '';
        $item_size = isset($item['size']) ? mysqli_real_escape_string($conn, $item['size']) : '';

        $item_sql = "INSERT INTO order_items (order_id,item_id, item_name, item_price, item_quantity, item_image,item_size)
        VALUES ('$order_id','$item_id', '$item_name', '$item_price', '$item_quantity', '$item_image','$item_size')";

        $conn->query($item_sql);
    }
    header("Location: .");

    echo "Order stored successfully!";
} else {
    echo "Error: " . $order_sql . "<br>" . $conn->error;
}

$conn->close();
?>
