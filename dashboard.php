<?php
require_once 'includes/config.php';
require_once 'includes/auth_functions.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="dashboard">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h1>
        <p>Email: <?= htmlspecialchars($_SESSION['user_email']) ?></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>