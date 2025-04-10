<?php include 'header.php'; ?>
<div class="container">
<h2>Submit Feedback</h2>

<?php
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to submit feedback.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO feedback (user_id, message) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted!'); window.location.href='view_feedback.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="post" action="">
    <label for="message">Your Feedback:</label><br>
    <textarea name="message" id="message" rows="5" required></textarea><br><br>
    <button type="submit">Submit</button>
</form>

<p><a href="view_feedback.php">View Feedback</a> | <a href="logout.php">Logout</a></p>
</div> <!-- container -->
</body>
</html>
