<?php
session_start();
$host = 'localhost'; // Database host
$user = 'root';      // Database username
$pass = '';          // Database password
$db = 'seed_db';    // Database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE mobile='$mobile' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['mobile'] = $mobile;
        header('Location: profile.php');
    } else {
        echo "<script>alert('Invalid/Un-registered mobile no. or password');</script>";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        header{
            background-color: #1338BE; /*cobalt*/
        }
        button {
            background-color: #1338BE; /*cobalt*/
        }
        button:hover {
            background-color: #0A1172; /*navy*/
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="ring"></div>
    </div>
    <header>
        <div class="app-drawer" onclick="toggleDrawer()">☰</div>
        <div class="company-name">SEED - User Login</div>
        <nav>
            <a href="signup.php">Sign Up</a>
            <a href="help.php">Help</a>
        </nav>
    </header>

    <div class="drawer" id="drawer">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    <main>
        <form action="login.php" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <label for="mobile">Mobile no.</label>
                <input type="int" id="mobile" name="mobile" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </main>

    <script src="script.js"></script>
</body>
</html>
