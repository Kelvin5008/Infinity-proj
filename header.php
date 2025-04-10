<!-- header.php -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <h1>Feedback Portal</h1>
        <div class="nav-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Welcome,
                    <strong>
                        <?php
                            echo isset($_SESSION['user_name'])
                                ? htmlspecialchars((string)$_SESSION['user_name'], ENT_QUOTES, 'UTF-8')
                                : 'User';
                        ?>
                    </strong>!
                </span>
                <a href="view_feedback.php">Feedback</a>
                <a href="feedback.php">Submit</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.html">Login</a>
                <a href="index.html">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
