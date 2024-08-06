<?php
require ("db/connect_db.php");
$ErrorMsg = null;

if (isset($_SESSION["USER"]) || isset($_SESSION["ADMIN"])) {
  header("Location: index.php?page=home");
  exit();
}

if (isset($_POST["submit-login"])) {
  if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = strtolower(strip_tags($_POST["email"]));
    $password = strip_tags($_POST["password"]);

    $REQ_USER = $connect_db->prepare("SELECT * FROM client WHERE email=?");
    $REQ_USER->execute([$email]);

    $REQ_ADMIN = $connect_db->prepare("SELECT * FROM admin WHERE email=?");
    $REQ_ADMIN->execute([$email]);

    if ($REQ_ADMIN->rowCount() == 1) {
      $ADMIN = $REQ_ADMIN->fetch();
      if (password_verify($password, $ADMIN["password"])) {
        $_SESSION["ADMIN"] = $ADMIN["url"];
        setcookie("ArchivisteID", $ADMIN["url"], time() + 6 * 30 * 24 * 60 * 60, "/");
        header("Location: /e-commerce-app/admin/index.php");
        exit();
      } else {
        $ErrorMsg = "Email ou mot de passe incorrect!";
      }
    } else {
      $ErrorMsg = "Email ou mot de passe incorrect!";
    }

    if ($REQ_USER->rowCount() == 1) {
      $USER = $REQ_USER->fetch();
      if (password_verify($password, $USER["password"])) {
        $_SESSION["USER"] = $USER["url"];
        setcookie("ArchivisteID", $USER["url"], time() + 6 * 30 * 24 * 60 * 60, "/");
        header("Location: index.php?page=home");
        exit();
      } else {
        $ErrorMsg = "Email ou mot de passe incorrect!";
      }
    } else {
      $ErrorMsg = "Email ou mot de passe incorrect!";
    }
  } else {
    $ErrorMsg = "Veuillez remplir ses champs !";
  }
}