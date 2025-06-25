<?php
include 'db.php';
$id = $_POST['id'];
$sql = "DELETE FROM assets WHERE id='$id'";
$conn->query($sql);
echo "deleted";
?>