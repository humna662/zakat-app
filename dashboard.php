<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
</head>
<body>
  <h1>Welcome to the Dashboard!</h1>
  <p>You are logged in.</p>
  <a href="logout.php">Logout</a>
</body>
</html>
