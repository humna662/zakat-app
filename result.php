<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$gold = $_SESSION['gold'] ?? 0;
$silver = $_SESSION['silver'] ?? 0;
$cash = $_SESSION['cash'] ?? 0;

$totalAssets = $gold + $silver + $cash;
$nisab = 106000; // Example nisab threshold
$zakatDue = $totalAssets >= $nisab;
$zakatAmount = $zakatDue ? ($totalAssets * 0.025) : 0;

// Coin values
$goldCoinValue = 25000;
$silverCoinValue = 1000;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Zakat Result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container mt-5">
  <h2>Zakat Result</h2>
  <p><strong>Total Asset Value:</strong> Rs <?= number_format($totalAssets) ?></p>
  <p><strong>Zakat Applicable:</strong> <?= $zakatDue ? 'Yes ✅' : 'No ❌' ?></p>

  <?php if ($zakatDue): ?>
    <p><strong>Zakat Amount (2.5%):</strong> Rs <?= number_format($zakatAmount) ?></p>
    <p><strong>Gold Coins (approx):</strong> <?= number_format($zakatAmount / $goldCoinValue, 2) ?> coins</p>
    <p><strong>Silver Coins (approx):</strong> <?= number_format($zakatAmount / $silverCoinValue, 2) ?> coins</p>
  <?php endif; ?>

  <a href="dashboard.php" class="btn btn-primary mt-4">Back to Dashboard</a>
</body>
</html>
