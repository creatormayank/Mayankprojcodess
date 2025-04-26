<?php
session_start();
if (!isset($_SESSION['mobile'])) {
    header('Location: index.php');
    exit();
}

$host = 'localhost'; 
$user = 'root';      
$pass = '';          
$db = 'seed_db';      

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$mobile = $_SESSION['mobile'];
$sql = "SELECT firstname, lastname, dob, address, mobile,gender,deviceid, aadhar FROM users WHERE mobile='$mobile'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $userDetails = $result->fetch_assoc();
} else {
    echo "No user found!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
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
    <header>
        <div class="app-drawer" onclick="toggleDrawer()">☰</div>
        <div class="company-name">SEED - User Dashboard</div>
        <nav>
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

    <main>
        <div class="profile-container">
            <h2>User Profile</h2>
            <div class="profile-details">
                <p><strong>Device Id:</strong> <?php echo $userDetails['deviceid']; ?></p>
                <p><strong>First Name:</strong> <?php echo $userDetails['firstname']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $userDetails['lastname']; ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $userDetails['dob']; ?></p>
                <p><strong>Gender:</strong> <?php echo $userDetails['gender']; ?></p>
                <p><strong>Address:</strong> <?php echo $userDetails['address']; ?></p>
                <p><strong>Mobile Number:</strong> <?php echo $userDetails['mobile']; ?></p>
                <p><strong>Aadhar Number:</strong> <?php echo $userDetails['aadhar']; ?></p>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
