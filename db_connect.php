<?php
$servername = "sql303.infinityfree.com"; // or check your cPanel
$username = "if0_38704625"; // e.g., if0_38704625
$password = "KOL0sTIttn7"; // set in your hosting panel
$dbname = "if0_38704625_user_db"; // same as shown in phpMyAdmin

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
