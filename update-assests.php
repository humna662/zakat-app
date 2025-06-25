<?php
include 'db.php';
session_start();

$id = $_POST['id'];
$gold = $_POST['gold'];
$silver = $_POST['silver'];
$cash = $_POST['cash'];

$total = $gold + $silver + $cash;
$zakat = ($total >= 100000) ? $total * 0.025 : 0;

$sql = "UPDATE assets SET gold='$gold', silver='$silver', cash='$cash', zakat_payable='$zakat' WHERE id='$id'";
$conn->query($sql);

echo "updated";
?>