<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('User registered successfully! Please log in.'); window.location.href='login.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
echo "PHP is working!";
?>
