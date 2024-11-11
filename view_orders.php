<?php
// fetch_order_details.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ausdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all orders with customer details
$order_query = "
    SELECT orders.id, orders.tx_ref, orders.status, orders.first_name, orders.last_name, orders.email, 
           orders.address, orders.city, orders.postal_code, orders.phone, orders.total_amount, orders.country
    FROM orders
";
$order_result = $conn->query($order_query);

// Check if the query was successful
if (!$order_result) {
    die("Query failed: " . $conn->error);
}

if ($order_result->num_rows > 0) {
    echo "<h2>Order Details</h2>";
    echo "<table border='1'>
            <tr>
                <th>Order ID</th>
                <th>Transaction Reference</th>
                <th>Status</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Phone</th>
                <th>Amount</th>
                <th>Country</th>
                <th>Items</th>
            </tr>";

    while ($order_row = $order_result->fetch_assoc()) {
        $order_id = $order_row['id'];

        // Fetch items for this order
        $item_query = "
            SELECT item_name, item_price, item_quantity, item_image, item_size
            FROM order_items
            WHERE order_id = $order_id
        ";
        $item_result = $conn->query($item_query);

        // Check if the item query was successful
        if (!$item_result) {
            die("Item query failed: " . $conn->error);
        }

        $items_html = "";
        if ($item_result->num_rows > 0) {
            while ($item_row = $item_result->fetch_assoc()) {
                $items_html .= "<p>{$item_row['item_name']} - Quantity: {$item_row['item_quantity']} - Price: {$item_row['item_price']} - Size: {$item_row['item_size']} </p>";
            }
        } else {
            $items_html = "No items found.";
        }

        echo "<tr>
                <td>{$order_row['id']}</td>
                <td>{$order_row['tx_ref']}</td>
                <td>{$order_row['status']}</td>
                <td>{$order_row['first_name']}</td>
                <td>{$order_row['last_name']}</td>
                <td>{$order_row['email']}</td>
                <td>{$order_row['address']}</td>
                <td>{$order_row['city']}</td>
                <td>{$order_row['postal_code']}</td>
                <td>{$order_row['phone']}</td>
                <td>{$order_row['total_amount']}</td>
                <td>{$order_row['country']}</td>
                <td>$items_html</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No orders found.";
}

$conn->close();
?>
