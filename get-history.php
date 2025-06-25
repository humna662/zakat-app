<?php
include 'db.php';
session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM assets WHERE user_id = $user_id ORDER BY year ASC";
$result = $conn->query($sql);

$history = [];
while ($row = $result->fetch_assoc()) {
    $history[] = $row;
}

echo json_encode($history);
?>