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
    <title>Details | Africa United Space</title>
    <link rel="stylesheet" href="css/style.css">
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


    /* Color Box Styling */
.color-box {
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 4px;
    margin-left: 10px;
    border: 1px solid #ccc;
}

/* Size Box Styling */
.size-box {
    display: inline-block;
    padding: 5px 10px;
    margin-left: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
}

/* Active Size */
.size-option.act {
    background: #B20000;
    color: #fff;
}

/* Hover effects for size selection */
.size-box:hover {
    background-color: #f0f0f0;
    cursor: pointer;
}

    </style>
</head>
<body>
    <!-- header start -->
    <div class="task">
        <header class="subhead">
            <a href="."><img src="images/logo.png" alt="Logo"></a>
            <nav class="">
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
    <!-- header end -->

    <section class="maindock">
        <!-- <span class="change">STORE</span> -->
         <!-- Details Section -->
         <section class="product-section">
        <div class="product-gallery">
        <img id="product-image" src="images/shirt.png" alt="T-Shirt Image" style="width: 250px; height: auto;">

        </div>
        
        <div class="product-details">
            <h1 id="product-name"></h1>
            <hr>
            <p id="product-price" class="price">$40</p>
            <p class="content">Fabric Content</p>
            <p ></p>
            <br>
            <p id="product-description"></p>
            <br>
         <!-- Color Options -->
<div class="color-options">
    <span>Colour: </span>
    <div id="product-colour" class="color-box"></div>
</div>

<!-- Size Options -->
<div class="size">
    <span>Size: </span>
    <div id="product-size" class="size-box"></div>
</div>

            <!-- Quantity and Add to Cart -->
            <span>Quantity</span>
            <div class="quan">
                <div class="count">
                <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value="1">
                    <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                </div>
                <button class="cartAdd">Add to cart</button>
            </div>
        </div>
    </section>

    <!-- Size Chart -->
    <section class="size-chart">
        <h2>Size Chart <span>+</span></h2>
        <table>
            <tr>
                <th>Size</th>
                <th>S</th>
                <th>M</th>
                <th>L</th>
                <th>XL</th>
                <th>2XL</th>
            </tr>
            <tr>
                <td>Length</td>
                <td>28"</td>
                <td>29"</td>
                <td>30"</td>
                <td>31"</td>
                <td>32"</td>
            </tr>
            <tr>
                <td>Width</td>
                <td>19"</td>
                <td>20.5"</td>
                <td>22"</td>
                <td>24"</td>
                <td>26"</td>
            </tr>
        </table>
    </section>
          <!-- Details Section End -->
           <hr>
          <div class="like">
             You may also like
          </div>
        <div class="product-grid">
            <!-- Product Card -->
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
          <a href="#">
          <div class="product-card">
                <div class="seperate">
                <button class="pre-order-btn">Pre-order now</button>
                <img src="images/cartbin.png" alt="">
                </div>
                <div class="seperate">
                <p class="discount">50% Discount</p>
                <p class="price">14ZAR</p>
                </div>
            </div>
            <p class="description">Merch T Shirt AUS branded</p>
          </a>
                 
            <!-- Repeat Product Cards -->
          <!-- ... Add as many cards as you need -->
        </div>
         <!-- Pagination -->
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

    <!-- footer Starts -->
    <footer>
        <div class="spread">
            <img src="images/logo-black.png" alt="Logo">
            <div class="quicklink">
                <ul>
                    <li><a href="about">About Us</a></li>
                    <li><a href="contact">Contact Us</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Shop</a></li>
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
        <div class="socials">
                <a href="https://www.instagram.com/africaunitedspace" target="_blank"><img src="images/twitter.webp" alt=""></a>
                <a href="https://tiktok.com/africa.united.spa4" target="_blank"><img src="images/tiktok.webp" alt=""></a>
                <a href="https://www.youtube.com/@Africaunited-c6w" target="_blank"><img src="images/tube.png" alt=""></a>
                
            </div>
    </footer>
    <!-- footer ends -->

    <script src="js/script.js"></script>

<script>
const productDetails = JSON.parse(localStorage.getItem('productDetails'));

console.log(productDetails);

// Check if data exists
if (productDetails) {
    const productName = document.getElementById('product-name');
    const productPrice = document.getElementById('product-price');
    const productDescription = document.getElementById('product-description');
    const productImage = document.getElementById('product-image');
    const productColour = document.getElementById('product-colour');
    const productSize = document.getElementById('product-size');



        // productName.innerText = productDetails.product_name;

    if (productPrice) {
        productPrice.innerText = productDetails.price;
    }
    if (productDescription) {
        productDescription.innerText = productDetails.description;
    }
    if (productDescription) {
        productDescription.innerText = productDetails.description;
    }
    if (productImage) {
        productImage.src = productDetails.image;
    }
    if (productColour) {
        productColour.style.backgroundColor = productDetails.colours; // assuming 'colours' is a valid CSS color
    }
    
    if (productSize ) {
        productSize.innerText = productDetails.size 
    }
}



    // Initialize cart in localStorage if not already present
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Function to update quantity
    function updateQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        let quantity = parseInt(quantityInput.value);
        quantity = Math.max(1, quantity + change); // Ensure quantity is at least 1
        quantityInput.value = quantity;
    }

    // Increase quantity button
    function increaseQuantity() {
        updateQuantity(1);
    }

    // Decrease quantity button
    function decreaseQuantity() {
        updateQuantity(-1);
    }

    // Add to Cart button event listener
    document.querySelector('.cartAdd').addEventListener('click', () => {
        const quantity = parseInt(document.getElementById('quantity').value);

        // Check if item already exists in cart and update quantity if it does
        const cartIndex = cart.findIndex(item => item.id === productDetails.id);
        if (cartIndex !== -1) {
            cart[cartIndex].quantity += quantity;
        } else {
            // Add new item to cart
            cart.push({
                id: productDetails.id,
                name: productDetails.product_name,
                price: productDetails.price,
                quantity: quantity,
                image: productDetails.image,
                colour: productDetails.colours,
                size: productDetails.size
            });
        }

        // Save updated cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Product added to cart!');

        const products = JSON.parse(localStorage.getItem('cart'));
        console.log(products);
        
        window.location.href = "cart.php";

    });

    // Quantity buttons
    document.querySelector('.quantity-btn:first-child').onclick = decreaseQuantity;
    document.querySelector('.quantity-btn:last-child').onclick = increaseQuantity;

    </script>
</body>
</html>
