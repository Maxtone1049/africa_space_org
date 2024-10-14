<?php
// Initialize a message variable
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Simple password match check
    if ($password !== $confirmPassword) {
        $message = "Passwords do not match!";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=AUS", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Use the $pdo from your dbconnect.php file
            $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $message = "Account created successfully!";
            } else {
                $message = "Error creating account! Please try again.";
            }
        } catch (PDOException $e) {
            // Check for duplicate entry error
            if ($e->getCode() == 23000) { // Integrity constraint violation
                $message = "This email address is already registered. Please use a different email.";
            } else {
                $message = "An error occurred. Please try again later.";
            }
        }
    }
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
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up | Africa United Space</title>
</head>
<body>
    <!-- Header Section Start -->
    <div class="header">
        <header class="subhead">
            <a href="."><img src="images/logo.png" alt=""></a>
            <nav>
                <button class="close">x</button>
                <ul>
                    <li><a href="about" class="touch">About Us</a></li>
                    <li><a href="contact" class="touch">Contact Us</a></li>
                    <li><a href="#" class="touch">Shop</a></li>
                </ul>
                <ul class="pack">
                    <li><a href="login" class="sign">Sign in</a></li>
                    <li><a href="signup" class="signup">Sign up</a></li>
                </ul>
            </nav>
            <button class="menu-toggle">☰</button>
        </header>
        <!-- Header End -->

        <!-- Split Contents -->
        <div class="container">
            <div class="mainone">
                <span>
                    Take a step forward towards actualizing the African Dream  
                </span>
            </div>
            <div class="maintwo">
                <form action="" method="POST">
                    <div class="formhead">
                        <h3 class="title">Create New Account</h3>
                        <p>Fill these few steps to continue</p>
                    </div>
                        <!-- Hidden div to pass the message from PHP to JavaScript -->
                        <div id="message" style="display:none;"><?php echo htmlspecialchars($message); ?></div>

                        <!-- Display the message in this div -->
                        <div id="response"></div>
                        
                    <div class="input">
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="password input">
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <p class="alte"><a class="a" href="login">Already have an account? <span>Login Here</span></a></p>
                    <button type="submit">Sign Up</button>
                </form>

            </div>
        </div>
        <!-- Split Contents End -->
    </div>
    <!-- Header Section Ends -->

    <!-- Footer Starts -->
    <footer>
        <div class="spread">
            <img src="images/logo-black.png" alt="">
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
    </footer>
    <!-- Footer Ends -->

    <script src="js/script.js"></script>
    <script>
        // Get the message from the hidden div
        const message = document.getElementById('message').innerText;

        if (message) {
            // If there's a message, display it in the response div
            document.getElementById('response').innerText = message;
            document.getElementById('response').style.color = message.includes('successfully') ? 'white' : 'red';
            document.getElementById('message').style.display = 'block'; // Ensure the message is visible
        }
    </script>
</body>
</html>
