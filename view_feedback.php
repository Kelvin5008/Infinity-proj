<?php
session_start();
include 'header.php';
include 'db_connect.php';

// Restrict access to logged-in users
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in first.'); window.location.href='login.html';</script>";
    exit();
}

// Fetch the name of the logged-in user if not already stored in session
if (!isset($_SESSION['user_name'])) {
    $stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($user_name);
    $stmt->fetch();
    $_SESSION['user_name'] = $user_name;
    $stmt->close();
}

$sql = "SELECT f.message, f.submitted_at, u.name 
        FROM feedback f
        JOIN users u ON f.user_id = u.id
        ORDER BY f.submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>All Feedback</h2>
   
    <hr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='feedback'>";
            echo "<p><strong>" . htmlspecialchars($row['name']) . "</strong> (" . $row['submitted_at'] . ")</p>";
            echo "<p>" . nl2br(htmlspecialchars_decode($row['message'])) . "</p>";
            echo "<hr></div>";
        }
    } else {
        echo "<p>No feedback submitted yet.</p>";
    }
    ?>
</div>

</body>
</html>
