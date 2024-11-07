<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Inventory - Add Product</title>
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

        /* Add Product Form */
        .add-product-container {
            padding: 20px;
        }

        .add-product-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .product-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-form label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }

        .product-form input[type="text"],
        .product-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .product-form textarea {
            resize: none;
            height: 100px;
        }

        .product-form .file-upload {
            display: flex;
            align-items: center;
            border: 1px dashed #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            color: #888;
            font-size: 14px;
            cursor: pointer;
        }

        .product-form .size-options {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .product-form .size-options .size-option {
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            color: #333;
        }

        .product-form .size-options .size-option.active,
        .product-form .size-options .size-option:hover {
            background-color: #DA200C;
            color: #fff;
        }

        .product-form button {
            width: 100%;
            padding: 12px;
            background-color: #DA200C;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        h3{
            font-family: "Plus Jakarta Sans", sans-serif;
            font-weight:600;
            color:#94A3B8;
            font-size:16px;
        }
        .sidebar .menu li a img {
            margin-right: 10px;
            color: #DA200C;
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

            <!-- Add Product Form -->
            <div class="add-product-container">
                <h2>Add Product</h2>
                <form class="product-form">
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" placeholder="Enter product name">

                    <label for="description">Description</label>
                    <textarea id="description" placeholder="Enter product description"></textarea>

                    <label for="colours">Colours</label>
                    <input type="text" id="colours" placeholder="Enter available colours">

                    <label for="imageUpload">Add Image</label>
                    <div class="file-upload" id="imageUpload">
                        <span>Click here to upload</span>
                    </div>

                    <label>Size:</label>
                    <div class="size-options">
                        <div class="size-option">S</div>
                        <div class="size-option">M</div>
                        <div class="size-option">L</div>
                        <div class="size-option">XL</div>
                        <div class="size-option">2XL</div>
                    </div>

                    <button type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for selecting size options
        const sizeOptions = document.querySelectorAll('.size-option');
        sizeOptions.forEach(option => {
            option.addEventListener('click', () => {
                sizeOptions.forEach(opt => opt.classList.remove('active'));
                option.classList.add('active');
            });
        });

        // Mock file upload click event
        document.getElementById('imageUpload').addEventListener('click', () => {
            alert('File upload functionality can be implemented here.');
        });
    </script>
</body>
</html>
