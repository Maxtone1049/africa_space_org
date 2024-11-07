<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
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
        <!-- Left Section -->
        <div class="left">
            <div class="overlay">
                <div class="logo">
                    <!-- <h1>AFRICA UNITED SPACE</h1> -->
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="right">
            <div class="form-container">
                <h2>Sign In to your Account</h2>
                <p>Welcome back! please enter your detail</p>
                <form>
                    <div class="form-group">
                       <input type="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                       <input type="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group remember-me">
                        <input type="checkbox" id="rememberMe">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn">Sign In</button>
                    <div class="forgot-password">
                        <a href="#" class="black">Forgot Password?</a>
                        <a href="#"> Reset Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
