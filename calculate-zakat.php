<?php
include 'db.php';
session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM assets WHERE user_id = $user_id ORDER BY year DESC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>