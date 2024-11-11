<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

require '../incl/dbconnect.php';

$message = '';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=ausdb", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT id, password FROM admin WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin){
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_email'] = $email;
                    $message = "Login successful!";
                    header('Location: dashboard');
                    exit();
                } else {
                    $message = "Invalid email or password!";
                }
            } else {
                $message = "Invalid email or password!";
            }
        } catch (PDOException $e) {
            $message = "Database Error: " . $e->getMessage();
        }
    } else {
        $message = "Invalid email format!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    
    <style>
        /* Basic reset */
        @font-face {
    font-family: 'NextShpere';
    src: 
    /* url('../fonts/NextSphereBlack.ttf') format('truetype'); */
         url('../fonts/SphereNextThin.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'NextSh';
    src: 
    url('../fonts/NextSphereBlack.ttf') format('truetype');
         /* url('../fonts/SphereNextThin.ttf') format('truetype'); */
    font-weight: normal;
    font-style: normal;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Split screen layout */
        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Left side styling */
        .left {
            flex: 1;
            background: url('../images/cover.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .left .overlay {
            min-height:50vh;
            position: relative;
            text-align: center;
            color: white;
        }

        .left .logo {
            font-size: 24px;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
        }

        .left .logo img {
            width: 50px;
            margin-right: 10px;
        }

        /* Right side styling */
        .right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 20px;
            min-height:50vh;
            font-family: "Plus Jakarta Sans", sans-serif;
            }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            font-family: "Plus Jakarta Sans", sans-serif;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px; */
        }

        .form-container h2 {
            font-family: "Plus Jakarta Sans", sans-serif;
            margin-bottom: 12px;
            color: #000000;
        }
        .form-container p {
            font-family: "Plus Jakarta Sans", sans-serif;
            margin-bottom: 32px;
            color: #64748B;
            font-size:14px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 14px;
            color: #666;
        }

        .form-group input {
            font-family: "Plus Jakarta Sans", sans-serif;
            width: 100%;
            padding-left: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
        }

        .form-group #rememberMe{
            width:10px;
        }
        .form-group input:focus {
            border-color: #333;
            outline: none;
        }

        .form-group .remember-me {
            display: flex;
            align-items: center;
        }

        .form-group .remember-me input {
            width: auto;
            margin-right: 10px;
        }

         .forgot-password {
            /* margin-top: 10px; */
            justify-content:center;
            display:flex;
            gap:5px;
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 14px;
            text-align: right;
        }
        
        .forgot-password a {
            text-decoration: none;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: #DA200C;
            font-weight:500;
        }

        .forgot-password .black{
            color:black;
            font-weight:400;
        }
       

        .btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #DA200C;
            margin-bottom:25px;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: #ffffff;
            border: none;
            font-weight:700;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #c9302c;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column-reverse;
            }

            .left, .right {
                flex: none;
                width: 100%;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="overlay">
                <div class="logo"></div>
            </div>
        </div>

        <div class="right">
            <div class="form-container">
                <h2>Sign In to your Account</h2>
                <p>Welcome back! Please enter your details.</p>

                <div id="response" style="color: <?php echo (strpos($message, 'successfully') !== false) ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                </div>

                <form action="" method="POST">
                    <div class="form-group">
                       <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                       <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group remember-me">
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn">Sign In</button>
                    <div class="forgot-password">
                        <a href="#">Forgot Password?</a>
                        <a href="#">Reset Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script>
        // Get the message from the hidden div
        const message = document.getElementById('message').innerText;

        if (message) {
            // If there's a message, display it in the response div
            document.getElementById('response').innerText = message;
            document.getElementById('response').style.color = message.includes('successfully') ? 'white' : 'red';
            document.getElementById('message').style.display = 'block'; // Ensure the message is visible
        }
    </script> -->
</body>
</html>

