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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM pusers WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: pdashboard.php');
    } else {
        echo "<script>alert('Invalid username or password');</script>";
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
    <style>
        header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #F94D00;
    padding: 10px 20px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}
    </style>
</head>
<body>
    <header>
        <div class="app-drawer" onclick="toggleDrawer()">☰</div>
        <div class="company-name">SEED - Police Login</div>
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
        <form action="plogin.php" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
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
