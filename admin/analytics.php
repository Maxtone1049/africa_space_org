<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
<title>Analytics</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Plus Jakarta Sans", sans-serif;
    }

    /* Dashboard Container */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background-color: #f9f9f9;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #fff;
        padding: 20px;
        border-right: 1px solid #ddd;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    h3{
            font-family: "Plus Jakarta Sans", sans-serif;
            font-weight:600;
            color:#94A3B8;
            font-size:16px;
        }
    .sidebar .menu li a img {
            margin-right: 10px;
            color: #DA200C;
        }
    .sidebar .logo img {
        width: 150px;
        margin: 0 auto 30px;
        display: block;
    }

    .sidebar .menu {
        list-style: none;
    }

    .sidebar .menu li {
        margin: 15px 0;
    }

    .sidebar .menu li a {
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
    }

    .sidebar .menu li a:hover,
    .sidebar .menu li a.active {
        background-color: #FFE1E1;
        color: #DA200C;
        font-weight: 700;
        border-radius: 12px;
    }

    .sidebar .logout {
        margin-top: auto;
        text-align: center;
        font-size: 14px;
        color: #666;
        cursor: pointer;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
        padding: 20px;
        border-bottom: 1px solid #ddd;
    }

    .header h1 {
        font-size: 24px;
        color: #333;
    }

    .header .search-bar {
        position: relative;
        width: 250px;
    }

    .header .search-bar input {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .header .user-info {
        display: flex;
        align-items: center;
    }

    .header .user-info .user-name {
        font-size: 14px;
        color: #333;
        margin-left: 10px;
    }

    /* Analytics Content */
    .analytics-content {
        padding: 20px;
        color: #94A3B8;
        font-size: 16px;
        text-align: center;
        margin-top: 50px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            flex-direction: row;
            justify-content: space-between;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Section -->
        <div class="sidebar">
            <div class="logo">
                <img src="../images/logo-black.png" alt="Logo">
            </div>

            <h3>MENU</h3>
            <ul class="menu">
                <li><a href="dashboard"><span><img src="../images/dash.svg" alt=""></span> Dashboard</a></li>
                <li><a href="#" class="active"><span><img src="../images/account.svg" alt=""></span> Analytics</a></li>
                <li><a href="inventory"><span><img src="../images/invent.svg" alt=""></span> Inventory</a></li>
            </ul>
            <div class="logout"><img src="../images/logout.svg" alt=""> Log out</div>
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <div class="header">
                <h1>Analytics</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-info">
                    <img src="../images/user.png" alt="admin">
                    <div class="user-name">Rasheed O.<br><small>Administrator</small></div>
                </div>
            </div>

            <!-- Analytics Content -->
            <div class="analytics-content">
                <p>No data available.</p>
            </div>
        </div>
    </div>
</body>
</html>
