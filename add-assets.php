<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

// Validate and sanitize inputs
$gold = isset($_POST['gold']) ? floatval($_POST['gold']) : 0;
$silver = isset($_POST['silver']) ? floatval($_POST['silver']) : 0;
$cash = isset($_POST['cash']) ? floatval($_POST['cash']) : 0;
$user_id = $_SESSION['user_id'];
$created_at = date("Y-m-d H:i:s");

// Save to database
$stmt = $conn->prepare("INSERT INTO assets (user_id, gold, silver, cash, created_at) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iddds", $user_id, $gold, $silver, $cash, $created_at);

if ($stmt->execute()) {
    // Save to session for result screen
    $_SESSION['gold'] = $gold;
    $_SESSION['silver'] = $silver;
    $_SESSION['cash'] = $cash;

    header("Location: ../result.php");
    exit();
} else {
    echo "❌ Error saving assets: " . $stmt->error;
}
?>
