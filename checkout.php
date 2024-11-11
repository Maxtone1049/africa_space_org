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
            <?php if (!isset($_SESSION['user_id'])): ?>
                        <li><a href="login.php" class="sign">Sign in</a></li>
                        <li><a href="register.php" class="signup">Sign up</a></li>
                    <?php endif; ?>
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
                <form id="checkout-form">
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
                    <input type="text"  placeholder="First Name" name="first_name" id="first_name" required>
                    <input type="text" placeholder="Last Name" name="last_name" id="last_name" required>
                </div>
                <div class="input">
                    <input type="text" placeholder="Address" id="address" name="address" required>
                </div>
                <div class="sides">
                    <input type="text"  placeholder="City" id="city" name="city" required>
                    <input type="text" placeholder="Postal Code(optional)" name="postalCode" id="postalCode" required>
                </div>
                <div class="input">
                    <input type="text" id="phone" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="divide">
                    <span><a href="cart"> Return to Cart</a></span>
                     <!-- <button>Send</button> -->
                    <button type="submit" name="send" class="fire">Pay Confirm Order</button>
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
                    <span class="shipping-fee">FREE</span>
                </div>
                <div class="bend">
                    <span>VAT</span>
                    <span class="shipping-fee">15%</span>
                    <span class="vatAmount">0.00</span>
                </div>
                <div class="line" id="dine"></div>
                <div class="ing">
                    <span class="tot">Total </span>
                    <div class="prind">ZAR<span class="dollar total-price">R0.00</span></div>
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
                <a href="https://www.backabuddy.co.za/campaign/africa-united-space/" target="_blank"><img src="images/donate.png" alt=""></a>
            </div>
            </footer>
              <!-- footer ends -->
              
              <script src="js/script.js"></script>
              <script src="https://checkout.flutterwave.com/v3.js"></script>
              <script src="js/checkout.js"></script>

        
</body>
</html>