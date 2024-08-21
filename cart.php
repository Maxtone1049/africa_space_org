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
</head>
<body>
     <!-- header start -->
      <div class="task">
     <header class="subhead">
      <a href="."> <img src="images/logo.png" alt="" srcset=""></a>
        <nav class="">
            <button class="close">x</button>
            <!-- <ul>
                <li> <a href="#" class="rind">MEN</a></li>
                <li> <a href="#" class="rind">WOMEN</a></li>
                <li> <a href="#" class="rind">KIDS</a></li>
                <li> <a href="#" class="rind">ACCESSORIES</a></li>
            </ul> -->
            <ul class="pack">
               <li> <a href="#" class="sign">Sign in</a></li>
               <li> <a href="#" class="signup">Sign up</a></li>
            </ul>
            <!-- <ul class="pack">
               <li><a href="cart.html"><img class="pinch" src="images/shopping-basket.png" alt="shopping-basket.png"></a></li>
               <li> <img class="p" src="images/Avatar.svg" alt="Avatar.svg"></li>
               <li> <span>Daniel A.</span> </li>
            </ul> -->
        </nav>
        <button class="menu-toggle">☰</button>
    </header>
</div>

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

     </div>
   
    <div class="Bline"></div>
    <div class="subT">
        <span class="word">Total</span>
        <span class="total-price">$0.00</span>
        <span class="time">Shipping & Taxes are calculated at checkout</span>
        <a href="checkout.php">Checkout</a>
    </div>
    <!-- Item Added to List end -->
    
</div>
</section>
<!-- header end -->

<!-- footer Starts -->
             <footer>
                <div class="spread">
                    <img src="images/logo-black.png" alt="">
                    <div class="quicklink">
                        <ul>
                            <li><a href="about.php">About Us</a></li>
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
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
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

                        itemDiv.innerHTML=`
                       <!-- Demand of the Product Section -->
        <div class="demand ">
            <img src="${item.image}" alt="${item.name}">
            <div class="info">
                <span class="productName">${item.name}</span>
                <span class="sholder">Size:S</span>
                <div class="size">
                    <span class="sizeS active">S</span>
                    <span class="sizeM">M</span>
                    <span class="sizeL">L</span>
                    <span class="sizeL">XL</span>
                    <span class="sizeL">2XL</span>
                </div>
                <span class="pricetag">$${item.price}</span>
            </div>
        </div>
        <!-- Demand of the Product Section end -->
         <!-- Quatity Section -->
        <div class="quantity">
            <div class="trent">
                <button class="bOne" onclick="decreaseQuantity('${item.id}')">-</button>
                <div class="counter">${item.quantity}</div>
                <button class="btwo" onclick="increaseQuantity('${item.id}')">+</button>
            </div>
       <div class="remove" onClick="clearCart()">Remove</div>
   
    </div>
    <!-- quantity section ends -->
    
    <!-- Totla Price -->
    <div class="priceHead">
        <span class="pricetag">$${(item.price * item.quantity).toFixed(2)}</span>
       </div>
   `;
                itemsContainer.appendChild(itemDiv);
                    });
        
                    const finalTotal = total + shippingFee;
                    totalPriceElement.textContent = `$${finalTotal.toFixed(2)}`;
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
        
                function saveCart() {
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                }
        
                function clearCart() {
                    localStorage.removeItem('cartItems');
                    itemsContainer.innerHTML = '';
                    totalPriceElement.textContent = '$0.00';
                    priceFix.value = '0.00';
                }
        
                updateCart();
        
                window.clearCart = clearCart;
                window.increaseQuantity = increaseQuantity;
                window.decreaseQuantity = decreaseQuantity;
                window.removeItemFromCart = removeItemFromCart;
            });

         </script>
</body>
</html>