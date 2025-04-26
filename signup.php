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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $aadhar = $_POST['aadhar'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $otp = $_POST['otp'];
    $deviceid = $_POST['deviceid'];
    $gender = $_POST['gender'];

    // Assuming the database connection is already established
            $mobile = $_POST['mobile']; // Get the mobile number from the form input

            // Check if the mobile number already exists
            $sql = "SELECT * FROM users WHERE mobile = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $mobile);
            $stmt->execute();
            $result = $stmt->get_result();

    // Validate OTP and other input fields
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } elseif ($otp !== '123456') { // Simulate OTP validation
        echo "<script>alert('Invalid OTP!');</script>";
    }elseif ($result->num_rows > 0) {
        // Mobile number already exists
        echo "This mobile number is already registered. Please use a different number.";
    }
    else {
        // Insert user into the database
        $sql = "INSERT INTO users (firstname, lastname, dob, address, mobile, aadhar, password,deviceid,gender) 
                VALUES ('$firstname', '$lastname', '$dob', '$address', '$mobile', '$aadhar', '$password','$deviceid','$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
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
        form{
            margin-top: 600px;
            
        }
    </style>
</head>
<body>
    <header>
        <div class="app-drawer" onclick="toggleDrawer()">☰</div>
        <div class="company-name">SEED - User Registration</div>
        <nav>
            <a href="login.php">Login</a>
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
        <form action="signup.php" method="post">
            <h2>Sign Up</h2>
            <div class="input-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            
            <div class="input-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="input-group">
                <label for="gender">Gender</label>
                <input type="text" id="gender" name="gender" required>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="input-group">
                <label for="mobile">Mobile Number</label>
                <input type="text" id="mobile" name="mobile" required>
            </div>
            <div class="input-group">
                <label for="deviceid">New SEED Device Id</label>
                <input type="text" id="deviceid" name="deviceid" required>
            </div>
            <div class="input-group">
                <label for="aadhar">Aadhar Number</label>
                <input type="text" id="aadhar" name="aadhar" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Re-enter Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="button" onclick="generateOTP()">Generate OTP</button>
            <br><br>

            <div class="input-group otp-box" id="otpBox" style="display:none;">
                <label for="otp">Enter OTP</label>
                <input type="text" id="otp" name="otp" maxlength="6" required>
            </div>

            <button type="submit">Register</button>
        </form>
        <br><br><br><br>
    </main>
    <script src="script.js"></script>
</body>
</html>
