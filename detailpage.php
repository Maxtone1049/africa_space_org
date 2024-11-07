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
        <!-- <span class="change">STORE</span> -->
         <!-- Details Section -->
         <section class="product-section">
        <div class="product-gallery">
            <img src="images/shirt.png" alt="T-Shirt Image">
            <!-- <button class="gallery-nav prev">&#10094;</button>
            <button class="gallery-nav next">&#10095;</button> -->
        </div>
        
        <div class="product-details">
            <h1>Merch T Shirt AUS branded</h1>
            <hr>
            <p class="price">$40</p>
            <p class="content">Fabric Content</p>
            <p>Small - 5x : 60% Cotton / 40% Polyester</p>
            <br>
            <p>If the size you are looking for is out of stock, please enter your email below to be notified when inventory is replenished.</p>
            <br>
            <!-- Color Options -->
            <div class="color-options">
                <span>Colour:</span>
                <button class="color-btn black" data-color="black"></button>
                <button class="color-btn gray" data-color="gray"></button>
                <button class="color-btn white" data-color="white"></button>
            </div>

            <!-- Size Options -->
            <div class="size">
                <span>Size:</span>
                <button class="size-option" data-size="S">S</button>
                <button class="size-option" data-size="M">M</button>
                <button class="size-option" data-size="L">L</button>
                <button class="size-option" data-size="XL">XL</button>
                <button class="size-option" data-size="2XL">2XL</button>
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
</body>
</html>
