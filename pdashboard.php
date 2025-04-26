<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
         #map {
            height: 500px;
            width: 100%;
            color: black;
        }
        script {
            color: black;
        }
        
    </style>
</head>
<body>
    <header>
        <div class="app-drawer" onclick="toggleDrawer()">☰</div>
        <div class="company-name">SEED - POLICE Dashboard</div>
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

    <h2>Live Location Map</h2>
        <div id="map"></div>

        <script>
            let map;

            function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 22.7196, lng: 75.8577 }, // Center of Indore
        zoom: 12,
    });

                fetch("get_locations.php")
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(loc => {
                            const marker = new google.maps.Marker({
                                position: { lat: parseFloat(loc.latitude), lng: parseFloat(loc.longitude) },
                                map: map,
                                title: loc.Deviceid
                            });

                            const info = new google.maps.InfoWindow({
                                content: `
                                    <div style="font-family: Arial; max-width: 250px;">
                                        <h3 style="margin-top: 0;">${loc.Deviceid}</h3>
                                        ${loc.service ? `<p><strong>Service Req:</strong> ${loc.service}</p>` : ""}
                                        ${loc.status ? `<p><strong>Status:</strong> ${loc.status}</p>` : ""}
                                        ${loc.Time ? `<p><strong>Time:</strong> ${loc.Time}</p>` : ""}
                                    </div>
                                `
                            });

                            marker.addListener("click", () => {
                                info.open(map, marker);
                            });
                        });
                    })
                    .catch(error => console.error("Error fetching locations:", error));
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlahKBhm05kfBUlhRZVOCamNapo4qb1D4&callback=initMap" async defer></script>

    <script src="script.js"></script>
</body>
</html>
