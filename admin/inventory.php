<?php
session_start();

if (!isset($_SESSION['admin_id'])){
    header('Location: index.php');
    exit();
}

$host = 'localhost'; // Change this if using a different host
$dbname = 'ausdb'; // Your actual database name
$username = 'root'; // Your database username
$password = ''; // Your database password

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Query to get all products
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();

// Fetch all products
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['action'])) {
        if ($data['action'] === 'delete' && isset($data['id'])) {
            // Handle delete request
            $productId = $data['id'];
            $deleteStmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
            $deleteStmt->bindParam(':id', $productId, PDO::PARAM_INT);

            if ($deleteStmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete product.']);
            }
            exit;
        } elseif ($data['action'] === 'update' && isset($data['id'])) {
            // Handle update request
            $updateStmt = $pdo->prepare("UPDATE products SET product_name = :name, size = :size, colours = :colours, price = :price WHERE id = :id");
            $updateStmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
            $updateStmt->bindParam(':name', $data['product_name'], PDO::PARAM_STR);
            $updateStmt->bindParam(':size', $data['size'], PDO::PARAM_STR);
            $updateStmt->bindParam(':colours', $data['colours'], PDO::PARAM_STR);
            $updateStmt->bindParam(':price', $data['price'], PDO::PARAM_STR);

            if ($updateStmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update product.']);
            }
            exit;
        }
    }

    echo json_encode(['success' => false, 'message' => 'Invalid action.']);
    exit;
}

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
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .update {
            background-color: green;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .delete-product{
            background-color: red;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .product-image {
            /* width: 550px; */
            width: 150px;
            object-fit: cover;
            height: 150px;
            margin-bottom: 10px;
            border-radius: 15px;
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
                    <a href="addproduct.php" class="add-product">Add Product</a>
                    <!-- <button class="delete-product">Delete Product</button> -->
                </div>
                <div class="product-list">
                    <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?= htmlspecialchars($product['image']); ?>"  class="product-image" >
                        <div class="product-title"><?= htmlspecialchars($product['product_name']); ?></div>
                        <div class="product-size"><?= $product['size']; ?> size</div>
                        <div class="product-colour"><?= $product['colours']; ?> colours</div>
                        <div class="product-price">ZAR<?= number_format($product['price'], 2); ?></div>
                        <button class="update" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="fillUpdateForm(<?= $product['id']; ?>)">Update</button>
                        <button class="delete-product" onclick="deleteProduct(<?= $product['id']; ?>)">Delete</button>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>



    <!-- Update Product Modal -->
<div class="modal" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProductForm">
                    <input type="hidden" id="productId" name="id">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                    <div class="mb-3">
                        <label for="colours" class="form-label">Colours</label>
                        <input type="text" class="form-control" id="colours" name="colours">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <button type="button" class="btn btn-success" onclick="updateProduct()">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>




    <script>


function fillUpdateForm(id) {
        // Get the product details via AJAX or pass it directly in PHP
        const product = <?= json_encode($products); ?>.find(p => p.id === id);

        document.getElementById('productId').value = product.id;
        document.getElementById('product_name').value = product.product_name;
        document.getElementById('size').value = product.size;
        document.getElementById('colours').value = product.colours;
        document.getElementById('price').value = product.price;
    }

    function updateProduct() {
        const form = document.getElementById('updateProductForm');
        const formData = new FormData(form);
        const data = {
            action: 'update',
            id: formData.get('id'),
            product_name: formData.get('product_name'),
            size: formData.get('size'),
            colours: formData.get('colours'),
            price: formData.get('price')
        };

        fetch('inventory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(response => {
            if (response.success) {
                alert('Product updated successfully');
                window.location.reload(); // Reload the page to reflect the changes
            } else {
                alert('Failed to update product');
            }
        })
        .catch(error => console.error('Error:', error));
    }






function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        fetch('inventory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Product deleted successfully');
                location.reload(); // Reload the page after successful deletion
            } else {
                alert('Error deleting product: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}


    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
