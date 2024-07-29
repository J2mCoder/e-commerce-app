<?php

if (isset($_GET["action"]) && $_GET["action"] == "add-to-panier") {
  if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    if (!isset($_SESSION['panier'])) {
      $_SESSION['panier'] = array();
    } 

    if (isset($_SESSION['panier'][$id])) {
      $_SESSION['panier'][$id]++;
    } else {
      $_SESSION['panier'][$id] = 1;
    }
    header("Location: index.php?page=home");
    exit();
  }
} 