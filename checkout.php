<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Checkout | Africa United Space</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
     <!-- header start -->
      <div class="task">
     <header class="subhead">
      <a href="."> <img src="images/logo.png" alt="" srcset=""></a>
        <nav class="">
            <button class="close">x</button>
            <ul>
                <li> <a href="#" class="rind">MEN</a></li>
                <li> <a href="#" class="rind">WOMEN</a></li>
                <li> <a href="#" class="rind">KIDS</a></li>
                <li> <a href="#" class="rind">ACCESSORIES</a></li>
            </ul>
            <ul class="pack">
               <li> <a href="#" class="sign">Sign in</a></li>
               <li> <a href="#" class="signup">Sign up</a></li>
            </ul>
            <!-- <ul class="pack">
               <li><a href="cart.php"><img class="pinch" src="images/shopping-basket.png" alt="shopping-basket.png"></a></li>
               <li> <img class="p" src="images/Avatar.svg" alt="Avatar.svg"></li>
               <li> <span>Daniel A.</span> </li>
            </ul> -->
        </nav>
        <button class="menu-toggle">☰</button>
    </header>
</div>
<!-- header end -->
<!-- Main Content Here -->
 <section>
     <div class="bigHeader">
         Checkout
        </div>
        <div class="checkin">
            <!-- Fill Info Form -->
            <div class="detail">
                <div class="fit">
                    <span class="cont">Contact</span>
                    <a href="#">Have an account? <span class="fitIn">Login</span></a>
                </div>
                <form method="POST" action="order_confirmation.php" id="checkout-form">
                <div class="input">
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                    <input type="hidden" name="amount" id="amount"/>
                
                </div>
                <div class="input">
                    <div class="ship">Shipping Address</div>
<select name="country" id="country">
        <option> -- Select Country --</option>
        <option> Afghanistan </option>
        <option> Albania </option>
        <option> Algeria </option>
        <option> Andorra </option>
        <option> Angola </option>
        <option> Antigua and Barbuda </option>
        <option> Argentina </option>
        <option> Armenia </option>
        <option> Australia </option>
        <option> Austria </option>
        <option> Azerbaijan </option>
        <option> Bahamas </option>
        <option> Bahrain </option>
        <option> Bangladesh </option>
        <option> Barbados </option>
        <option> Belarus </option>
        <option> Belgium </option>
        <option> Belize </option>
        <option> Benin </option>
        <option> Bhutan </option>
        <option> Bolivia </option>
        <option> Bosnia and Herzegovina </option>
        <option> Botswana </option>
        <option> Brazil </option>
        <option> Brunei </option>
        <option> Bulgaria </option>
        <option> Burkina Faso </option>
        <option> Burundi </option>
        <option> Cabo Verde </option>
        <option> Cambodia </option>
        <option> Cameroon </option>
        <option> Canada </option>
        <option> Central African Republic </option>
        <option> Chad </option>
        <option> Chile </option>
        <option> China </option>
        <option> Colombia </option>
        <option> Comoros </option>
        <option> Congo, Democratic Republic of the </option>
        <option> Congo, Republic of the </option>
        <option> Costa Rica </option>
        <option> Croatia </option>
        <option> Cuba </option>
        <option> Cyprus </option>
        <option> Czech Republic </option>
        <option> Denmark </option>
        <option> Djibouti </option>
        <option> Dominica </option>
        <option> Dominican Republic </option>
        <option> East Timor (Timor-Leste) </option>
        <option> Ecuador </option>
        <option> Egypt </option>
        <option> El Salvador </option>
        <option> Equatorial Guinea </option>
        <option> Eritrea </option>
        <option> Estonia </option>
        <option> Eswatini </option>
        <option> Ethiopia </option>
        <option> Fiji </option>
        <option> Finland </option>
        <option> France </option>
        <option> Gabon </option>
        <option> Gambia </option>
        <option> Georgia </option>
        <option> Germany </option>
        <option> Ghana </option>
        <option> Greece </option>
        <option> Grenada </option>
        <option> Guatemala </option>
        <option> Guinea </option>
        <option> Guinea-Bissau </option>
        <option> Guyana </option>
        <option> Haiti </option>
        <option> Honduras </option>
        <option> Hungary </option>
        <option> Iceland </option>
        <option> India </option>
        <option> Indonesia </option>
        <option> Iran </option>
        <option> Iraq </option>
        <option> Ireland </option>
        <option> Israel </option>
        <option> Italy </option>
        <option> Jamaica </option>
        <option> Japan </option>
        <option> Jordan </option>
        <option> Kazakhstan </option>
        <option> Kenya </option>
        <option> Kiribati </option>
        <option> Korea, North </option>
        <option> Korea, South </option>
        <option> Kosovo </option>
        <option> Kuwait </option>
        <option> Kyrgyzstan </option>
        <option> Laos </option>
        <option> Latvia </option>
        <option> Lebanon </option>
        <option> Lesotho </option>
        <option> Liberia </option>
        <option> Libya </option>
        <option> Liechtenstein </option>
        <option> Lithuania </option>
        <option> Luxembourg </option>
        <option> Madagascar </option>
        <option> Malawi </option>
        <option> Malaysia </option>
        <option> Maldives </option>
        <option> Mali </option>
        <option> Malta </option>
        <option> Marshall Islands </option>
        <option> Mauritania </option>
        <option> Mauritius </option>
        <option> Mexico </option>
        <option> Micronesia </option>
        <option> Moldova </option>
        <option> Monaco </option>
        <option> Mongolia </option>
        <option> Montenegro </option>
        <option> Morocco </option>
        <option> Mozambique </option>
        <option> Myanmar </option>
        <option> Namibia </option>
        <option> Nauru </option>
        <option> Nepal </option>
        <option> Netherlands </option>
        <option> New Zealand </option>
        <option> Nicaragua </option>
        <option> Niger </option>
        <option> Nigeria </option>
        <option> North Macedonia </option>
        <option> Norway </option>
        <option> Oman </option>
        <option> Pakistan </option>
        <option> Palau </option>
        <option> Panama </option>
        <option> Papua New Guinea </option>
        <option> Paraguay </option>
        <option> Peru </option>
        <option> Philippines </option>
        <option> Poland </option>
        <option> Portugal </option>
        <option> Qatar </option>
        <option> Romania </option>
        <option> Russia </option>
        <option> Rwanda </option>
        <option> Saint Kitts and Nevis </option>
        <option> Saint Lucia </option>
        <option> Saint Vincent and the Grenadines </option>
        <option> Samoa </option>
        <option> San Marino </option>
        <option> Sao Tome and Principe </option>
        <option> Saudi Arabia </option>
        <option> Senegal </option>
        <option> Serbia </option>
        <option> Seychelles </option>
        <option> Sierra Leone </option>
        <option> Singapore </option>
        <option> Slovakia </option>
        <option> Slovenia </option>
        <option> Solomon Islands </option>
        <option> Somalia </option>
        <option> South Africa </option>
        <option> South Sudan </option>
        <option> Spain </option>
        <option> Sri Lanka</option>
        <option> Sudan</option>
        <option> Suriname</option>
        <option> Sweden</option>
        <option> Switzerland</option>
        <option> Syria</option>
        <option> Taiwan</option>
        <option> Tajikistan</option>
        <option> Tanzania</option>
        <option> Thailand</option>
        <option> Togo</option>
        <option> Tonga</option>
        <option> Trinidad and Tobago</option>
        <option> Tunisia</option>
        <option> Turkey</option>
        <option> Turkmenistan</option>
        <option> Tuvalu</option>
        <option> Uganda</option>
        <option> Ukraine</option>
        <option> United Arab Emirates</option>
        <option> United Kingdom</option>
        <option> United States</option>
        <option> Uruguay</option>
        <option> Uzbekistan</option>
        <option> Vanuatu</option>
        <option> Vatican City</option>
        <option> Venezuela</option>
        <option> Vietnam</option>
        <option> Yemen</option>
        <option> Zambia</option>
        <option> Zimbabwe</option>
</select>
                </div>
                <div class="sides">
                    <input type="text" id="space" placeholder="First Name" name="first_name" id="first_name" required>
                    <input type="text" placeholder="Last Name" name="last_name" id="last_name" required>
                </div>
                <div class="input">
                    <input type="text" placeholder="Address" id="address" name="address" required>
                </div>
                <div class="sides">
                    <input type="text" id="space" placeholder="City" id="city" name="city" required>
                    <input type="text" placeholder="Postal Code(optional)" name="postalCode" id="postalCode" required>
                </div>
                <div class="input">
                    <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="divide">
                    <span><a href="cart.php"> Return to Cart</a></span>
                     <!-- <button>Send</button> -->
                    <button type="button" name="send" class="fire">Pay Confirm Order</button>
                </div>
            </form>
            </div>
            <!-- Fill Info Form End here -->
             <!-- Item Details Here -->
            <div class="items">
                <div class="items-container" id="items"></div>
                <div class="line"></div>
                <div class="bend">
                    <span>Shipping + Handling</span>
                    <span class="shipping-fee">R6.00</span>
                </div>
                <div class="line" id="dine"></div>
                <div class="ing">
                    <span class="tot">Total </span>
                    <div class="prind">ZAR<span class="dollar total-price">$0.00</span></div>
                </div>
            </div>
        <!-- Item details ends here -->
       
        </div>
 </section>
 <!-- Main Content Ends Here -->
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
              <script src="https://checkout.flutterwave.com/v3.js"></script>
         <script>

            const firstName = document.getElementById('first_name');
            const lastName = document.getElementById('last_name');
            const email = document.getElementById('email');
            const amount = document.getElementById('amount');
            const phone = document.getElementById('phone');
            const address = document.getElementById('address');
            const city = document.getElementById('city');
            const postalCode = document.getElementById('postalCode');
            const country = document.getElementById('country');
            const items = document.getElementById('items');
 
            const submitButton =document.querySelector('.fire');
            const form = document.getElementById('checkout-form');
            submitButton.addEventListener('click',makePayment);

            function makePayment() {
                FlutterwaveCheckout({
                    public_key: "FLWPUBK_TEST-ac960a48cf2670df7c3d8a479ddb6869-X",
                    tx_ref: 'afus'+Date.now(),
                    amount: amount.value.trim(),
                    currency: "ZAR",
                    payment_options: "card, ussd",
                    // redirect_url: "order_confirmation.php",
                    customer: {
                        email: email.value.trim(),
                        phone_number: phone.value.trim(),
                        name: `${firstName} ${lastName}`,
                    },
                    customizations: {
                        title: "Africa united space",
                        logo: "https://checkout.flutterwave.com/assets/img/rave-logo.png",
                    },
                    callback: function (data) {
                        // flw_ref
                        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        const cartItemsJson = JSON.stringify(cartItems);
                // Create visible input elements directly
            const txRefInput = document.createElement('input');
            txRefInput.type = 'text';  // Set to 'text' to make it visible
            txRefInput.name = 'tx_ref';
            txRefInput.value = data.flw_ref;
            form.appendChild(txRefInput);

            const statusInput = document.createElement('input');
            statusInput.type = 'text';  // Set to 'text' to make it visible
            statusInput.name = 'status';
            statusInput.value = data.status;
            form.appendChild(statusInput);

            const itemsInput = document.createElement('input');
                itemsInput.type = 'hidden';
                itemsInput.name = 'items';
                itemsInput.value = cartItemsJson;
                form.appendChild(itemsInput);

            // Submit the form
            form.submit();
                    // Card numbber Testing: 4187427415564246
                    clearCart();
                    
                    },
                    onclose: function () {
                        alert("Payment cancelled!");
                    }
                });
        }
        function createHiddenInput(name, value) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.id = name;
            input.value = value;
            return input;
        }
        
            document.addEventListener('DOMContentLoaded', () => {
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                const totalPriceElement = document.querySelector('.total-price');
                const itemsContainer = document.querySelector('.items-container');
                const shippingFee = 6.00; // Example fixed shipping cost
        
                function checkAmount() {
                    if (priceFix != '') {
                        makePayment();
                    } else {
                        alert('Price cannot be Empty!');
                    }
                }
        
                function updateCart() {
                    itemsContainer.innerHTML = '';
                    let total = 0;
        
                    cartItems.forEach(item => {
                        total += item.price * item.quantity;
        
                        const itemDiv = document.createElement('div');
                        itemDiv.classList.add('items');
        
                        itemDiv.innerHTML = `
                            <div class="hind">
                                <img src="${item.image}" alt="${item.name}">
                                <div class="merch">
                                    <span class="merchName">${item.name}</span>
                                    <span class="merchDetail">Black | XL</span>
                                    <div class="quantity">
                                        <span>Quantity: ${item.quantity}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="bend">
                                <span>Subtotal</span>
                                <span>R${(item.price * item.quantity).toFixed(2)}</span>
                            </div>
                        `;
        
                        itemsContainer.appendChild(itemDiv);
                    });
        
                    const finalTotal = total + shippingFee;
                    totalPriceElement.textContent = `R${finalTotal.toFixed(2)}`;
                    amount.value = finalTotal.toFixed(2);
                    console.log(amount.value.trim());
                    // console.log(email); // Print the email value
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
                    totalPriceElement.textContent = 'R0.00';
                    amount.value = '0.00';
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