<?php
require("db/connect_db.php");
$ErrorMsg = null;

if (isset($_SESSION["USER"])) {
  header("Location: index.php?page=home");
  exit();
}

if (isset($_POST["submit-login"])) {
  if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = strtolower(strip_tags($_POST["email"]));
    $password = strip_tags($_POST["password"]);

    $REQ_USER = $connect_db->prepare("SELECT * FROM client WHERE email=?");
    $REQ_USER->execute([$email]);
    
    if ($REQ_USER->rowCount() == 1) {
      $USER = $REQ_USER->fetch();
      if (password_verify($password, $USER["password"])) {
        if ($USER["status"] == 1) {
          $_SESSION["ADMIN"] = $USER["url"];
          header("Location: /e-commerce-app/admin/index.php");
          exit();
        } else {
          $_SESSION["USER"] = $USER["url"];
          header("Location: index.php?page=home");
          exit();
        }
      } else {
        $ErrorMsg = "Email ou mot de passe incorrect!";
      }
    } else {
      $ErrorMsg = "Email ou mot de passe incorrect!";
    }
  } else { $ErrorMsg = "Veuillez remplir ses champs !";}
}