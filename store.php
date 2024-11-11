<?php

session_start(); 

if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Store | Africa United Space</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Add some basic styles for active size */
        .size-option {
        cursor: pointer;
        padding: 5px 10px;
        margin: 0 2px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .size-option.act {
        background: #B20000;
        color: #fff;
    }
    

    
    .na{
        display: none !important;
    }
    .de{
        display: none;
    }

    </style>
</head>


<body>

<div class="task">
        <header class="subhead">
            <a href="."><img src="images/logo.png" alt="Logo"></a>
            <nav>
                <button class="close">x</button>
                <ul class="pack">
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li><a href="login.php" class="sign">Sign in</a></li>
                        <li><a href="register.php" class="signup">Sign up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <button class="menu-toggle">☰</button>
        </header>
    </div>

    <section class="maindock">
        <span class="change">STORE</span>
        <div id="product-grid" class="product-grid">
            <!-- Product data will be populated here by storeJs.js -->
        </div>

        <div class="pagination">
            <span>&lt;</span>
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>&gt;</span>
        </div>
    </section>

    <footer>
        <div class="spread">
            <img src="images/logo-black.png" alt="Logo">
            <div class="quicklink">
                <ul>
                    <li><a href="about">About Us</a></li>
                    <li><a href="contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="policy">
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Agreements</a></li>
                </ul> 
            </div>
        </div>
        <p><a href="mailto:contact@africaunitedspace.org">[contact@africaunitedspace.org]</a></p>
    </footer>

    <script src="js/script.js"></script>
    <script src="js/storeJs.js"></script>
</body>
</html>
