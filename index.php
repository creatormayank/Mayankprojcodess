<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | SEED </title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="ring"></div>
    </div>
    <header>
        <div class="app-drawer" onclick="toggleDrawer()">☰</div>
        <div class="company-name">SEED - Web</div>
        <nav>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
            <a href="help.php">Help</a>
        </nav>
    </header>

    <div class="drawer" id="drawer">
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <main class="dashboard-container">
        <div class="dashboard-tile">
            <a href="login.php">
                <img src="images/Tile1.jpg" alt="Tile 1">
                <div class="tile-label">User Dashboard</div>
            </a>
        </div>
        <div class="dashboard-tile">
            <a href="plogin.php">
                <img src="images/Tile2.jpg" alt="Tile 2">
                <div class="tile-label">Police Dashboard</div>
            </a>
        </div>
        <div class="dashboard-tile">
            <a href="ambulancelogin.php">
                <img src="images/Tile31.jpg" alt="Tile 3">
                <div class="tile-label">Medical Dashboard</div>
            </a>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
