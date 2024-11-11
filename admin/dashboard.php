<?php
session_start(); 

if (!isset($_SESSION['admin_id'])){
    header('Location: login.php');
    exit();
}

// Database connection
$servername = "localhost"; // Change with your server details
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ausdb"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products
$sql = "SELECT * FROM products"; // Query to fetch all products
$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <style>
         @font-face {
    font-family: 'NextShpere';
    src: 
    /* url('../fonts/NextSphereBlack.ttf') format('truetype'); */
         url('../fonts/SphereNextThin.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'NextSh';
    src: 
    url('../fonts/NextSphereBlack.ttf') format('truetype');
         /* url('../fonts/SphereNextThin.ttf') format('truetype'); */
    font-weight: normal;
    font-style: normal;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        /* Container for dashboard layout */
        .dashboard-container {
            font-family: "Plus Jakarta Sans", sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid #ddd;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .logo img {
            width: 150px;
            display: block;
            margin: 0 auto;
        }

        .sidebar .menu {
            list-style: none;
        }

        .sidebar .menu li {
            margin: 15px 0;
        }

        .sidebar .menu li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
        }
        
        h3{
            font-family: "Plus Jakarta Sans", sans-serif;
            font-weight:600;
            color:#94A3B8;
            font-size:16px;
        }
        .sidebar .menu li a:hover, .sidebar .menu li a.active {
            background-color: #FFE1E1;
            color: #DA200C;
            font-weight:700;
            border-radius:12px;
            font-family: "Plus Jakarta Sans", sans-serif;
        }
        
        .sidebar .menu li a img {
            margin-right: 10px;
            color: #DA200C;
        }

        .sidebar .logout {
            margin-top: auto;
            text-align: center;
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        /* Main content area */
        .main-content {
            flex: 1;
            /* padding: 20px;s */
        }

        .main-content .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background:#fff;
            padding:20px;
        }
        .body{
            padding:20px;
        }

        .main-content .header h1 {
            font-size: 24px;
            color: #333;
        }

        .main-content .header .search-bar {
            position: relative;
            width: 250px;
        }

        .main-content .header .search-bar input {
            width: 100%;
            padding: 8px 40px 8px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .main-content .header .search-bar svg {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .main-content .header .user-info {
            display: flex;
            align-items: center;
        }

        .main-content .header .user-info img {
            width: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .main-content .header .user-info .user-name {
            font-size: 14px;
            color: #333;
        }

        /* Transaction table */
        .transaction-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .transaction-table th, .transaction-table td {
            padding: 15px;
            text-align: left;
            font-size: 14px;
        }

        .transaction-table th {
            background-color: #f3f3f3;
            color: #666;
            font-weight: bold;
        }

        .transaction-table td {
            border-bottom: 1px solid #eee;
        }

        .transaction-table .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 12px;
            color: #fff;
        }

        .transaction-table .status.completed {
            background-color: #5cb85c;
        }

        .transaction-table .status.cancelled {
            background-color: #d9534f;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 10px;
                flex-direction: row;
                justify-content: space-between;
            }

            .main-content .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .main-content .header .search-bar, .main-content .header .user-info {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Section -->
        <div class="sidebar">
            <div class="logo">
                <img src="../images/logo-black.png" alt="Logo">
            </div>

            <h3>MENU</h3>
            <ul class="menu">
                <li><a href="dashboard" class="active"><span><img src="../images/dash.svg" alt=""></span> Dashboard</a></li>
                <li><a href="analytics"><span><img src="../images/account.svg" alt=""></span> Analytics</a></li>
                <li><a href="inventory"><span><img src="../images/invent.svg" alt=""></span> Inventory</a></li>
            </ul>
            <div class="logout"><img src="../images/logout.svg" alt=""> Log out</div>
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <!-- Search icon -->
                    </div>
                <div class="user-info">
                <img src="../images/user.png" alt="admin">
                    <div class="user-name">Rasheed O.<br><small>Administrator</small></div>
                </div>
            </div>

            <!-- Welcome and Transactions Table -->
            <div class="body">
                <h2>Welcome, Daniel</h2>
                <p>Monday, 05 August 2025</p>
                <table class="transaction-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['product_name'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No products found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
