<?php
require("db/connect_db.php");
  
if (!isset($_SESSION["USER"])) {
  header("Location:index.php?page=login");
  exit();
}

$req = $connect_db->prepare("SELECT * FROM client WHERE url =?");
$req->execute([$_SESSION["USER"]]);
$userExist = $req->rowCount();

if ($userExist == 0) {
  header("Location: index.php?page=login");
  exit();
}

$USER = $req->fetch();