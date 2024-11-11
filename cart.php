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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cart | Africa United Space</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
     /* General Layout */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: #f9f9f9;
}

/* Container Alignment */
.maindock {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.carrier {
    background: #fff;
    padding: 20px;
    width: 100%;
    max-width: 1200px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/* Cart Item Alignment */
.carting {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    width: 100%;
}

.carting h4 {
    font-size: 16px;
    font-weight: bold;
}

/* Cart Items */
.cart-items {
    margin-top: 20px;
    width: 100%;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.cart-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.product-details {
    display: flex;
    align-items: center;
}

.quantity {
    display: flex;
    justify-content: center;
    align-items: center;
}

.total {
    font-size: 16px;
    font-weight: bold;
}

.pagination {
    background-color: #B20000;
    width: 8vw;
    height: 6vh;
    border-radius: 5%;
    background-color: #e3e3e3;
}

.pagination li {
    cursor: pointer;
}

/* Total Section */
.subT {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    font-size: 18px;
}

.subT .word {
    font-weight: bold;
}

.subT a {
    background-color: #B20000;
    color: #fff;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
}

.d{
    display: block;
}

.itemName{
    margin-bottom: 20% !important;
    font-weight: bolder;
}


.itemPrice{
    font-weight: 500;
}

/* Mobile Responsive Styles */
@media screen and (max-width: 768px) {
    .maindock {
        padding: 10px;
    }

    .carrier {
        padding: 10px;
    }

    .carting {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .carting h4 {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .cart-items {
        margin-top: 20px;
        width: 100%;
    }

    .cart-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .cart-item img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .product-details {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 100%;
    }

    .quantity {
        margin-top: 10px;
    }

    .total {
        margin-top: 10px;
    }

    .subT {
        flex-direction: column;
        align-items: center;
    }

    .pagination {
        justify-content: center;
        gap: 5px;
    }
}
    </style>
</head>
<body>
    <!-- header start -->
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
    <!-- header end -->

    <section class="maindock">
        <span class="change">CART</span>
        <div class="carrier">
            <div class="carting">
                <h4>Product</h4>
                <h4>Quantity</h4>
                <h4>Total</h4>
            </div>
            <div class="line"></div>
            <div class="cart-items" id="cart-items">
                <!-- Cart items will be dynamically inserted here -->
            </div>
            <div class="Bline"></div>
            <div class="subT">
                <span class="word">Total</span>
                <span class="total-price" id="total-price">R0.00</span>
                <span class="time">Shipping & Taxes are calculated at checkout</span>
                <a id="checkout-button" href="javascript:void(0)">Checkout</a>

            </div>
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
        // Initialize cart from localStorage or empty array
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Render cart items and update total
        function renderCartItems() {
            const cartItemsContainer = document.getElementById('cart-items');
            const totalPriceElement = document.getElementById('total-price');
            let total = 0;

            cartItemsContainer.innerHTML = '';

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <div class="product-details">
                        <img src="${item.image}" alt="${item.name}" style="width: 150px; height: auto;">
                        <div class="dd">
                            <div class="mb-3 ms-3">
                                <span class="itemName">${item.name}</span>
                            </div>
                            <div class="mb-3 ms-3">
                                <span>Size: ${item.size}</span>
                            </div>
                            <div class="mb-1 ms-3">
                                <span class="itemPrice">Price: R<span>${item.price}</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <ul class="pagination">
                            <li class="page-item pt-2" onclick="changeQuantity(${index}, -1)">-</li>
                            <li class="page-item pt-2">${item.quantity}</li>
                            <li class="page-item pt-2" onclick="changeQuantity(${index}, 1)">+</li>
                        </ul>
                    </div>
                    <div class="total">R${itemTotal.toFixed(2)}</div>
                `;
                cartItemsContainer.appendChild(cartItem);
            });

            totalPriceElement.innerText = `R${total.toFixed(2)}`;
            updateCartInLocalStorage(total);
        }

        // Change quantity and update cart
        function changeQuantity(index, change) {
            if (cart[index].quantity + change > 0) {
                cart[index].quantity += change;
                renderCartItems();
            }
        }

        // Update cart data in localStorage with total price
        function updateCartInLocalStorage(total) {
            const cartData = {
                items: cart,
                total: total
            };
            localStorage.setItem('cartData', JSON.stringify(cartData));
        }

        // Load cart on page load
        document.addEventListener('DOMContentLoaded', renderCartItems);

        // Handle checkout button click
        document.getElementById('checkout-button').addEventListener('click', function() {
            const cartData = JSON.parse(localStorage.getItem('cartData'));
            console.log(cartData); 

            window.location.href = 'checkout.php';
        });
    </script>
</body>
</html>
