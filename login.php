<?php
require 'incl/dbconnect.php';

// Initialize a message variable
$message = '';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=AUS", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare SQL statement to fetch user data
        $sql = "SELECT password FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $message = "Login successful!";
                // Redirect to another page or perform other actions here
                // Example: header('Location: dashboard.php'); exit();
            } else {
                $message = "Invalid email or password!";
            }
        } else {
            $message = "Invalid email or password!";
        }
    } catch (PDOException $e) {
        $message = "Database Error: " . $e->getMessage();
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
    <title>Login | Africa United Space</title>
</head>
<body>
    <div class="header">
        <header class="subhead">
            <a href="."> <img src="images/logo.png" alt="" srcset=""></a>
            <nav class="">
                <button class="close">x</button>
                <ul>
                    <li> <a href="about" class="touch">About Us</a></li>
                    <li> <a href="contact" class="touch">Contact Us</a></li>
                    <li> <a href="#" class="touch">Shop</a></li>
                </ul>
                <ul class="pack">
                    <li> <a href="login" class="sign">Sign in</a></li>
                    <li> <a href="signup" class="signup">Sign up</a></li>
                </ul>
            </nav>
            <button class="menu-toggle">☰</button>
        </header>

        <div class="container">
            <div class="mainone">
                <span>
                    Welcome back! Let's get you back into the Cosmos
                </span>
            </div>
            <div class="maintwo">
                
                <form action="" method="POST">
                    <div class="formhead">
                        <h3 class="title">Sign in</h3>
                        <p>Fill these few steps to continue</p>
                        
                        <div id="response" style="color: red;">
                            <?php if (!empty($message)) { echo $message; } ?>
                        </div>

                    </div>
                    <div class="input">
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="input">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <p class="alte"><a class="a" href="resetpassword">Forgot Password? <span>Reset</span></a></p>
                    <button type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </div>

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
