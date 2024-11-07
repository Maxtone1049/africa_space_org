<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Inventory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            border-right: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .logo img {
            width: 150px;
            margin: 0 auto 30px;
            display: block;
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
            display: flex;
            align-items: center;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }

        .sidebar .menu li a img {
            margin-right: 10px;
            color: #DA200C;
        }
        .sidebar .menu li a:hover,
        .sidebar .menu li a.active {
            background-color: #FFE1E1;
            color: #DA200C;
            font-weight: 700;
            border-radius: 12px;
        }

        .sidebar .logout {
            margin-top: auto;
            text-align: center;
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .header .search-bar {
            position: relative;
            width: 250px;
        }

        .header .search-bar input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info .user-name {
            font-size: 14px;
            color: #333;
            margin-left: 10px;
        }

        /* Inventory */
        .inventory-container {
            padding: 20px;
        }

        .inventory-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h3{
            font-family: "Plus Jakarta Sans", sans-serif;
            font-weight:600;
            color:#94A3B8;
            font-size:16px;
        }

        .inventory-header a {
            text-decoration:none;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .inventory-header button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-product {
            background-color: #ddd;
            color: #333;
        }

        .delete-product {
            background-color: #DA200C;
            color: #fff;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .product-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .product-card img {
            width: 100px;
            margin-bottom: 10px;
        }

        .product-card .product-title {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .product-card .product-units {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .product-card .product-price {
            font-size: 20px;
            color: #DA200C;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-card button {
            background-color: #DA200C;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-between;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .inventory-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-list {
                grid-template-columns: 1fr;
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
                <li><a href="dashboard"><span><img src="../images/dash.svg" alt=""></span> Dashboard</a></li>
                <li><a href="analytics"><span><img src="../images/account.svg" alt=""></span> Analytics</a></li>
                <li><a href="inventory" class="active"><span><img src="../images/invent.svg" alt=""></span> Inventory</a></li>
            </ul>
            <div class="logout"><img src="../images/logout.svg" alt=""> Log out</div>
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <div class="header">
                <h1>Inventory</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-info">
                <img src="../images/user.png" alt="admin">
                    <div class="user-name">Rasheed O.<br><small>Administrator</small></div>
                </div>
            </div>

            <!-- Inventory Content -->
            <div class="inventory-container">
                <div class="inventory-header">
                    <a href="addproduct" class="add-product">Add Product</a>
                    <button class="delete-product">Delete Product</button>
                </div>
                <div class="product-list">
                    <div class="product-card">
                        <img src="../images/shirt.png" alt="White T-Shirt">
                        <div class="product-title">White Merch T-Shirt AUS Branded</div>
                        <div class="product-units">57,239 units left</div>
                        <div class="product-price">$40</div>
                        <button>Update</button>
                    </div>
                    <div class="product-card">
                        <img src="../images/a1.jpg" alt="Toy Model Y">
                        <div class="product-title">AUS Toy Model Y</div>
                        <div class="product-units">57,239 units left</div>
                        <div class="product-price">$40</div>
                        <button>Update</button>
                    </div>
                    <div class="product-card">
                        <img src="../images/a2.jpg" alt="Black T-Shirt">
                        <div class="product-title">Black Merch T-Shirt AUS Branded</div>
                        <div class="product-units">57,239 units left</div>
                        <div class="product-price">$40</div>
                        <button>Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
