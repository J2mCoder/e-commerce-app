<?php

$ErrorMsg = null;
$total = 0;
if (isset($_SESSION['panier'])) {
  foreach ($_SESSION['panier'] as $id => $quantity) {
    echo $id . " => " . $quantity . "<br>";
    $result = $conn->query("SELECT * FROM products WHERE token='$token'");
    $row = $result->fetch();
    $subtotal = $row['price'] * $quantity;
    $total += $subtotal;
  }
} else {
  $ErrorMsg = "Le panier est vide";
}