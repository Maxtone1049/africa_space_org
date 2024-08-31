<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Cart | Africa United Space</title>
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
                    <li><a href="#" class="sign">Sign in</a></li>
                    <li><a href="#" class="signup">Sign up</a></li>
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
            <!-- Item added to List -->
            <div class="cart-items">
                <!-- Cart items will be dynamically inserted here -->
            </div>
            <div class="Bline"></div>
            <div class="subT">
                <span class="word">Total</span>
                <span class="total-price">R0.00</span>
                <span class="time">Shipping & Taxes are calculated at checkout</span>
                <a href="checkout">Checkout</a>
            </div>
            <!-- Item Added to List end -->
        </div>
    </section>

    <!-- footer Starts -->
    <footer>
        <div class="spread">
            <img src="images/logo-black.png" alt="Logo">
            <div class="quicklink">
                <ul>
                    <li><a href="about">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
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
    </footer>
    <!-- footer ends -->

    <script src="js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Retrieve cart items from localStorage or initialize as empty array
            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            // Initialize size for items without it
            cartItems.forEach(item => {
                if (!item.size) {
                    item.size = 'S'; // Default size
                }
            });

            // Save updated cart items back to localStorage
            saveCart();

            const totalPriceElement = document.querySelector('.total-price');
            const itemsContainer = document.querySelector('.cart-items');
            const shippingFee = 6.00; // Example fixed shipping cost

            function updateCart() {
    itemsContainer.innerHTML = '';
    let total = 0;

    cartItems.forEach(item => {
        total += item.price * item.quantity;

        const itemDiv = document.createElement('div');
        itemDiv.classList.add('itemSectionOne');

        itemDiv.innerHTML = `
            <!-- Product Section -->
            <div class="demand">
                <img src="${item.image}" alt="${item.name}">
                <div class="info">
                    <span class="productName">${item.name}</span>
    ${item.requiresSize ?`<span class="sholder">Size: <span class="current-size">${item.size}</span></span>`:
                    ''}
                    ${item.requiresSize ? `
                    <div class="size">
                        <span class="size-option ${item.size === 'S' ? 'act' : ''}" onclick="changeSize('${item.id}', 'S')">S</span>
                        <span class="size-option ${item.size === 'M' ? 'act' : ''}" onclick="changeSize('${item.id}', 'M')">M</span>
                        <span class="size-option ${item.size === 'L' ? 'act' : ''}" onclick="changeSize('${item.id}', 'L')">L</span>
                        <span class="size-option ${item.size === 'XL' ? 'act' : ''}" onclick="changeSize('${item.id}', 'XL')">XL</span>
                        <span class="size-option ${item.size === '2XL' ? 'act' : ''}" onclick="changeSize('${item.id}', '2XL')">2XL</span>
                    </div>` : ''}
                    <span class="pricetag">R${item.price}</span>
                </div>
            </div>
            <!-- Product Section End -->
            <!-- Quantity Section -->
            <div class="quantity">
                <div class="trent">
                    <button class="bOne" onclick="decreaseQuantity('${item.id}')">-</button>
                    <div class="counter">${item.quantity}</div>
                    <button class="btwo" onclick="increaseQuantity('${item.id}')">+</button>
                </div>
                <div class="remove" onclick="removeItemFromCart('${item.id}')">Remove</div>
            </div>
            <!-- Quantity Section End -->
            <!-- Total Price -->
            <div class="priceHead">
                <span class="pricetag">R${(item.price * item.quantity).toFixed(2)}</span>
            </div>
        `;
        itemsContainer.appendChild(itemDiv);
    });

    const finalTotal = total + shippingFee;
    totalPriceElement.textContent = `R${finalTotal.toFixed(2)}`;
}


            function increaseQuantity(productId) {
                const item = cartItems.find(item => item.id === productId);
                if (item) {
                    item.quantity++;
                }
                saveCart();
                updateCart();
            }

            function decreaseQuantity(productId) {
                const item = cartItems.find(item => item.id === productId);
                if (item && item.quantity > 1) {
                    item.quantity--;
                } else if (item && item.quantity === 1) {
                    removeItemFromCart(productId);
                    return;
                }
                saveCart();
                updateCart();
            }

            function removeItemFromCart(productId) {
                const itemIndex = cartItems.findIndex(item => item.id === productId);
                if (itemIndex !== -1) {
                    cartItems.splice(itemIndex, 1);
                }
                saveCart();
                updateCart();
            }

            function changeSize(productId, newSize) {
                const item = cartItems.find(item => item.id === productId);
                if (item) {
                    item.size = newSize;
                    saveCart();
                    updateCart();
                }
            }

            function saveCart() {
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
            }

            function clearCart() {
                localStorage.removeItem('cartItems');
                itemsContainer.innerHTML = '';
                totalPriceElement.textContent = 'R0.00';
            }

            updateCart();

            // Expose functions to global scope for onclick handlers
            window.clearCart = clearCart;
            window.increaseQuantity = increaseQuantity;
            window.decreaseQuantity = decreaseQuantity;
            window.removeItemFromCart = removeItemFromCart;
            window.changeSize = changeSize;
        });
    </script>
</body>
</html>
