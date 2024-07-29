<?php
require ("db/connect_db.php");
if (isset($_POST["submit-message"])) {
  if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])) {
    $name = strip_tags(htmlspecialchars(ucwords($_POST["name"])));
    $email = strip_tags(strtolower($_POST["email"]));
    $message = strip_tags(htmlspecialchars($_POST["message"]));

    if (strlen($name) > 2 && strlen($name) < 30) {
      if (strlen($message) > 5 && strlen($message) < 256) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 5 && strlen($email) < 120) {
          $insert = $connect_db->prepare("INSERT INTO contact(fullname,email,message,date) VALUES(?,?,?,now())");
          $insert->execute([$name, $email, $message]);
          $success = "Votre message a bien été envoyé !";
        } else {
          $ErrorMsg = "L'email n'est pas valide";
        }
      } else {
        $ErrorMsg = "Le message doit être compris entre 5 et 256 caractères";
      }
    } else {
      $ErrorMsg = "Le nom doit avoir entre 3 et 30 caractères";
    }
  }
}