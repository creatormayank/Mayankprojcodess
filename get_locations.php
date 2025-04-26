<?php
header('Content-Type: application/json');

// DB config
$host = "localhost";
$dbname = "seed_db";
$username = "root";
$password = '';

// Connect
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

$sql = "SELECT Deviceid,service,status,Time, latitude, longitude FROM locations";
$result = $conn->query($sql);

$locations = [];

while ($row = $result->fetch_assoc()) {
    $locations[] = $row;
}

echo json_encode($locations);

$conn->close();
?>
